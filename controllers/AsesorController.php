<?php

namespace controllers;

use MVC\Router;

class AsesorController {

    public static function index (Router $router) {
        
        isAuth();

        $router->render('/asesor/index', [
            'titulo' => 'Inicio Asesor'
        ]);
    }
}