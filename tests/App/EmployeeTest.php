<?php

namespace App;

class EmployeeTest extends \PHPUnit\Framework\TestCase
{
    public function testGetAll()
    {
        $employee = new \App\Models\Employee();
        $employee->setFirstName('John');
        $this->assertEquals($employee->getFirstName(), 'John');
        $employee->setLastName('Doe');
        $this->assertEquals($employee->getLastName(), 'Doe');
    }
}