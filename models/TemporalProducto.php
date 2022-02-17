<?php

namespace Model;

class TemporalProducto extends ActiveRecord {
    protected static $tabla = 'cotizacion_detalle_temporal';
    protected static $columnasDB = ['id', 'nombre', 'precio', 'cantidad', 'descuento'];

    public $id;
    public $nombre;
    public $precio;
    public $cantidad;
    public $descuento;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre =  $args['nombre'] ?? '';
        $this->precio =  $args['precio'] ?? '';
        $this->cantidad =  $args['cantidad'] ?? '';
        $this->descuento =  $args['descuento'] ?? '';
    }

    public static function perBusqueda($token) {
        $query = 'SELECT * FROM ' .self::$tabla. ' INNER JOIN producto ON '.self::$tabla.'.productoId = producto.id WHERE '.self::$tabla.'.token = '.$token.' ;';
        $result = self::consultarSQL( $query );  
        return $result;
    }
}