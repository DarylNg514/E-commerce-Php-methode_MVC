<?php

use App\Autoloader;
use App\Core\Main;

// on definit une constante pour le dossier racine

define('ROOT', dirname(__DIR__));

require_once ROOT .'/Autoloader.php';

Autoloader::register();

$app = new Main();

$app->start();

