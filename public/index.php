<?php
require dirname(__DIR__) . '/vendor/autoload.php';
/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');
/**
 * Routing
 */
include_once('../route.php');
