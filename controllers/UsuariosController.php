<?php

namespace controllers;

use Model\Rol;
use Model\Usuario;
use MVC\Router;

class UsuariosController {
    public static function index(Router $router){

        isAuth();
        isAdmin();
        $alertas = [];
        
        $router->render('/usuarios/index',[
            'alertas' => $alertas,
            'titulo' => 'Usuarios'
        ]);
    }

    public static function crear(Router $router){

        isAuth();
        isAdmin();
        $usuario = new Usuario($_POST);

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarFormulario();

            //Alertas vacias
            if(empty($alertas)){

                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows){
                    $alertas = Usuario::getAlertas();
                } else {
                    //Hashear pass
                    $usuario->hashContraseña();

                    $resultado = $usuario->guardar();

                    if($resultado){
                        header('Location: /usuarios');
                        Usuario::setAlerta('exito', 'Usuario Creado correctamente');
                    }
                }
            }
        };

        $alertas = Usuario::getAlertas();

        $router->render('/usuarios/crear-usuario', [
            'usuario' => $usuario,
            'alertas' => $alertas,
            'titulo' => 'Crear Usuario'
        ]);
    }

    public static function editar(Router $router) {

        isAuth();
        isAdmin();
        $idUsuario = redireccionar('/usuarios');
        $usuarios = Usuario::find($idUsuario);
        $roles = Rol::all();
        $alertas = Usuario::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $usuarios->sincronizar($_POST);

            //Errores
            $alertas = $usuarios->validarFormulario();

            if( empty($alertas) ){
                $usuarios->hashContraseña();

                $usuarios->guardar();
                
                header('Location: /usuarios');
                Usuario::setAlerta('exito', 'Usuario Actualizado Correctamente');
                
            } 
        }

        $alertas = Usuario::getAlertas();
        $router->render('/usuarios/editar', [
            'usuario' => $usuarios,
            'alertas' => $alertas,
            'roles' => $roles,
            'titulo' => 'Editar Usuario'
        ]);
    }
}