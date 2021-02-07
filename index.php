<?php

spl_autoload_register(function ($class) {
    require_once(str_replace('\\', '/', lcfirst($class) . '.php'));
});

use App\Model\Hero;
use App\Model\Monster;

//$test = new Range(10, 40);

$test = Hero::initializeOrderus();
$monster = Monster::generateMonster();

echo $test;
echo $monster;
//$c = new \App\Helper\Range(2, 31);
//echo $c->getRandom();

//$c = 0;

//$c++;

//echo 'test s';
//echo $c;
//print_r($test->getRandom());

