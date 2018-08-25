<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Conexion.php';

class Historial implements JsonSerializable{

    private $id;
    private $expsin;
    private $fecha;
    private $hora;
    private $observacion;
    private $proxcita;
    private $horacita;
    private $estado;
    private $confiden;
    private $asegurado;
    private $poliza;
    private $siniestro;
    private $tipoSiniestro;
    private $ip;
    private $tag;
    private $cia;
    private $agente;
    private $ref;
    private $registro;

    function __construct($id, $expsin, $fecha, $hora, $observacion, $proxcita, $horacita, $estado, $confiden, $asegurado
            , $poliza, $siniestro, $tipoSiniestro, $ip, $tag, $cia, $agente, $ref, $registro) {
        
        $this->id = $id;
        $this->expsin = $expsin; 
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->observacion = $observacion;
        $this->proxcita = $proxcita;
        $this->horacita = $horacita;
        $this->estado = $estado;
        $this->confiden = $confiden;
        $this->asegurado = $asegurado;
        $this->poliza = $poliza;
        $this->siniestro = $siniestro;
        $this->tipoSiniestro = $tipoSiniestro;
        $this->ip = $ip;
        $this->tag = $tag;
        $this->cia = $cia;
        $this->agente = $agente;
        $this->ref = $ref;
        $this->registro = $registro;
    }

    public static function getHistorialByExp($expsin) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro_historial WHERE expsin = '$expsin'";
        $consulta = $conexion->query($select);

        $historial = [];

        while ($registro = $consulta->fetchObject()) {
            $historial[] = new Historial($registro->id, $registro->expsin, $registro->fecha, $registro->hora
                    , $registro->observacion, $registro->proxcita, $registro->horacita, $registro->estado, $registro->confiden
                    , $registro->asegurado, $registro->poliza, $registro->siniestro, $registro->tipoSiniestro, $registro->ip
                    , $registro->tag, $registro->cia, $registro->agente, $registro->ref, $registro->registro);
        }

        return $historial;
    }

  
    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getObservacion() {
        return $this->observacion;
    }

    
        public function jsonSerialize() {
        return [
            "id" => $this->id,          
            "expsin" => $this->expsin,
            "fecha" => $this->fecha,
            "hora" => $this->hora,
            "observacion" => $this->observacion,
            "proxcita" => $this->proxcita,
            "horacita" => $this->horacita,
            "estado" => $this->estado,
            "confiden" => $this->confiden,
            "asegurado" => $this->asegurado,
            "poliza" => $this->poliza,
            "siniestro" => $this->siniestro,
            "tipoSiniestro" => $this->tipoSiniestro,
            "ip" => $this->ip,
            "tag" => $this->tag,
            "cia" => $this->cia,
            "agente" => $this->agente,
            "ref" => $this->ref,
            "registro" => $this->registro
        ];
    }

}
