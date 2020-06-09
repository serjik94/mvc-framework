<?php

require('../vendor/autoload.php');

require('../Core/bootstrap.php');

$router = new Core\Router();

$router->add('', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('admin/{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{id:\d+}/{action}', [
    'namespace' => 'Admin'
]);

$router->dispatch();