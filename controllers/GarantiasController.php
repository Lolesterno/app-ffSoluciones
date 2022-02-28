<?php 

namespace controllers;

use MVC\Router;

use Model\Garantias;
use Model\CategoriaMedidor;

class GarantiasController {
    public static function index( Router $router ) {

        isAuth();
        isAdmin();
        $alertas = [];
                                
        $router->render('/garantias/index', [
            'titulo' => 'Garantias',
            'alertas' => $alertas
        ]);
    }

    public static function crear( Router $router ) {

        isAuth();
        isAdmin();

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $garantias = new Garantias($_POST);

            $alertas = $garantias->validar();

            if(empty($alertas)){

                $hash = md5( uniqid() );
                $garantias->url = $hash;

                $garantias->usuarioId = $_SESSION['id'];

                $garantias->guardar();

                header('Location: /garantia?url='.$garantias->url);
            }

        }
        
        $router->render('/garantias/crear-garantia', [
            'alertas' => $alertas,
            'titulo' => 'Nueva Garantia'
        ]);
    }

    public static function garantia(Router $router) {
        
        isAuth();
        isAdmin();

        $token = $_GET['url'];

        if(!$token) header('Location: /garantias');

        $garantia = Garantias::where('url', $token);

        if(!$garantia) header('Location: /garantias');
        
        $categorias =  CategoriaMedidor::all();

        $router->render('/garantias/garantia', [
            'titulo' => $garantia->nombreCliente,
            'categorias' => $categorias
        ]);
    }
}