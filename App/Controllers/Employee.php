<?php

namespace App\Controllers;

use Core\Controller;

class Employee extends Controller
{
    public function addEmployee(){
        $data = $_POST;
        if(count($data) > 0 && isset($data['first_name']) && isset($data['last_name'])
            && isset($data['salary'])){
            $employee = new Employee($data);
        }
        echo json_encode($data);die;
    }

    public function employeeDetail()
    {

    }

    public function listEmployee()
    {
    }
}