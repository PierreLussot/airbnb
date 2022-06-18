<?php

use App\App;

const DS = DIRECTORY_SEPARATOR;
const PATH_ROOT =  __DIR__ . DS;
const STANDARD = 2;
const ADMIN = 1;
const MAISON = 1;
const APPART = 2;
const CHAMBRE = 3;

require_once PATH_ROOT . 'vendor/autoload.php';

App::getApp()->start();