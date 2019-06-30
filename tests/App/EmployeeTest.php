<?php

namespace App;

use \App\Models\Employee;
use \PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    public function testEmployeeData()
    {
        $employee = new Employee([
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);
        $this->assertInstanceOf(Employee::class, $employee);
        $this->assertEquals($employee->first_name, 'John');
    }
}