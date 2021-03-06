<?php

namespace App\Controller;

use App\Library\Controller;
use App\Manager\BattleManager;
use App\Model\Hero;
use App\Model\Monster;

class HomeController extends Controller
{

    public function index()
    {
        $this->view(["home", "index"]);
        $this->view->render();
    }

    public function about()
    {
        $this->view(["home", "about"]);
        $this->view->render();
    }
}