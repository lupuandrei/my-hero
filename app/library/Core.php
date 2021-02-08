<?php

namespace App\Library;

class Core
{

    protected $controller = 'HomeController';
    protected $action = 'index';
    protected $params = [];

    public function __construct()
    {
        $this->prepareURL();

        $controllerFilePath = CONTROLLER . ucfirst($this->controller) . ".php";
        if (file_exists($controllerFilePath)) {

            // instantiate controller
            require_once $controllerFilePath;
            $this->controller = new $this->controller;

            if (method_exists($this->controller, $this->action)) {
                call_user_func_array([$this->controller, $this->action], $this->params);
            }

        }
    }


    protected function prepareURL()
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

}