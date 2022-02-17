<?php 

namespace Model;

class Departamento extends ActiveRecord {
    protected static $tabla = 'departamentos';
    protected static $columnasDB = ['id', 'departamento'];

    public $id;
    public $departamento;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->departamento = $args['departamento'] ?? ''; 
    }

    
}