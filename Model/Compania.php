<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Conexion.php';

class Compania implements JsonSerializable{

    private $id;
    private $nombre;

    function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;        
    }

    public static function getCompanias() {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro_cia ORDER BY nombre";
        $consulta = $conexion->query($select);

        $companias = [];

        while ($registro = $consulta->fetchObject()) {
            $companias[] = new Compania($registro->id, $registro->nombre);
        }

        return $companias;
    }

    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    
            
    public function jsonSerialize() {
        return [
            "id" => $this->id,          
            "nombre" => $this->nombre           
        ];
    }

}
