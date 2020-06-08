<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class PostsController extends Controller
{
    public function before()
    {
        parent::before();
    }

    public function after()
    {
        parent::after();
    }

    public function index()
    {
        View::renderTemplate('Home/index.html', [
            'posts' => []
        ]);
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