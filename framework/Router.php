<?php

namespace Framework;

use Framework\Traits\ViewTwig;

class Router
{
  use ViewTwig;

  protected array $routes = [];
  public Request $request;

  public function __construct()
  {
    $this->request = new Request();
  }

  /**
   * get
   *
   * @param  mixed $path
   * @param  mixed $callback
   * @return void
   */
  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }

  /**
   * post
   *
   * @param  mixed $path
   * @param  mixed $callback
   * @return mixed
   */
  public function post($path, $callback)
  {
    $this->routes['post'][$path] = $callback;
  }

  /**
   * resolve
   *
   * @return mixed
   */
  public function resolve()
  {
    $path = $this->request->getPath();
    $method = $this->request->getMethod();
    $callback = $this->routes[$method][$path] ?? false;

    if ($callback === false) {
      return $this->view('errors/error.html.twig', ['code' => 404, 'message' => 'Page not found. Please make sure that the url is valid.']);
    }

    if (is_callable($callback)) {
      return call_user_func($callback);
    } else {
      list($call_class, $call_method) = explode("@", $callback);

      if (!class_exists($call_class)) {
        return $this->view('errors/error.html.twig', ['code' => 404, 'message' => "Controller <b>{$call_class}</b> not found. Please make sure controller name is valid."]);
      }

      if (!method_exists($call_class, $call_method)) {
        return $this->view('errors/error.html.twig', ['code' => 404, 'message' => "Method <b>{$call_method}</b> in controller <b>{$call_class}</b> not found. Please make sure controller name is valid."]);
      }

      $call_controller = new $call_class();
      return $call_controller->$call_method();
    }
  }
}
