<?php

namespace App\Controller;

use App\Library\Controller;

class ErrorController extends Controller
{
    public function notFoundWeb()
    {
        $this->view(["exception", "error404"]);
        $this->view->render();
    }

    public function notFoundApi()
    {

    }
}