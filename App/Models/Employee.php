<?php

namespace App\Models;

use PDO;
use Core\Model;

class Employee extends Model
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $birthday;
    public $dependent_person;
    public $use_car_company;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function getDependentPerson()
    {
        return $this->dependent_person;
    }

    public function setDependentPerson($dependentPerson)
    {
        $this->dependent_person = $dependentPerson;
        return $this;
    }

    public function getUseCompanyCar()
    {
        return $this->use_company_car;
    }

    public function setUseCompanyCar($useCompanyCar)
    {
        $this->use_company_car = $useCompanyCar;
        return $this;
    }

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
