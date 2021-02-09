<?php


namespace App\Controller;


use App\Manager\BattleManager;
use App\Model\Hero;
use App\Model\Monster;

class BattleApiController
{

    public function index()
    {
        header('Content-Type: application/json');

        $test = Hero::generate(null);
        $monster = Monster::generate(null);

        $battleManager = new BattleManager($test, $monster);
        $battleManager->battle();
    }
}