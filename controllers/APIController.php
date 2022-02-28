<?php

namespace controllers;

use Model\Cliente;
use Model\Producto;
use Model\Temporal;
use Model\TemporalProducto;
use Model\Usuario;

class APIController {
    public static function usuarios() {
        $usuarios = Usuario::all();
        echo json_encode($usuarios);
    }

    public static function productos() {
        $productos = Producto::all();
        echo json_encode($productos);
    }

    public static function clientes() {
        $clientes = Cliente::all();
        echo json_encode($clientes);
    }

    public static function buscarClientes() {

        $nit = $_GET['nit'];

        $clientes = Cliente::buscar('nit' ,$nit);

        if($clientes === 'error'){
            $respuesta = [
                'tipo' => 'error',
                'mensaje' => 'No se encontro el Cliente'
        ];
            echo json_encode(['respuesta' => $respuesta]);
            return; 
        }

        echo json_encode(['cliente' =>$clientes]);
    }

    public static function buscarProductos() {

        $producto = $_GET['codigo'];

        $productos = Producto::buscar('codigo' ,$producto);

        if($productos === 'error'){
            $resultado = [
                'tipo' => 'error',
                'mensaje' => 'No se encontro el Producto, Intenta de nuevo'
            ];
            echo json_encode($resultado);
            return;
        }        

        echo json_encode(['producto' => $productos]);      

    }

    public static function temporal() {  
        
        if($_SERVER['REQUEST_METHOD']  === 'POST'){

            $temporal = new Temporal($_POST);
            $temporal->token = $_SESSION['id'];
            $res = $temporal->guardar();

            $resultado = [
                'tipo' => 'exito',
                'id' => $res['id'],
                'mensaje' => 'Producto Agregado',
                'productoId' => $temporal->productoId,
                'token' => $temporal->token
            ];
            
            echo json_encode($resultado);          
        }
    }

    public static function buscarProducto() {

        $producto =  $_GET['codigo'];

        $busqueda = Producto::buscarPro($producto);

        if($busqueda){
            header('Location: /editar-producto?id='.$busqueda->id);
            echo json_encode($busqueda);
        } else {
            header('Location: /productos');
        }


    }

    public static function temporalProductos() {

        $token = $_GET['token'];

        $productoToken = TemporalProducto::perBusqueda($token);
        
        echo json_encode(['producto' => $productoToken]);

    }

    public static function totales() {
        $token = $_GET['token'];

        $totales = TemporalProducto::totales($token);

        $subtotal = 0;
        $iva = 0;

        foreach($totales as $total) {

            $subtotal = $total->precio * $total->cantidad;
            
            debugear($subtotal);
        }

    }

}