# Test Framework

A simple example of a framework developed in PHP and with the ability to run through Docker

## Simple Start

From CLI
```bash
php -S 0.0.0.0:8080 -t ./public
```
From Docker
```bash
docker-compose up -d
```
## Structure
```bash
./
├── app
│   ├── Controller
│   │   ├── Controller.php
│   │   └── TestController.php
│   └── Views
│       ├── back.html.twig
│       ├── errors
│       │   └── error.html.twig
│       ├── front.html.twig
│       ├── home.html.twig
│       ├── main.html.twig
│       └── support.html.twig
├── composer.json
├── composer.lock
├── _docker
│   └── Dockerfile
├── docker-compose.yml
├── framework
│   ├── Application.php
│   ├── Request.php
│   ├── Router.php
│   └── Traits
│       └── ViewTwig.php
├── public
│   ├── favicon.ico
│   └── index.php
├── README.md
└── vendor
```
## Routing (./public/index.php)
```bash
/**
 * Routing with callback function
 */
$app->router->get('/', function () {
    return (new App\Controller\Controller)->view('home.html.twig', ['testvar' => 'Lorem ipsum']);
});

/**
 * Routing with class
 */
$app->router->get('/front', 'App\Controller\TestController@front');
$app->router->get('/back', 'App\Controller\TestController@back');
$app->router->get('/support', 'App\Controller\TestController@support');

```