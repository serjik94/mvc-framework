<?php

namespace Core;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = '../App/Views/' . $view;

        if (is_readable($file)) {
            require $file;
        } else {
            echo $file . 'not found';
        }
    }

    public static function renderTemplate($view, $args = [])
    {
        $loader = new FilesystemLoader(dirname(__DIR__) . '/App/Views');
        $twig = new Environment($loader);

        echo $twig->render('Home/index.html', [
            'name' => 'Serhii',
            'colours' => ['blue', 'red', 'green'],
        ]);
    }
}