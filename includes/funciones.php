<?php

define('CARPETA_IMAGENES', __DIR__ . '/imagenes/');

function debugear($var) : string {
    echo '<pre>';
        var_dump($var);
    echo '</pre>';
    exit;
}

//Sanitizar HTML
function s ($html) :string {
    $s = htmlspecialchars($html);
    return $s;
}

function redireccionar (string $url) {

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: ${url}");
    }

    return $id;
}

function isAuth() : void {
    if(!isset($_SESSION['login'])){
        header('Location: /');
    }
}

function isAdmin() : void {
    if(!isset($_SESSION['admin'])){
        header('Location: /asesor');
    }
}