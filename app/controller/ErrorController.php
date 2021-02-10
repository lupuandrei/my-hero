<?php

namespace App\Controller;

use App\Library\Controller;
use App\Library\SerializableException;

class ErrorController extends Controller
{
    public function notFoundWeb()
    {
        $this->view(["exception", "error404"]);
        $this->view->render();
    }

    public function notFoundApi()
    {
        header('Content-Type: application/json');
        http_response_code(404);

        $exception = new SerializableException("Route not found", 404);
        echo json_encode($exception);
    }
}