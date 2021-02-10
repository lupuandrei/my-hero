<?php


namespace App\Library\RequestHandler;


use App\Controller\ErrorController;

class RequestHandlerAPI implements RequestHandlerInterface
{
    protected $controller = 'BattleApiController';
    protected $action = 'index';
    protected $params = [];

    function prepareURL()
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

    function handleRequest()
    {
        $this->prepareURL();

        $controllerFilePath = CONTROLLER . ucfirst($this->controller) . ".php";
        if (file_exists($controllerFilePath)) {
            // instantiate controller
            $this->controller = "\\App\\Controller\\" . $this->controller;
            $this->controller = new $this->controller;

            if (method_exists($this->controller, $this->action)) {
                call_user_func_array([$this->controller, $this->action], $this->params);
            } else {
                $this->controller = new ErrorController();
                $this->controller->notFoundApi();
            }
        } else {
            $this->controller = new ErrorController();
            $this->controller->notFoundApi();
        }
    }


}