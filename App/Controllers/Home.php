<?php
namespace App\Controllers;

use \Core\View;
use App\Models\Employee;

/**
 * Home controller
 */
class Home extends \Core\Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $mEmployee = new Employee();
        $listEmployees = $mEmployee->getAll();
        View::renderTemplate('Home/index.html', [
            'employees' => $listEmployees
        ]);
    }
}
