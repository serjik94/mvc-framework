<?php

require('../vendor/autoload.php');

error_reporting(E_ALL);
set_error_handler('\Core\Error::errorHandler');
set_exception_handler('\Core\Error::exceptionHandler');

$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
//$router->add('{posts}/{index}', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('admin/posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('admin/{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{id:\d+}/{action}', [
    'namespace' => 'Admin'
]);

$router->dispatch($_SERVER['QUERY_STRING']);