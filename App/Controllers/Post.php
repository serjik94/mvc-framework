<?php

namespace App\Controllers;

use Core\Controller;

class Post extends Controller
{
    public function before()
    {
        echo '(before)';
        parent::before();
    }

    public function after()
    {
        echo '(after)';
        parent::after();
    }

    public function create()
    {
        echo 'create post method';
        echo 'Query string parameters<pre>' . htmlspecialchars(print_r($_GET, true)) . '</pre>';
    }

    public function edit()
    {
        echo 'edit post method </br>';
        echo 'Route parameters<pre>' . htmlspecialchars(print_r($this->routeParameters, true)) . '</pre>';
    }
}