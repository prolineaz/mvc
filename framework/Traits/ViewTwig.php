<?php

namespace Framework\Traits;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

trait ViewTwig
{    
    /**
     * view
     *
     * @param  mixed $view
     * @param  mixed $data
     * @return string
     */
    public function view($view, $data = [])
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../app/Views');
        $twig = new Environment($loader);
        return $twig->render($view, $data);
    }
}
