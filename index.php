<?php

define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.
define('ROOT', dirname(__FILE__).DS); // path
define('PATH_PUBLIC', 'App\\Controller\\');
define('PATH_ADMIN', 'App\\Controller\\Admin\\');

//autoload app
require ROOT.'app/App.php';
App\App::load();


