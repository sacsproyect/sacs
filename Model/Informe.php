<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Conexion.php';

class Informe implements JsonSerializable {
  
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
    
    private $fensin;
    private $asesin;
    private $numsin;
    private $classin;
    private $ptpsin;
    private $fsasin;
    private $activo;



    function __construct($expsin, $fecha, $hora, $observacion, $fensin, $asesin, $numsin) {    
           
    
        $this->expsin = $expsin;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->observacion = $observacion;          
        $this->fensin = $fensin;
        $this->asesin = $asesin;
        $this->numsin = $numsin;

    }
   
    
    public static function getSiniestrosCerradosEnPeriodo($cliente_id, $nivel) {
        $conexion = Conexion::connectDB();
        $select = "SELECT expsin, numsin, fensin, concat_ws(' ',asesin, concat(concat('(',ptpsin),')') ) as asesin, fecha, hora, observacion"
                . " FROM (select siniestro_historial.*, numsin, fensin, asesin, clisin, ptpsin, fsasin, activo, nivel"
                . " FROM siniestro_historial INNER JOIN siniestro on siniestro.expsin = siniestro_historial.expsin) tbl"
                . " WHERE ref = (select max(ref) FROM siniestro_historial where tbl.expsin = expsin"
                . " AND observacion not like '---%') AND month(fsasin) = month(now()) AND clisin= $cliente_id AND nivel LIKE '$nivel%'";       
        $consulta = $conexion->query($select);
        
        $informes = []; 
        
        while ($registro = $consulta->fetchObject()) {
        $informes[] = new Informe($registro->expsin, $registro->fecha, $registro->hora
                    , $registro->observacion         
                    , $registro->fensin
                    , $registro->asesin, $registro->numsin);
        } 
        return $informes;   
        
} 

    public static function getSiniestros40Dias($cliente_id, $nivel) {
        $conexion = Conexion::connectDB();
        $select = "SELECT expsin, numsin, fensin, concat_ws(' ',asesin, concat(concat('(',ptpsin),')') ) as asesin, fecha, hora, observacion"
                . " FROM (select siniestro_historial.*, numsin, fensin, asesin, clisin, ptpsin, fsasin, activo, nivel"
                . " FROM siniestro_historial INNER JOIN siniestro on siniestro.expsin = siniestro_historial.expsin) tbl"
                . " WHERE ref = (select max(ref) FROM siniestro_historial where tbl.expsin = expsin"
                . " AND observacion not like '---%') AND activo = 1 AND datediff(now(),fensin) > 40 AND clisin= $cliente_id AND nivel LIKE '$nivel%'";       
        $consulta = $conexion->query($select);
        
        $informes = []; 
        
        while ($registro = $consulta->fetchObject()) {
        $informes[] = new Informe($registro->expsin, $registro->fecha, $registro->hora
                    , $registro->observacion         
                    , $registro->fensin
                    , $registro->asesin, $registro->numsin);
        } 
        return $informes;   
        
}

    public static function getSiniestrosRcPymeRoboInc($cliente_id, $nivel) {
        $conexion = Conexion::connectDB();
        $select = "SELECT expsin, numsin, fensin, concat_ws(' ',asesin, concat(concat('(',ptpsin),')') ) as asesin, fecha, hora, observacion"
                . " FROM (select siniestro_historial.*, numsin, fensin, asesin, clasin, clisin, ptpsin, fsasin, activo, nivel"
                . " FROM siniestro_historial INNER JOIN siniestro on siniestro.expsin = siniestro_historial.expsin) tbl"
                . " WHERE ref = (select max(ref) FROM siniestro_historial where tbl.expsin = expsin"
                . " AND observacion not like '---%') AND activo = 1 AND left(clasin,2) in('A ','D ','L ') and clisin= $cliente_id AND nivel LIKE '$nivel%'";       
        $consulta = $conexion->query($select);
        
        $informes = []; 
        
        while ($registro = $consulta->fetchObject()) {
        $informes[] = new Informe($registro->expsin, $registro->fecha, $registro->hora
                    , $registro->observacion         
                    , $registro->fensin
                    , $registro->asesin, $registro->numsin);
        } 
        return $informes;   
        
}

    public static function getSiniestrosVip($cliente_id, $nivel) {
        $conexion = Conexion::connectDB();
        $select = "SELECT expsin, numsin, fensin, concat_ws(' ',asesin, concat(concat('(',ptpsin),')') ) as asesin, fecha, hora, observacion"
                . " FROM (select siniestro_historial.*, numsin, fensin, asesin, clisin, ptpsin, fsasin, activo, nivel"
                . " FROM siniestro_historial INNER JOIN siniestro on siniestro.expsin = siniestro_historial.expsin) tbl"
                . " WHERE ref = (select max(ref) FROM siniestro_historial where tbl.expsin = expsin"
                . " AND observacion not like '---%') AND activo = 1 and ptpsin like '%VIP%' AND clisin= $cliente_id AND nivel LIKE '$nivel%'";       
        $consulta = $conexion->query($select);
        
        $informes = []; 
        
        while ($registro = $consulta->fetchObject()) {
        $informes[] = new Informe($registro->expsin, $registro->fecha, $registro->hora
                    , $registro->observacion         
                    , $registro->fensin
                    , $registro->asesin, $registro->numsin);
        } 
        return $informes;   
        
}

    public static function getSiniestrosDisconformidades($cliente_id, $nivel) {
        $conexion = Conexion::connectDB();
        $select = "SELECT expsin, numsin, fensin, concat_ws(' ',asesin, concat(concat('(',ptpsin),')') ) as asesin, fecha, hora, observacion"
                . " FROM (select siniestro_historial.*, numsin, fensin, asesin, clisin, ptpsin, fsasin, activo, persin, nivel"
                . " FROM siniestro_historial INNER JOIN siniestro on siniestro.expsin = siniestro_historial.expsin) tbl"
                . " WHERE ref = (select max(ref) FROM siniestro_historial where tbl.expsin = expsin"
                . " AND observacion not like '---%') AND activo = 1 and persin = 2 AND clisin= $cliente_id AND nivel LIKE '$nivel%'";       
        $consulta = $conexion->query($select);
        
        $informes = []; 
        
        while ($registro = $consulta->fetchObject()) {
        $informes[] = new Informe($registro->expsin, $registro->fecha, $registro->hora
                    , $registro->observacion         
                    , $registro->fensin
                    , $registro->asesin, $registro->numsin);
        } 
        return $informes;   
        
}

function getId() {
    return $this->id;
}

function getExpsin() {
    return $this->expsin;
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

function getProxcita() {
    return $this->proxcita;
}

function getHoracita() {
    return $this->horacita;
}

function getEstado() {
    return $this->estado;
}

function getConfiden() {
    return $this->confiden;
}

function getAsegurado() {
    return $this->asegurado;
}

function getPoliza() {
    return $this->poliza;
}

function getSiniestro() {
    return $this->siniestro;
}

function getTipoSiniestro() {
    return $this->tipoSiniestro;
}

function getIp() {
    return $this->ip;
}

function getTag() {
    return $this->tag;
}

function getCia() {
    return $this->cia;
}

function getAgente() {
    return $this->agente;
}

function getRef() {
    return $this->ref;
}

function getRegistro() {
    return $this->registro;
}

function getFensin() {
    return $this->fensin;
}

function getAsesin() {
    return $this->asesin;
}

function getNumsin() {
    return $this->numsin;
}

function getClassin() {
    return $this->classin;
}

function getPtpsin() {
    return $this->ptpsin;
}

function getFsasin() {
    return $this->fsasin;
}

function getActivo() {
    return $this->activo;
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
            "registro" => $this->registro,
            "fensin" => $this->fensin,
            "asesin" => $this->asesin,
            "numsin" => $this->numsin,
            "classin" => $this->classin,
            "ptpsin" => $this->ptpsin,
            "fsasin" => $this->fsasin,
            "activo" => $this->activo,           
        ];
    }

}
