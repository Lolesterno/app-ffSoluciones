<?php

namespace Model;

class Garantias extends ActiveRecord {
    protected static $tabla = 'garantia';
    protected static $columnasDB = ['id', 'medidorId', 'serialMedidor', 'estado', 'fecha', 'horaIngreso', 'tipoFactura', 'numeroFactura', 'archivoGarantia', 'clienteId', 'comentarios'];

    public function __construct($args = []){

        $this->id = $args['id'] ?? null;
        $this->medidorId = $args['medidorId'] ?? '';
        $this->serialMedidor = $args['serialMedidor'] ?? '';
        $this->estado = $args['estado'] ?? 0;
        $this->fecha = $args['fecha'] ?? date('Y-m-d');
        $this->horaIngreso = $args['horaIngreso'] ?? date('H:i');
        $this->tipoFactura = $args['tipoFactura'] ?? '';
        $this->numeroFactura = $args['numeroFactura'] ?? '';
        $this->archivoGarantia = $args['archivoGarantia'] ?? '';
        $this->clienteId = $args['clienteId'] ?? '';
        $this->comentarios = $args['comentarios'] ?? '';
        
    }

    public function validar() {
        if(!$this->clienteId) {
            self::$alertas['error'][] ='El nombre del Cliente es Obligatorio';
        }
        if(!$this->medidorId) {
            self::$alertas['error'][] ='El tipo de Medidor es Obligatorio';
        }
        if(!$this->serialMedidor) {
            self::$alertas['error'][] ='El Serial es Obligatorio';
        }
        if(!$this->tipoFactura) {
            self::$alertas['error'][] ='El tipo de Factura es Obligatorio';
        }
        if(!$this->numeroFactura) {
            self::$alertas['error'][] ='El numero de la factura es Obligatorio';
        }
        if(!$this->archivoGarantia) {
            self::$alertas['error'][] ='El archivo es Obligatorio';
        }
        return self::$alertas;
    }

    public static function garantiasClientes() {
        $query = "SELECT ".self::$tabla.".clienteId FROM ".self::$tabla." INNER JOIN clientes ON ".self::$tabla.".clienteId = cliente.id LIMIT 1";
        debugear($query);
    }
}