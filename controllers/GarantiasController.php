<?php 

namespace controllers;

use MVC\Router;
use Model\Garantia;
use Model\Garantias;
use Model\CategoriaMedidor;

class GarantiasController {
    public static function index( Router $router ) {

        isAuth();
        isAdmin();
        $id = $_SESSION['id'];

        $garantias = Garantias::belongsTo('usuarioId', $id );

                        
        $router->render('/garantias/index', [
            'garantias' => $garantias
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
            'alertas' => $alertas
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