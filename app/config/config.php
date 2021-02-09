<?php

define("ROOT" , ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR  . "emag" . DIRECTORY_SEPARATOR);
define('APP_ROOT', dirname(dirname(__FILE__)));
define("CONTROLLER", ROOT . "app" . DIRECTORY_SEPARATOR . "controller" . DIRECTORY_SEPARATOR);
define("VIEW", ROOT . "app" . DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR);

define('SITE_NAME', 'Orderus');
define('APP_VERSION', '1.0.0-beta');
define('APP_DATE', 'JAN 10, 2021');

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','test');
define('DB_NAME','emag_game');
define('DB_CHARSET','utf8');
