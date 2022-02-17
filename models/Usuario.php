<?php

namespace Model;

class Usuario extends ActiveRecord {

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'usuario', 'email', 'pass', 'rol'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $usuario;
    public $email;
    public $pass;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->usuario = $args['usuario'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->pass = $args['pass'] ?? '';
        $this->rol = $args['rol'] ?? '';
    }
    
    public function existeUsuario() {
        $query =  "SELECT * FROM ". self::$tabla . " WHERE usuario = '" . $this->usuario . "' ";
        
        $resultado = self::$db->query($query);
        
        if($resultado->num_rows){
            self::$alertas['error'][] = 'El usuario ya existe';
        }

        return $resultado;
    }

    public function validarLogin()
    {
        if(!$this->usuario){
            self::$alertas['error'][] = 'El usuario es Obligatorio';
        }

        if(!$this->pass){
            self::$alertas['error'][] = 'La contraseña es Obligatoria';
        }

        return self::$alertas;
    }

    public function hashContraseña() {
        $this->pass = password_hash($this->pass, PASSWORD_BCRYPT);
    }

    public function comprobarContraseñaDelUsuario($pass) {
        $resultado = password_verify($pass, $this->pass);

        if(!$resultado) {
            self::$alertas['error'][] = 'La contraseña es incorrecta';
        } else {
            return true;
        }
    }

    public function validarFormulario() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre del Usuario es Obligatorio';
        }

        if(!$this->apellido) {
            self::$alertas['error'][] = 'El apellido del Usuario es Obligatorio';
        }

        if(!$this->telefono) {
            self::$alertas['error'][] = 'El telefono del Usuario es Obligatorio';
        }

        if(!$this->usuario) {
            self::$alertas['error'][] = 'El nombre de usuario es Obligatorio';
        }

        if(!$this->email) {
            self::$alertas['error'][] = 'El email del Usuario es Obligatorio';
        }

        if(!$this->pass) {
            self::$alertas['error'][] = 'La contraseña del Usuario es Obligatoria';
        }

        if(!$this->rol) {
            self::$alertas['error'][] = 'El Rol del Usuario es Obligatorio';
        }

        return self::$alertas;
    }

    

}