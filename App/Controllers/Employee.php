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
        header('Content-Type: application/json');
        if (count($data) > 0 && isset($data['first_name']) && isset($data['last_name'])
            && isset($data['salary'])) {
            $employee = new EmployeeModel($data);
            $employee->create();
            http_response_code(200);
            echo json_encode([
                'code' => 200,
                'message' => 'Insert new employee success.',
                'data' => $data
            ]);
        } else {
            http_response_code(422);
            return json_encode([
                'code' => 422,
                'message' => 'Invalid data please check.'
            ]);
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
