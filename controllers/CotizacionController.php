<?php 

namespace controllers;

use Model\Departamento;
use Model\Temporal;
use MVC\Router;

class CotizacionController  {
    public static function index (Router $router) {

        isAuth();
        $token = $_SESSION['id'];
        $departamentos = Departamento::all();
        //$temporales =  Temporal::tokenUsuarioBusqueda($token);
        

        $router->render('/cotizaciones/index', [
            'departamentos' => $departamentos
            
        ]);
    }
}