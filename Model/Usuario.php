<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Conexion.php';

class Usuario implements JsonSerializable{

    private $id;
    private $usuario;
    private $password;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $email;
    private $telefono;
    private $alta;
    private $nivel;
    private $cliente_id;
    private $cliente_sucursal_id;

    function __construct($id, $usuario, $password, $nombre, $apellido1, $apellido2, $email, $telefono, $alta, $nivel, $cliente_id, $cliente_sucursal_id) {

        $this->id = $id;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->alta = $alta;
        $this->nivel = $nivel;
        $this->cliente_id = $cliente_id;
        $this->cliente_sucursal_id = $cliente_sucursal_id;
    }

    public static function getUsuarios() {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM usuario";
        $consulta = $conexion->query($select);

        $usuarios = [];

        while ($registro = $consulta->fetchObject()) {
            $usuarios[] = new Usuario($registro->id, $registro->usuario, $registro->password, $registro->nombre, $registro->apellido1, $registro->apellido2, $registro->email, $registro->telefono, $registro->alta, $registro->nivel, $registro->cliente_id, $registro->cliente_sucursal_id);
        }

        return $usuarios;
    }



    function getId() {
        return $this->id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido1() {
        return $this->apellido1;
    }

    function getApellido2() {
        return $this->apellido2;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getAlta() {
        return $this->alta;
    }

    function getNivel() {
        return $this->nivel;
    }
    
    function getCliente_id() {
        return $this->cliente_id;
    }
    function getCliente_sucursal_id() {
        return $this->cliente_sucursal_id;
    }

    
            
    public function jsonSerialize() {
        return [
            "id" => $this->id,
            "usuario" => $this->usuario,
            "password" => $this->password,
            "nombre" => $this->nombre,
            "apellido1" => $this->apellido1,
            "apellido2" => $this->apellido2,
            "email" => $this->email,
            "telefono" => $this->telefono,
            "alta" => $this->alta,
            "nivel" => $this->nivel,
            "cliente_id" => $this->cliente_id,
            "cliente_sucursal_id" => $this->cliente_sucursal_id
        ];
    }

}
