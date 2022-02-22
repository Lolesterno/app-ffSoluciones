<?php

namespace controllers;

use Model\Cliente;
use Model\Departamento;
use Model\Usuario;
use MVC\Router;

class ClienteController {
    public static function index(Router $router){
        isAuth();
        $alertas = [];

        $router->render('/clientes/index', [
            'alertas' => $alertas
        ]);
    }

    public static function crear (Router $router) {
        isAuth();
        isAdmin();
        $alertas = [];
        $departamentos = Departamento::all();
        $usuarios = Usuario::all();

        $cliente = new Cliente($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cliente->sincronizar($_POST);

            $alertas = $cliente->validarFormulario();

            if(empty($alertas)){
                $resultado = $cliente->existeCliente();

                if($resultado->num_rows){
                    $alertas = Cliente::getAlertas();
                } else {
                    $res = $cliente->guardar();

                    if($res){
                        header('Location: /clientes');
                        Cliente::setAlerta('exito', 'Cliente Creado Satisfactoriamente');
                    }
                }
            }

        }

        $alertas = Cliente::getAlertas();
        $router->render('/clientes/crear-cliente', [
            'alertas' => $alertas,
            'cliente' => $cliente,
            'departamentos' => $departamentos,
            'usuarios' => $usuarios
        ]);
    }


    public static function editar (Router $router){

        isAuth();
        isAdmin();

        $alertas = Cliente::getAlertas();
        $idCliente = redireccionar('/clientes');
        $clientes = Cliente::find($idCliente);
        $departamentos = Departamento::all();
        $usuarios = Usuario::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $clientes->sincronizar($_POST);           

            //Errores
            $alertas = $clientes->validarFormulario();

            if(empty($alertas)){
                $clientes->guardar();

                header('Location: /clientes');
                Cliente::setAlerta('exito', 'Cliente Actualizado correctamente');
            }
        }

        $alertas = Cliente::getAlertas();
        $router->render('/clientes/editar-cliente',[
            'alertas' => $alertas,
            'clientes' => $clientes,
            'departamentos' => $departamentos,
            'usuarios' => $usuarios
        ]);
    }
}