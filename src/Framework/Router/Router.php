<?php

namespace App\Framework\Router;

use App\Controllers\ErrorController;
use Exception;

class Router
{
    /**
     * The request uri
     * @var string
     */
    private $uri;
    /**
     * Route list
     * @var array
     */
    private array $routes = [];

    /**
     * Named routes
     * @var array
     */
    private array $named_routes = [];

    public function __construct($uri = "/")
    {
        $this->uri = $uri;
    }

    /**
     * Add a GET route to the router
     * @param string $path path of the route
     * @param Callable $callable
     * @param string|null $name name of the route
     */
    public function get(string $path, callable $callable, string $name = null)
    {
        $this->add('GET', $path, $callable, $name);
    }

    /**
     * Add a POST route to the router
     * @param string $path path of the route
     * @param mixed $callable callable of the route
     * @param string|null $name name of the route
     */
    public function post(string $path, $callable, string $name = null)
    {
        $this->add('POST', $path, $callable, $name);
    }

    /**
     * Add a route to the router
     * @param string $method
     * @param string $path
     * @param mixed $callable
     * @param string $name
     */
    private function add(string $method, string $path, $callable, $name)
    {
        $route = new Route($path, $callable);

        if (isset($name))
            $this->named_routes[$name] = $route;

        $this->routes[$method][] = $route;
    }

    /**
     * Get url of a route name
     * @throws Exception
     */
    public function url($routeName, $params = []) {
        if (!isset($this->named_routes[$routeName])) {
            throw new Exception('No route matches for this name');
        }

        return $this->named_routes[$routeName]->getUrl($params);
    }

    /**
     * Check routes matches,
     * execute callable of the route if a route match else throw Exception
     * @return mixed
     * @throws Exception
     */
    public function run()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new Exception('REQUEST_METHOD does not exist');
        }

        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->uri)) {
                return $route->call();
            }
        }

        $errorController = new ErrorController();
        call_user_func_array(fn() => $errorController->error404(), []);
    }

}