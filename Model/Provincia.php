<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Conexion.php';

class Provincia implements JsonSerializable{

    private $id;
    private $nombre;

    function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;        
    }

    public static function getProvincias() {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro_pvcia ORDER BY nombre";
        $consulta = $conexion->query($select);

        $provincias = [];

        while ($registro = $consulta->fetchObject()) {
            $provincias[] = new Provincia($registro->id, $registro->nombre);
        }

        return $provincias;
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
