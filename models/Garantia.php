<?php 

namespace Model;

class Garantia extends ActiveRecord {
    protected static $tabla = 'garantia';
    protected static $columnasDB = ['id', 'medidorId', 'serialMedidor', 'estado', 'fecha', 'horaIngreso', 'garantiaId', 'tipoFactura', 'numeroFactura', 'archivoGarantia'];

    public function __construct($args = []){

        $this->id = $args['id'] ?? null;
        $this->medidorId = $args['medidorId'] ?? '';
        $this->serialMedidor = $args['serialMedidor'] ?? '';
        $this->estado = $args['estado'] ?? 0;
        $this->fecha = $args['fecha'] ?? '';
        $this->horaIngreso = $args['horaIngreso'] ?? '';
        $this->garantiaId = $args['garantiaId'] ?? '';
        $this->tipoFactura = $args['tipoFactura'] ?? '';
        $this->numeroFactura = $args['numeroFactura'] ?? '';
        $this->archivoGarantia = $args['archivoGarantia'] ?? '';
    }
}