<?php 

namespace Model;

class Cliente extends ActiveRecord {
    protected static $tabla = 'clientes';
    protected static $columnasDB = ['id', 'nit', 'razon_social', 'telefono', 'direccion' , 'correo', 'departamentoId', 'ciudad', 'usuarioId'];

    public $id;
    public $nit;
    public $razon_social;
    public $telefono;
    public $direccion;
    public $correo;
    public $departamentoId;
    public $ciudad;
    public $usuarioId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nit = $args['nit'] ?? '';
        $this->razon_social = $args['razon_social'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->departamentoId = $args['departamentoId'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
    }

    public function validarFormulario() {
        if(!$this->nit) {
            self::$alertas['error'][] = 'El NIT es Obligatorio';
        }

        if(!$this->razon_social) {
            self::$alertas['error'][] = 'La Razon Social es Obligatoria';
        }

        if(!$this->telefono) {
            self::$alertas['error'][] = 'El telefono es Obligatorio';
        }

        if(!$this->direccion) {
            self::$alertas['error'][] = 'La direccion es Obligatoria';
        }

        if(!$this->correo) {
            self::$alertas['error'][] = 'El Correo es Obligatorio';
        }

        if(!$this->departamentoId) {
            self::$alertas['error'][] = 'El departamento es Obligatorio';
        }

        if(!$this->ciudad) {
            self::$alertas['error'][] = 'La ciudad es Obligatoria';
        }

        if(!$this->usuarioId) {
            self::$alertas['error'][] = 'El encargado del cliente es Obligatorio';
        }

        return self::$alertas;
    }

    public function existeCliente() {
        $query = "SELECT * FROM ". self::$tabla . " WHERE nit = '" .$this->nit ."' ";

        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'][] = 'El Cliente ya existe';
        }

        return $resultado;
    }

    public static function buscar($columna, $valor) {
        $query = "SELECT * FROM ". self::$tabla ." WHERE ".$columna." = '".$valor."' LIMIT 1";
        $result = self::$db->query($query);

        if(!$result->num_rows) {
            echo 'error';
            return $result;
        } 

        $result = self::consultarSQL($query);
        return array_shift($result);
        return $result;

    }
}