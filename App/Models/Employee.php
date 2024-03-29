<?php

namespace App\Models;

use PDO;
use Core\Model;
use Core\Fluent\Sql;
use DateTime;

class Employee extends Model
{
    /**
     * Entities Of model
     */
    protected $table = 'employee';

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'birthday',
        'kids',
        'use_car',
        'salary',
    ];

    const COUNTRY_TAX = 20;
    const DEPENDENT_PERSON_TAX = 2;
    const CAR_TAX = 500;

    /**
     * Get all the employees as an associative array
     *
     * @return array
     */
    public function getAll()
    {
        $db = $this->getDB();
        $query = (new Sql())
            ->select(['*'])
            ->from($this->table, 'e');
        $stmt = $db->query((string) $query);
        
        $results = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $employee) {
            $results[] = new self($employee);
        }
        return $results;
    }

    /**
     * @param int $id
     * @return Employee
     */
    public function findById(int $id)
    {
        $db = $this->getDB();
        $query = (new Sql())
            ->select(['*'])
            ->from($this->table, 'e')
            ->where('id = ' .  $id);
        $stmt = $db->query($query);
        return new self($stmt->fetch(PDO::FETCH_ASSOC));
    }
}
