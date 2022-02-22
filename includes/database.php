<?php

$db = mysqli_connect('localhost', 'root', 'root', 'ff_soluciones');

if(!$db) {
    echo 'Error: no se pudo conectar a MYSQL';
    echo 'Errno de depuracion: '. mysqli_connect_errno();
    echo 'Errno de depuracion: '. mysqli_connect_error();
    exit;
}