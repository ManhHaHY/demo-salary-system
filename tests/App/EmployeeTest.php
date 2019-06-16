<?php

namespace App;

class EmployeeTest extends \PHPUnit\Framework\TestCase
{
    public function testGetAll()
    {
        $employee = new \App\Models\Employee(null);
        $employees = $employee->getAll();
        $this->assertEquals([
            'id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'birthday' => '1989-03-18',
            'dependent_person' => 3,
            'use_company_car' => 0,
        ], $employees[0]);
    }
}