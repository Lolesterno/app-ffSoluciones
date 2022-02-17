<?php 

namespace Model;

class Temporal extends ActiveRecord {
    protected static $tabla = 'cotizacion_detalle_temporal';
    protected static $columnasDB = ['id', 'token', 'productoId','cantidad', 'precio', 'descuento'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->token = $args['token'] ?? '';
        $this->productoId = $args['productoId'] ?? '';    
        $this->cantidad = $args['cantidad'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descuento = $args['descuento'] ?? '';

    }

}