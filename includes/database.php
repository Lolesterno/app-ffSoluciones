<?php

$db = mysqli_connect($_ENV['DB_HOST'], 
                        $_ENV['DB_USER'], 
                        $_ENV['DB_PASS'], 
                        $_ENV['DB_BD']);
$db->set_charset("utf8");

if(!$db) {
    echo 'Error: no se pudo conectar a MYSQL';
    echo 'Errno de depuracion: '. mysqli_connect_errno();
    echo 'Errno de depuracion: '. mysqli_connect_error();
    exit;
}