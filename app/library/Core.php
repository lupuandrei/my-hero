<?php

namespace App\Library;

class Core
{

    protected $controller = 'HomeController';
    protected $action = 'index';
    protected $params = [];

    public function __construct()
    {

        if ($this->isRequestAPI()) {
            $this->handleAPIRequest();
        } else {
            $this->handleWebRequest();
        }

    }

    /**
     * Is Request API Type
     * @return false
     */
    protected function isRequestAPI() : bool
    {
        $request = trim($_SERVER["REQUEST_URI"], '/');
        if (!empty($request)) {
            $url = explode('/', $request);
            return isset($url[0]) && $url[0] == "api" ? true : false;
        }

        return false;
    }

    // - WEB

    protected function prepareWebURL()
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

    protected function handleWebRequest(): void
    {
        $this->prepareWebURL();

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
            echo "test";
        }
    }

    protected function handleAPI()
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

    // - API

    protected function prepareAPIURL()
    {
        $request = trim($_SERVER["REQUEST_URI"], '/');

        if (!empty($request)) {
            $url = explode('/', $request); // e.g. ["api", "battle"]
            array_shift($url); // remove "api". e.g. ["battle"]
            
            $this->controller = isset($url[0]) ? $url[0] . "ApiController"  : "BattleApiController";
            $this->action = isset($url[1]) ? $url[1] : "index";

            unset($url[0], $url[1]);
            $this->params = !empty($url) ? array_values($url) : [];
        }
    }

    protected function handleAPIRequest()
    {
        $this->prepareAPIURL();

        $controllerFilePath = CONTROLLER . ucfirst($this->controller) . ".php";
        if (file_exists($controllerFilePath)) {
            // instantiate controller
            $this->controller = "\\App\\Controller\\" . $this->controller;
            $this->controller = new $this->controller;

            if (method_exists($this->controller, $this->action)) {
                call_user_func_array([$this->controller, $this->action], $this->params);
            }
        } else {
            // TODO: 404 NOT Found JSON FORMAT
            echo "test";
        }
    }

}