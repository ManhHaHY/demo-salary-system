<?php

namespace App\Models;

use PDO;
use Core\Model;

class Employee extends Model
{
    /**
     * Get all the employees as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM employee');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
