<?php

spl_autoload_register(function ($class) {
    require_once(str_replace('\\', '/', lcfirst($class) . '.php'));
});

use App\Model\Hero;

//$test = new Range(10, 40);

$test = new Hero("Andrei");

//$c = new \App\Helper\Range(2, 31);
//echo $c->getRandom();

//$c = 0;

//$c++;

//echo 'test s';
//echo $c;
//print_r($test->getRandom());

