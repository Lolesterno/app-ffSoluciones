<?php

namespace Model;

class Garantias extends ActiveRecord {
    protected static $tabla = 'garantias';
    protected static $columnasDB = ['id', 'nombreCliente', 'url', 'usuarioId'];

    public function __construct($args = []){

        $this->id = $args['id'] ?? null;
        $this->nombreCliente = $args['nombreCliente'] ?? '';
        $this->url = $args['url'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
        
    }

    public function validar() {
        if(!$this->nombreCliente) {
            self::$alertas['error'][] ='El nombre del Cliente es Obligatorio';
        }
        return self::$alertas;
    }
}