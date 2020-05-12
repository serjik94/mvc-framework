<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Post;
use Core\View;

class Home extends Controller
{
    public function index()
    {
        $posts = Post::query('SELECT * FROM posts ORDER BY created_at');

        View::renderTemplate('Home/index.html', [
            'name' => 'Serhii',
            'posts' => $posts,
        ]);
    }
}