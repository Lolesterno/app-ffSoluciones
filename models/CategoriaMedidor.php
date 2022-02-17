<?php 

namespace Model;

class CategoriaMedidor extends ActiveRecord {
    protected static $tabla = 'categoriamedidor';
    protected static $columnasDB = ['id', 'categoria'];

    public $id;
    public $categoria;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->categoria = $args['categoria'] ?? '';
    }
}