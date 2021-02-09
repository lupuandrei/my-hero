<?php

use App\Model\Hero;
use App\Model\Monster;
use App\Manager\BattleManager;
use App\Library\Core;

require_once '../app/bootstrap.php';

//$init = new Core();

$test = Hero::generate(null);
$monster = Monster::generate(null);

$battleManager = new BattleManager($test, $monster);
$battleManager->battle();

echo $test;
echo $monster;

