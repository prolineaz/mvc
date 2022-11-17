<?php
require __DIR__ . '/../vendor/autoload.php';

$app = new Framework\Application();

/**
 * Routing with callback function
 */
$app->router->get('/', function () {
    return (new App\Controller\Controller)->view('home.html.twig', ['testvar' => 'Lorem ipsum — классический текст-«рыба». Является искажённым отрывком из философского трактата Марка Туллия Цицерона «О пределах добра и зла», написанного в 45 году до н. э. на латинском языке, обнаружение сходства приписывается Ричарду Макклинтоку.']);
});

/**
 * Routing with class
 */
$app->router->get('/front', 'App\Controller\TestController@front');
$app->router->get('/back', 'App\Controller\TestController@back');
$app->router->get('/support', 'App\Controller\TestController@support');

/**
 * Run App
 */
$app->run();
