<?php

namespace controllers;

use MVC\Router;
use Model\Producto;
use Model\Categoria;
use Intervention\Image\ImageManagerStatic as Image;

class ProductosController {
    public static function index (Router $router){

        isAuth();
        $alertas = [];
        $productos = new Producto;
        $productos = Producto::all();
        
        $router->render('productos/index', [
            'productos' => $productos,
            'alertas' => $alertas
        ]);
    }

    public static function pdf(Router $router) {
        
        $router->render('productos/generar-pdf');
    }

    public static function crear(Router $router) {

        isAuth();
        isAdmin();        
        $alertas = Producto::getAlertas();
        $categorias =  Categoria::all();
        $productos = new Producto;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            
            $productos = new Producto($_POST);

            /* *Carpeta de imagenes* */
            $carpetaImagenes = 'imagenes/';
            
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            $nombreImagen = md5( uniqid( rand(), true ) ) .".jpg";

            if($_FILES['imagen']['tmp_name']){
                $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
                $productos->setImagen($nombreImagen);               
            }

            $alertas = $productos->validar();

            if(empty($alertas)) {

                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                $resultado = $productos->existeProducto();

                if($resultado->num_rows){
                    $alertas = Producto::getAlertas();
                } else {
                    $imagen->save(CARPETA_IMAGENES. $nombreImagen);

                    $resultado = $productos->guardar();

                    if($resultado){
                        header('Location: /productos');
                        Producto::setAlerta('exito', 'Producto creado correctamente');
                    }
                }

                
                
            }
        }

        $alertas = Producto::getAlertas();
        $router->render('productos/crear',[
            'alertas' => $alertas,
            'categorias' => $categorias,
            'productos' => $productos
        ]);
    }

    public static function editar(Router $router){

        isAuth();
        isAdmin();
        $idProducto = redireccionar('/productos');
        $producto = Producto::find($idProducto);
        $alertas = Producto::getAlertas();
        $categorias = Categoria::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $producto->sincronizar($_POST);

            $nombreImagen = md5( uniqid( rand(), true ) ). ".jpg";

            if($_FILES['imagen']['tmp_name']){
                $imagen =Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
                $producto->setImagen($nombreImagen);
            }



            $alertas = $producto->validar();

            if(empty($alertas)){

                if($_FILES['imagen']['tmp_name']){
                    $imagen->save(CARPETA_IMAGENES. $nombreImagen);
                }

                $producto->guardar();

                header('Location: /productos');
                Producto::setAlerta('exito', 'Producto Actualizado');
            }
        }
        
        $router->render('productos/editar-producto', [
            'alertas' => $alertas,
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }   


}