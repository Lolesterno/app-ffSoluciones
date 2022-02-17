<?php

namespace Model;

class Producto extends ActiveRecord {
    
    protected static $tabla = 'producto';
    protected static $columnasDB = ['id', 'codigo', 'nombre', 'precio', 'descripcion', 'diametro', 'imagen', 'categoriaId'];

    public $id;
    public $codigo;
    public $nombre;
    public $precio;
    public $descripcion;
    public $diametro;
    public $imagen;
    public $categoriaId;

    //Funcion constructora
    public function __construct( $args = [] )
    {
        $this->id = $args['id'] ?? null;
        $this->codigo = $args['codigo'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->diametro = $args['diametro'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->categoriaId = $args['categoriaId'] ?? '1';
    }

    public function validar () {
        if(!$this->codigo){
            self::$alertas['error'][] = 'Es requerido el Codigo del Producto';
        }

        if(!$this->nombre){
            self::$alertas['error'][] = 'Es requerido el Nombre del Producto';
        }

        if(!$this->precio){
            self::$alertas['error'][] = 'Es requerido el Precio del Producto';
        }

        if(!$this->diametro){
            self::$alertas['error'][] = 'Es requerido el Diametro del Producto';
        }

        if(!$this->imagen){
            self::$alertas['error'][] = 'Es requerido la Foto del Producto';
        }

        if(!$this->categoriaId){
            self::$alertas['error'][] = 'Es requerido la Categoria del Producto';
        }

        return self::$alertas;

    }

    public function existeProducto() {
        $query =  "SELECT * FROM ". self::$tabla . " WHERE codigo = '" . $this->codigo . "' ";
        
        $resultado = self::$db->query($query);
        
        if($resultado->num_rows){
            self::$alertas['error'][] = 'El Producto ya existe';
        }

        return $resultado;
    }


    public static function buscar($columna, $valor) {
        $query = "SELECT * FROM ". self::$tabla ." WHERE ".$columna." = '".$valor."' LIMIT 1";
        $result = self::$db->query($query);

        if(!$result->num_rows) {
            return ('error');
        } 

        $result = self::consultarSQL($query);
        return array_shift($result);
        

    }

    public static function buscarPro($valor) {
        $query = "SELECT * FROM ". self::$tabla . " WHERE codigo LIKE '%".$valor."%' LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            $resultado = self::consultarSQL($query);
            return array_shift($resultado);
        } else {
            echo 'error';
        }

        return $resultado;
    }

    public static function buscarProducto() {
        $producto =  $_GET['buscarProducto'];

        $busqueda = Producto::buscarPro($producto);

        echo json_encode($busqueda);
    }


}