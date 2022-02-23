<?php 

//APIS PARA LAS GARANTIAS
namespace controllers;

use Model\Garantia;
use Model\Garantias;

class GarantiaController {
    public static function index() {

        isAuth();
        isAdmin();

        $url = $_GET['url'];
        if(!$url) header('Location: /404');

        $garantias = Garantias::where('url', $url);
        if(!$garantias || $_SESSION['admin'] === false) header('Location: /404');

        $garantia = Garantia::belongsTo('garantiaId', $garantias->id);

        echo json_encode(['garantia' => $garantia]);
        
    }

    public static function crear() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $garantias = Garantias::where('url', $_POST['garantiaId']);

            if(!$garantias){
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Hubo un error al agregar la Garantia'
                ];
                echo json_encode($respuesta);
                return;
            }
            
            //Si todo sale bien
            $garantia = new Garantia($_POST);

            
            $garantia->fecha = date('Y-m-d');
            $garantia->horaIngreso = date('G:i:s');
            $garantia->garantiaId = $garantias->id;
            $resultado = $garantia->guardar();
            $respuesta = [
                'tipo' => 'exito',
                'id' => $resultado['id'],
                'mensaje' => 'Garantia agregada Correctamente'
            ];            

            echo json_encode($respuesta);

        }
    }

    public static function actualizar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
    }

    public static function buscar() {
        $id = $_GET['id'];

        $garantia =  Garantia::where('id', $id);  

        if(!$garantia) {
            $respuesta = [
                'tipo' => 'error',
                'id' => $id,
                'mensaje' => 'La garantia no existe'
            ];
            echo json_encode($respuesta);
            return;
        }

        echo json_encode($garantia);

    }

    public static function generarPDF() {
        $id = $_GET['id'];
    }
}