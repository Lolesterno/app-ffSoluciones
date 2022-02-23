<?php

namespace controllers;

use Model\Usuario;
use MVC\Router;

class LoginController {

    public static function login (Router $router) {


        if(!isset($_SESSION)){
            if($_SESSION['admin']){
                header('Location: /admin');
            }

            header('location: /asesor');
        }
        
        $auth = new Usuario;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth->sincronizar($_POST);

            $alertas = $auth->validarLogin();

            if( empty($alertas) ) {
                $usuario = Usuario::where('usuario', $auth->usuario);

                if($usuario) {
                    //El usuario si existe
                    session_start();

                    $_SESSION['id'] = $usuario->id;
                    $_SESSION['nombre'] = $usuario->nombre . " ". $usuario->apellido;
                    $_SESSION['rol'] = $usuario->rol;
                    $_SESSION['correo'] = $usuario->email;
                    $_SESSION['login'] = true;

                    if($usuario->rol === '1'){
                        $_SESSION['admin'] = true ?? null;
                        header('Location: /admin');
                    } else {
                        header('Location: /asesor');
                    }

                } else {
                    Usuario::setAlerta('error', 'Usuario no existe');
                }
            }
        }

        $alertas = Usuario::getAlertas();        
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesion',
            'alertas' => $alertas
        ]);
    }

    public static function logout () {
        session_destroy();

        header('Location: /');
    }
}