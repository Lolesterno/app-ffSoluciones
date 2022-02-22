<?php 

namespace Model;

class Medidor extends ActiveRecord {

    protected static $tabla = 'medidor';
    protected static $columnasDB = ['id', 'tipo_medidor', 'categoria_medidor_id'];

    public function __construct($args = []){

        $this->id = $args['id'] ?? null;
        $this->tipo_medidor = $args['tipo_medidor'] ?? '';
        $this->categoria_medidor_id = $args['categoria_medidor_id'] ?? '';

    }
}