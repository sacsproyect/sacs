<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Conexion.php';

class Mensajes implements JsonSerializable {

    private $idmensajes;
    private $expsin;
    private $registro;
    private $texto;
    private $usuario;
    private $usointerno;
    private $leidopormayordomo;

//    function __construct($idmensajes, $expsin, $registro, $texto, $usuario, $usointerno, $leidopormayordomo) {
//        $this->idmensajes = $idmensajes;
//        $this->expsin = $expsin;
//        $this->registro = $registro;
//        $this->texto = $texto;
//        $this->usuario = $usuario;
//        $this->usointerno = $usointerno;
//        $this->leidopormayordomo = $leidopormayordomo;
//    }
    
  function __construct( $expsin, $registro, $texto, $usuario) {
        $this->expsin = $expsin;
        $this->registro = $registro;
        $this->texto = $texto;
        $this->usuario = $usuario;
    }
    
    public static function getMensajes() {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM mensajes";
        $consulta = $conexion->query($select);

        $mensajes = [];

        while ($registro = $consulta->fetchObject()) {
            $mensajes[] = new Mensajes($registro->idmensajes, $registro->expsin, $registro->registro
                    , $registro->texto, $registro->usuario, $registro->usointerno, $registro->leidopormayordomo);
        }

        return $mensajes;
    }
    
    public static function insertMensaje($datos) {
            $conexion = Conexion::connectDB();
        $insercion = "INSERT INTO mensajes (expsin, registro, texto, "
                . "usuario) " .
                "VALUES ('$datos->expsin', '$datos->registro', '$datos->texto', "
                . "'$datos->usuario')";
        $conexion->exec($insercion);
      
        $lastInsertId = $conexion->lastInsertId();
        return $lastInsertId;
    }    
    
    

    function getIdMensajes() {
        return $this->idmensajes;
    }

    function getExpsin() {
        return $this->expsin;
    }

    function getRegistro() {
        return $this->registro;
    }

    function getTexto() {
        return $this->texto;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getUsoInterno() {
        return $this->usointerno;
    }

    function getLeidoPorMayordomo() {
        return $this->leidopormayordomo;
    }

    public function jsonSerialize() {
        return [
            "idmensajes" => $this->idmensajes,
            "expsin" => $this->expsin,
            "registro" => $this->registro,
            "texto" => $this->texto,
            "usuario" => $this->usuario,
            "usointerno" => $this->usointerno,
            "leidopormayordomo" => $this->leidopormayordomo,            
        ];
    }

}
