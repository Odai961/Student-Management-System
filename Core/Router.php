<?php

namespace Core;

class  Router
{
    protected array $routes = [];

    public function add($uri,$controller,$method){

        return $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
            'middleware' => null,

        ];
    }

    public function get($uri, $controller)
    {
       return $this->add($uri,$controller,'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri,$controller,'POST');
    }

    public function put($uri, $controller)
    {
        return $this->add($uri,$controller,'PUT');
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri,$controller,'PATCH');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri,$controller,'DELETE');
    }





    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path('controllers/' . $route['controller']);
            }
        }

        abort();
    }


}
