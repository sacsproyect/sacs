<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Conexion.php';

class SiniestroTipo implements JsonSerializable {

    private $id;
    private $tipo;
    private $orden;
    private $ramo;
    

    function __construct($id, $tipo, $orden, $ramo) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->orden = $orden;
        $this->ramo = $ramo;
        
    }


    public static function getSiniestroSoloTipos($tipoSiniestro) {
        $conexion = Conexion::connectDB();
        $select = "SELECT tipo FROM siniestro_tipo LIKE'%" . $tipoSiniestro . "%'LIMIT 20";
        $consulta = $conexion->query($select);

        $siniestroTipos = [];

        while ($registro = $consulta->fetchObject()) {
            $siniestroTipos[] = new SiniestroTipo($registro->id, $registro->tipo, $registro->ramo, $registro->orden);
        }
        return $siniestroTipos;
    }

    public static function getSiniestroTipoByTipo($tipoSiniestro) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro_tipo WHERE tipo='$tipoSiniestro'";
        $consulta = $conexion->query($select);
        $registro = $consulta->fetchObject();

        $siniestroTipo = new SiniestroTipo($registro->id, $registro->tipo, $registro->ramo, $registro->orden);

        return $siniestroTipo;
    }

    public static function getSiniestroTiposByCategoria($categoria) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro_tipo WHERE ramo='$categoria' ORDER BY orden";
        $consulta = $conexion->query($select);

        $siniestroTipos = [];

        while ($registro = $consulta->fetchObject()) {
            $siniestroTipos[] = new SiniestroTipo($registro->id, $registro->tipo, $registro->ramo, $registro->orden);
        }

        return $siniestroTipos;
    }

    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }
    
    function getRamo() {
        return $this->ramo;
    }

    function getOrden() {
        return $this->orden;
    }

    
    public function jsonSerialize() {
        return [
            "id" => $this->id,
            "tipo" => $this->tipo,
            "ramo" => $this->ramo,
            "orden" => $this->orden
        ];
    }

}
