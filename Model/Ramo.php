<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Conexion.php';

class Ramo implements JsonSerializable {

    private $id;
    private $ramo;

    function __construct($id, $ramo) {
        $this->id = $id;
        $this->ramo = $ramo;
    }

    public static function getRamos() {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro_ramo";
        $consulta = $conexion->query($select);

        $ramos = [];

        while ($registro = $consulta->fetchObject()) {
            $ramos[] = new Ramo($registro->id, $registro->ramo);
        }

        return $ramos;
    }

    public static function getRamosSinAutos() {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro_ramo";
        $consulta = $conexion->query($select);

        $ramos = [];
        $ramosSinAutos = [];

        while ($registro = $consulta->fetchObject()) {
            $ramos[] = new Ramo($registro->id, $registro->ramo);
        }

        foreach ($ramos as $ramo) {
            if ($ramo->id > 1) {
                $ramosSinAutos[] = new Ramo($ramo->id, $ramo->ramo);
            }
        }


        return $ramosSinAutos;
    }

    function getId() {
        return $this->id;
    }

    function getRamo() {
        return $this->ramo;
    }

    public function jsonSerialize() {
        return [
            "id" => $this->id,
            "ramo" => $this->ramo
        ];
    }

}
