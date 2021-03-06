<?php

define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.
define('ROOT', dirname(__FILE__).DS); // path
define('PATH_PUBLIC', 'App\\Controller\\');
define('PATH_ADMIN', 'App\\Controller\\Admin\\');
//Bascule d'environnement DEV || PROD
define('MODE', 'DEV');

//autoload app
require "vendor/autoload.php";
require ROOT.'app/Autoloader.php';
//require ROOT.'app/Controller/Admin/AppController.php';
$loader = new App\Autoloader;
$loader->register();
$loader->addNamespace('App', 'app');
$loader->addNamespace('Core', 'core');

//autoload app
require ROOT.'app/App.php';
App\App::load();


