<?php

error_reporting(E_ALL);
set_error_handler('\Core\Error::errorHandler');
set_exception_handler('\Core\Error::exceptionHandler');

//load environment variables
$env = Dotenv\Dotenv::createUnsafeImmutable(__DIR__.'/..');
$env->load();