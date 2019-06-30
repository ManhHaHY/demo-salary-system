<?php

namespace App\Models;

use DateTime;

class Payroll
{
    const COUNTRY_TAX = 20;
    const CHILD_TAX = 2;
    const CAR_FEE = 500;

    public static function getPayroll($employee)
    {
        $salary = $employee->salary;
        $birthday = new DateTime($employee->birthday);
        $now = new DateTime();
        $age = $now->diff($birthday);
        $tax = new Tax(self::COUNTRY_TAX);
        if($employee->kids > 2){
            $tax->subtract(self::CHILD_TAX);
        }

        $salaryTax = $tax->calculateTax($salary);
        $oldBonus = Bonus::oldBonus($age->y, (float) $employee->salary);
        $payroll = $salary - $salaryTax + $oldBonus;
        if($employee->use_car == true){
            $payroll -= self::CAR_FEE;
        }

        return $payroll;
    }
}
