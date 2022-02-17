<?php 

namespace Model; 

class Categoria extends ActiveRecord {
    protected static $tabla = 'categoria'; 
    protected static $columnasDB = ['id', 'categoria'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->categoria = $args['categoria'] ?? '';
    }
}