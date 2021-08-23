<?php

namespace App\Framework\Router;

class Route
{
    /**
     * Path of the route
     * @var string
     */
    private string $path;
    /**
     * Callable of the route
     * @var Callable
     */
    private $callable;
    /**
     * Matches of uri params
     * @var array
     */
    private array $matches;

    /**
     * Route constructor.
     * @param string $path path of route
     * @param Callable $callable
     */
    public function __construct(string $path, callable $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    /**
     * Check if uri match with route
     * @param string $uri
     * @return bool
     */
    public function match(string $uri): bool
    {
        $uri = trim($uri, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if (!preg_match($regex, $uri, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    /**
     * Call the route callback
     * @return false|mixed
     */
    public function call()
    {
        return call_user_func_array($this->callable, $this->matches);
    }

    public function getUrl($params)
    {
        $path = $this->path;
        foreach ($params as $key => $value) {
            $path = str_replace(":$key", $value, $path);
        }

        return $path;
    }

}