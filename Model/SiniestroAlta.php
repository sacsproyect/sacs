<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Conexion.php';

class SiniestroAlta implements JsonSerializable {

    private $id;
    private $cliente_id;
    private $cliente_sucursal_id;
    private $siniestro_ramo_id;
    private $siniestro_tipo_id;
    private $asegurado;
    private $ciaaseguradora;
    private $poliza;
    private $matricula;
    private $telefono;
    private $vip;
    private $declaracion;
    private $fecha;
    private $hora;
    private $terceros;
    private $lesionados;
    private $intervencionfi;
    private $observaciones;
    private $direccion;
    private $localidad;
    private $provincia;
    private $cp;
    private $urgente;
    private $usuario;
    private $registro;
    private $leido_por_mayordomo;
    private $expsin;

    function __construct($id, $cliente_id, $cliente_sucursal_id, $siniestro_ramo_id, $siniestro_tipo_id, $asegurado, 
            $ciaaseguradora, $poliza, $matricula, $telefono, $vip, $declaracion, $fecha, $hora,
            $terceros, $lesionados, $intervencionfi, $observaciones, $direccion, $localidad,
            $provincia, $cp, $urgente, $usuario, $registro, $leido_por_mayordomo, $expsin) {
                
        $this->id = $id;
        $this->cliente_id = $cliente_id;
        $this->cliente_sucursal_id = $cliente_sucursal_id;
        $this->siniestro_ramo_id = $siniestro_ramo_id;
        $this->siniestro_tipo_id = $siniestro_tipo_id;
        $this->asegurado = $asegurado;
        $this->ciaaseguradora = $ciaaseguradora;
        $this->poliza = $poliza;
        $this->matricula = $matricula;
        $this->telefono = $telefono;
        $this->vip = $vip;
        $this->declaracion = $declaracion;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->terceros = $terceros;
        $this->lesionados = $lesionados;
        $this->intervencionfi = $intervencionfi;
        $this->observaciones = $observaciones;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->provincia = $provincia;
        $this->cp = $cp;
        $this->urgente = $urgente;
        $this->usuario = $usuario;
        $this->registro = $registro;
        $this->leido_por_mayordomo = $leido_por_mayordomo;
        $this->expsin = $expsin;
    }

    public static function insertSiniestroAlta($datos) {
        $conexion = Conexion::connectDB();
        $insercion = "INSERT INTO siniestro_alta (cliente_id, cliente_sucursal_id, siniestro_ramo_id, "
                . "siniestro_tipo_id, asegurado, ciaaseguradora, poliza, matricula, telefono, "
                . "vip, declaracion, fecha, hora, terceros, lesionados, intervencionfi, "
                . "observaciones, direccion, localidad, provincia, cp, urgente, usuario, "
                . "leido_por_mayordomo, expsin) " .
                "VALUES ('$datos->cliente_id', '$datos->cliente_sucursal_id', '$datos->siniestro_ramo_id', "
                . "'$datos->siniestro_tipo_id', '$datos->asegurado', '$datos->ciaaseguradora', "
                . "'$datos->poliza', '$datos->matricula', '$datos->telefono', '$datos->vip', '$datos->declaracion', "
                . "'$datos->fecha', '$datos->hora', '$datos->terceros', '$datos->lesionados', '$datos->intervencionfi', "
                . "'$datos->observaciones', '$datos->direccion', '$datos->localidad', '$datos->provincia', '$datos->cp', "
                . "'$datos->urgente', '$datos->usuario', '$datos->leido_por_mayordomo', '$datos->expsin')";
        $conexion->exec($insercion);
      
        $lastInsertId = $conexion->lastInsertId();
        return $lastInsertId;
    }



    public function jsonSerialize() {
        return [
            "id" => $this->id,
            "cliente_id" => $this->cliente_id,
            "cliente_sucursal_id" => $this->cliente_sucursal_id,
            "siniestro_ramo_id" => $this->siniestro_ramo_id,
            "siniestro_tipo_id" => $this->siniestro_tipo_id,
            "asegurado" => $this->asegurado,
            "ciaaseguradora" => $this->ciaaseguradora,
            "poliza" => $this->poliza,
            "matricula" => $this->matricula,
            "telefono" => $this->telefono,
            "vip" => $this->vip,
            "declaracion" => $this->declaracion,
            "fecha" => $this->fecha,
            "hora" => $this->hora,
            "terceros" => $this->terceros,
            "lesionados" => $this->lesionados,
            "intervencionfi" => $this->intervencionfi,
            "observaciones" => $this->observaciones,
            "direccion" => $this->direccion,
            "localidad" => $this->localidad,
            "provincia" => $this->provincia,
            "cp" => $this->cp,
            "urgente" => $this->urgente,
            "usuario" => $this->usuario,
            "registro" => $this->registro,
            "leido_por_mayordomo" => $this->leido_por_mayordomo,
            "expsin" => $this->expsin
        ];
    }

}
