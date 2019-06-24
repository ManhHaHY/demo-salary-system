<?php
$router = new Core\Router();
// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('add-employee', ['controller' => 'Home', 'action' => 'addEmployee']);
$router->add('{controller}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);