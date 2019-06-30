<?php
$router = new Core\Router();
// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('create', ['controller' => 'Employee', 'action' => 'create']);
$router->add('add-employee', ['controller' => 'Employee', 'action' => 'addEmployee']);
$router->add('detail', ['controller' => 'Employee', 'action' => 'detail']);
$router->add('{controller}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);