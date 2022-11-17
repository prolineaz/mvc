<?php

namespace Framework;

class Application
{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    /**
     * run
     *
     * @return string
     */
    public function run()
    {
        header("Referrer-Policy: no-referrer-when-downgrade");
        header("X-XSS-Protection: 1; mode=block");
        header("X-Content-Type-Options: nosniff");
        header("X-Frame-Options: SAMEORIGIN");

        echo $this->router->resolve();
    }
}
