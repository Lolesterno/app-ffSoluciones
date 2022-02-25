<?php 

namespace controllers;

use Model\Departamento;
use MVC\Router;

class CotizacionController  {
    public static function index (Router $router) {

        isAuth();
        $token = $_SESSION['id'];
        $departamentos = Departamento::all();
        $alertas = [];        

        $router->render('/cotizaciones/index', [
            'departamentos' => $departamentos,
            'titulo' => 'Cotizaciones de '.$_SESSION['nombre'],
            'alertas' => $alertas 
        ]);
    }

    public static function nueva (Router $router){

        $alertas = [];

        $router->render('/cotizaciones/nueva-cotizacion', [
            'titulo' => 'Nueva Cotizacion',
            'alertas' => $alertas
        ]);
    }
}