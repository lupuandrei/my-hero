<?php

namespace App\Library;

use App\Library\RequestHandler\RequestHandlerAPI;
use App\Library\RequestHandler\RequestHandlerInterface;
use App\Library\RequestHandler\RequestHandlerWeb;

class Core
{
    /**
     * @var RequestHandlerInterface
     */
    protected $requestHandler;

    public function __construct()
    {
        if ($this->isRequestAPI()) {
            $this->requestHandler = new RequestHandlerAPI();
        } else {
            $this->requestHandler = new RequestHandlerWeb();
        }

        $this->requestHandler->handleRequest();
    }

    /**
     * Is Request API Type
     * @return false
     */
    protected function isRequestAPI(): bool
    {
        $request = trim($_SERVER["REQUEST_URI"], '/');
        if (!empty($request)) {
            $url = explode('/', $request);
            return isset($url[0]) && $url[0] == "api" ? true : false;
        }

        return false;
    }

}