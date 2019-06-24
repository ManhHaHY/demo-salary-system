<?php

namespace Core;

use PDO;
use App\Config;
use App\Helpers\GuardsAttributes;

/**
 * Base model
 */
abstract class Model
{
    use GuardsAttributes;
    
    /**
     * The model's table.
     *
     * @var array
     */
    protected $table = null;

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        try {
            if ($db === null) {
                $charset = 'utf8';
                $collate = 'utf8_unicode_ci';
                $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD, array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => false,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
                ));
            }

            return $db;
        } catch (\Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Fill the model with an array of attributes.
     */
    public function fill(array $attributes)
    {
        foreach ($this->fillableFromArray($attributes) as $key => $value) {
            if ($this->isFillable($key)) {
                $this->setAttribute($key, $value);
            }
        }

        return $this;
    }

    /**
     * Set a given attribute on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->attributes;
    }

    /**
     * Convert the instance to JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->attributes, $options);
    }

    /**
     * Get an attribute from the instance.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }

        return value($default);
    }

    /**
     * Get the attributes from the instance.
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Handle dynamic calls to the fluent instance to set attributes.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return $this
     */
    public function __call($method, $parameters)
    {
        $this->attributes[$method] = count($parameters) > 0 ? $parameters[0] : true;

        return $this;
    }

    /**
     * Dynamically retrieve the value of an attribute.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * Dynamically set the value of an attribute.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->offsetSet($key, $value);
    }

    /**
     * Dynamically check if an attribute is set.
     *
     * @param  string  $key
     * @return bool
     */
    public function __isset($key)
    {
        return $this->offsetExists($key);
    }

    /**
     * Dynamically unset an attribute.
     *
     * @param  string  $key
     * @return void
     */
    public function __unset($key)
    {
        $this->offsetUnset($key);
    }

    /**
     * Insert new record into table.
     */
    public function create()
    {
        $columnString = implode(',', array_flip($this->attributes));
        $valueString = ":".implode(',:', array_flip($this->attributes));

        try{
            $core = self::getDB();
            $stmt = $core->prepare("INSERT INTO $this->table ({$columnString}) VALUES ({$valueString})");

            $status = $stmt->execute($this->attributes);
            if ($status) {
                $lastId = $core->lastInsertId();
                echo $lastId;
            }
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }
}
