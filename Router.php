<?php 

namespace MVC;

class Router {
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn){

        $this->getRoutes[$url] = $fn;

    }

    public function post($url, $fn) {

        $this->postRoutes[$url] = $fn;

    }

    public function comprobarRutas()
    {
        //Proteger las rutas
        session_start();

        //Arreglo de las rutas protegidas 
        /*
            $rutas_protegidas = ['/admin', '/templates', '/asesor']

            $auth = $_SESSION['login'] ?? null;
        */

        $currentUrl = ($_SERVER['REQUEST_URI'] === '') ? '/': $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $splitURL = explode('?', $currentUrl);

        if($method === 'GET') {
            $fn = $this->getRoutes[$splitURL[0]] ?? null;
        } else {
            $fn = $this->postRoutes[$splitURL[0]] ?? null;
        }

        if($fn) {
            //Call user Function va a llamar una funcion cuando no sabemos cual sera
            call_user_func($fn, $this); // This es para pasar los argumentos
        } else {
            echo 'Pagina no encontrada ERROR 404';
        }
    }

    public function render($view, $datos = [])
    {
        //Leer lo que pasamos a la vista
        foreach ($datos as $key => $value) {
            $$key = $value; //Variable variable
        }

        ob_start(); //Inicio de almacenamiento en memoria de la plantilla

        //Incluir la vista de la plantilla
        include_once __DIR__."/views/$view.php";
        $contenido = ob_get_clean(); //Limpiamos el bufer de memoria para mostrar el contenido
        include_once __DIR__ . '/views/layout.php';

    }
}