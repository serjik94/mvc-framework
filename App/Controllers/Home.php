<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class Home extends Controller
{
    public function index()
    {
//        View::render('Home/index.php', [
//            'name' => 'Serhii',
//            'colours' => ['blue', 'green', 'red'],
//        ]);

        View::renderTemplate('Home/index.php', [
            'name' => 'Serhii',
            'colours' => ['blue', 'green', 'red'],
        ]);
    }
}