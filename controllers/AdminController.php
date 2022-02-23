<?php
namespace controllers;

use MVC\Router;

class AdminController {

    public static function index(Router $router){
        isAdmin();
        
        $router->render('/admin/index', [
            'titulo' => 'Dash Administrador'

        ]);
    }
}