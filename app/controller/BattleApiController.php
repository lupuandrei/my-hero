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

        $hero = Hero::generate(null);
        $monster = Monster::generate("Lucifer");

        $battleManager = new BattleManager($hero, $monster);
        $battleManager->battle();
    }
}