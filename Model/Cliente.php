<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Conexion.php';

class Cliente implements JsonSerializable{

    private $id_cliente;
    private $nombre_cliente;

    function __construct($id_cliente, $id_usuario) {
        
        $this->id_cliente = $id_cliente;
        $this->nombre_cliente= $id_usuario; 
          
    }
    
    function __construct1() {
          
    }
    
  

  public static function getNombreClienteById($cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM cliente WHERE id='$cliente_id'";
        $consulta = $conexion->query($select);              
        $registro = $consulta->fetchObject();
        return $registro->nombre;
    }

  

    
    function getId_cliente() {
        return $this->id_cliente;
    }

    function getNombre_cliente() {
        return $this->nombre_cliente;
    }

      public function jsonSerialize() {
        return [
            "id_cliente" => $this->id_cliente,          
            "id_usuario" => $this->nombre_cliente,
       ];
    }
}
