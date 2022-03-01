<?php 

namespace controllers;

use MVC\Router;

use Model\Garantias;
use Model\Cliente;
use Model\Departamento;
use Model\Medidor;

class GarantiasController {
    public static function index( Router $router ) {

        isAuth();
        isAdmin();
        $alertas = [];
        $garantias = new Garantias;
        $clientes = new Cliente;
        $todas = Garantias::all();
        //$todas['nombre'] = "HolaMundo";
        //debugear($todas);
        
                                
        $router->render('/garantias/index', [
            'titulo' => 'Garantias',
            'alertas' => $alertas,
            'todas' => $todas
        ]);
    }

    public static function crear( Router $router ) {

        isAuth();
        isAdmin();

        $alertas = [];
        $departamentos = Departamento::all();
        $medidorTipo = Medidor::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {


            $cliente = Cliente::where('nit', $_POST['nit']);
            
            $garantia = new Garantias($_POST);
            $garantia->clienteId = $cliente->id;

            $carpetaGarantias = 'garantiasArchivos/';

            if(!is_dir($carpetaGarantias)){
                mkdir($carpetaGarantias);
            }

            $nombreArchivo = uniqid( md5(rand()) ).'.pdf';

            if($_FILES['archivoGarantia']['tmp_name']){
                $garantia->setPDF($nombreArchivo);
            }

            $alertas = $garantia->validar();

            if( empty($alertas) ){
                if(!is_dir(CARPETA_PDF)){
                    mkdir(CARPETA_PDF);
                }

                $subirArchivo = move_uploaded_file($_FILES['archivoGarantia']['tmp_name'], CARPETA_PDF.$nombreArchivo);

                if($subirArchivo){
                    
                    $resultado = $garantia->guardar();
                    
                    if($resultado){
                        header('Location: /garantias');
                        $alertas = Garantias::setAlerta('exito', 'Garantia Creada correctamente');
                    }
                }

            }

        }
        
        $alertas = Garantias::getAlertas();
        $router->render('/garantias/crear-garantia', [
            'alertas' => $alertas,
            'titulo' => 'Nueva Garantia',
            'departamentos' => $departamentos,
            'medidores' => $medidorTipo
        ]);
    }

}