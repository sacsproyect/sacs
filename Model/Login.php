<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Conexion.php';

class Login implements JsonSerializable {

    private $id;
    private $usuario;
    private $registro;
    private $navegador;
    private $ip;
    private $equipo;
 

    function __construct($id, $usuario, $registro, $navegador, $ip, $equipo) {
                
        $this->id = $id;
        $this->usuario = $usuario;
        $this->registro = $registro;
        $this->navegador = $navegador;
        $this->ip = $ip;
        $this->equipo = $equipo;
        
    }
    function getId() {
        return $this->id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getRegistro() {
        return $this->registro;
    }

    function getNavegador() {
        return $this->navegador;
    }

    function getIp() {
        return $this->ip;
    }

    function getEquipo() {
        return $this->equipo;
    }

    
    public static function insertLogin($us, $navegador, $ip, $equipo) {
        $conexion = Conexion::connectDB();
        $insercion = "INSERT INTO login (usuario, navegador, ip, equipo) " .
                "VALUES ('$us', '$navegador', '$ip', '$equipo')";
        $conexion->exec($insercion);
    }

    public function jsonSerialize() {
        return [
            "id" => $this->id,
            "usuario" => $this->usuario,
            "registro" => $this->registro,
            "navegador" => $this->navegador,
            "ip" => $this->ip,
            "equipo" => $this->equipo           
        ];
    }

}
