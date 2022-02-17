<?php 

namespace Model;

class PostTemporal extends ActiveRecord {
    protected static $tabla = 'cotizacion_detalle_temporal';
    protected static $columnasDB = ['id', 'token', 'productoId', 'cantidad', 'precio', 'descuento'];

    public $id;
    public $token;
    public $productoId;
    public $cantidad;
    public $precio;
    public $descuento;

    public function __construct( $args = [] )
    {
        $this->id = $args['id'] ?? null;
        $this->token = $args['token'] ?? '';
        $this->productoId = $args['productoId'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descuento = $args['descuento'] ?? '';
    }

    public function validar()
    {
        if(!$this->cantidad){
            self::$alertas['error'][] = 'Es requerida una Cantidad';
        }

        if($this->descuento < 0 || $this->descuento > 50){
            self::$alertas['error'][] = 'El descuento no es valido';
        }

        return self::$alertas;
    }

    public function tokenUsuario()
    {
        $this->token =  $_SESSION['id'] ;
    }

    public static function busquedaPer($campo, $columna, $valor){
        $query = "SELECT ". $campo . " FROM producto  WHERE ${columna} = '${valor}'"; 
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            $resultado = self::consultarSQL($query);
            $res = array_shift($resultado);
            return $res->precio;
        } else {
            $resultado = self::$alertas['error'][] = 'error';
        }
    }

    public function precio() {
        $this->precio = self::busquedaPer('precio', 'id', $this->productoId);
    }
}