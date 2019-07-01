<?php

namespace App;


use App\Models\Employee;
use App\Models\Payroll;
use PHPUnit\Framework\TestCase;

class PayrollTest extends TestCase
{
    public function testPayrollCase1()
    {
        // employee not have more than 2 kids and not using company car.
        $employee = new Employee([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'birthday' => '1989',
            'kids' => 2,
            'use_car' => false,
            'salary' => 1000,
        ]);

        $payroll = Payroll::getPayroll($employee);
        $this->assertEquals(800, $payroll);
    }

    public function testPayrollCase2()
    {
        // employee have more than 2 kids and not using company car.
        $employee = new Employee([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'birthday' => '1989',
            'kids' => 3,
            'use_car' => false,
            'salary' => 1000,
        ]);

        $payroll = Payroll::getPayroll($employee);
        $this->assertEquals(820, $payroll);
    }

    public function testPayrollCase3()
    {
        // employee not have more than 2 kids and using company car.
        $employee = new Employee([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'birthday' => '1989',
            'kids' => 2,
            'use_car' => true,
            'salary' => 1000,
        ]);

        $payroll = Payroll::getPayroll($employee);
        $this->assertEquals(300, $payroll);
    }

    public function testPayrollCase4()
    {
        // employee have more than 3 kids and using company car.
        $employee = new Employee([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'birthday' => '1989',
            'kids' => 3,
            'use_car' => true,
            'salary' => 2000,
        ]);

        $payroll = Payroll::getPayroll($employee);
        $this->assertEquals(1140, $payroll);
    }
}