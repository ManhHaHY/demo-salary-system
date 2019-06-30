<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\Employee as EmployeeModel;
use App\Models\Payroll;

class Employee extends Controller
{
    public function create()
    {
        View::renderTemplate('Employee/create.html');
    }

    public function addEmployee()
    {
        $data = $_POST;
        if (count($data) > 0 && isset($data['first_name']) && isset($data['last_name'])
            && isset($data['salary'])) {
            $employee = new EmployeeModel($data);
            $employee->create();
            echo json_encode($data);
        }
        die;
    }

    public function detail()
    {
        $employeeId = $_REQUEST['id'];
        $mEmployee = new EmployeeModel();
        $employee = $mEmployee->findById($employeeId);
        $payroll = Payroll::getPayroll($employee);
        View::renderTemplate('Employee/detail.html', [
            'employee' => $employee,
            'payroll' => $payroll
        ]);
    }
}
