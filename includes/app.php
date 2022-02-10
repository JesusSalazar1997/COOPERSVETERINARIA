<?php

require 'funciones.php ';
require 'config/databases.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectarnos la base de datos
$db=conectarDB();


use Model\Cita;


Cita::setDB($db);



