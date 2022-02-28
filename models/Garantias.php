<?php

namespace Model;

class Garantias extends ActiveRecord {
    protected static $tabla = 'garantias';
    protected static $columnasDB = ['id', 'medidorId', 'serialMedidor', 'estado', 'fecha', 'horaIngreso', 'tipoFactura', 'numeroFactura', 'archivoGarantia', 'clienteId'];

    public function __construct($args = []){

        $this->id = $args['id'] ?? null;
        $this->medidorId = $args['medidorId'] ?? '';
        $this->serialMedidor = $args['serialMedidor'] ?? '';
        $this->estado = $args['estado'] ?? 0;
        $this->fecha = $args['fecha'] ?? date('Y - m - d');
        $this->horaIngreso = $args['horaIngreso'] ?? date('H:i');
        $this->tipoFactura = $args['tipoFactura'] ?? '';
        $this->numeroFactura = $args['numeroFactura'] ?? '';
        $this->archivoGarantia = $args['archivoGarantia'] ?? '';
        $this->clienteId = $args['clienteId'] ?? '';

        
    }

    public function validar() {
        if(!$this->nombreCliente) {
            self::$alertas['error'][] ='El nombre del Cliente es Obligatorio';
        }
        return self::$alertas;
    }
}