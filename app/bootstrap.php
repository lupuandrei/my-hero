<?php

require_once 'config/config.php';

// import class using namespace
spl_autoload_register(function ($classPath) {

    $classPath = explode("\\", $classPath); // e.g. ["App", "Model", "Hero"]
    array_shift($classPath); // remove first element. e.g ["Model", "Hero"]

    // make lowercase all words less the last one. e.g.: ["model", "Hero"]
    $i = 0;
    while ($i < count($classPath) - 1) {
        $classPath[$i] = lcfirst($classPath[$i]);
        $i++;
    }

    $classPath = implode("/", $classPath);

    require_once ($classPath . ".php");
});

