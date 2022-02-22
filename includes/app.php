<?php


require 'funciones.php';
require 'database.php';
require __DIR__. '/../vendor/autoload.php';

//Conexion a la db
use Model\ActiveRecord;
ActiveRecord::setDB($db);