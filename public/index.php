<?php

echo  'Test';

require_once '../app/bootstrap.php';

use App\Model\Hero;
use App\Model\Monster;

$test = Hero::initializeOrderus();
$monster = Monster::generateMonster();

echo $test;
echo $monster;

