<?php

namespace App\Library\RequestHandler;

class RequestHandlerWeb implements RequestHandlerInterface
{
    protected $controller = 'HomeController';
    protected $action = 'index';
    protected $params = [];

    public function prepareURL()
    {
        $request = trim($_SERVER["REQUEST_URI"], '/');

        if (!empty($request)) {
            $url = explode('/', $request);
            $this->controller = isset($url[0]) ? $url[0] . "Controller"  : "HomeController";
            $this->action = isset($url[1]) ? $url[1] : "index";

            unset($url[0], $url[1]);
            $this->params = !empty($url) ? array_values($url) : [];
        }
    }

    public function handleRequest(): void
    {
        $this->prepareURL();

        $controllerFilePath = CONTROLLER . ucfirst($this->controller) . ".php";
        if (file_exists($controllerFilePath)) {

            // instantiate controller
            $this->controller = "\\App\\Controller\\" . $this->controller;
            $this->controller = new $this->controller;

            if (method_exists($this->controller, $this->action)) {
                call_user_func_array([$this->controller, $this->action], $this->params);
            }
        } else {
            // TODO: 404 NOT Found
            echo "404 Web";
        }
    }
}