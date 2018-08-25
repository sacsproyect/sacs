<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Conexion.php';

class Joined implements JsonSerializable {

    private $id;
    private $persin;
    private $trasin;
    private $fensin;
    private $clisin;
    private $agesin;
    private $asesin;
    private $dassin;
    private $passin;
    private $tassin;
    private $tassin2;
    private $polsin;
    private $numsin;
    private $classin;
    private $ptpsin;
    private $fsasin;
    private $carsin;
    private $ordsin;
    private $tomsin;
    private $pagsin;
    private $inmsin;
    private $obssin;
    private $euro;
    private $nznsin;
    private $activo;
    private $tag2;
    private $departamento;
    private $expsin;
    private $clasin;
    private $nombreagente;

    function __construct($id, $persin, $trasin, $fensin, $clisin, $agesin, 
            $asesin, $dassin, $passin, $tassin, $tassin2, $polsin, $numsin, $classin,
            $ptpsin, $fsasin, $carsin, $ordsin, $tomsin, $pagsin,
            $inmsin, $obssin, $euro, $nznsin, $activo, $tag2, $departamento,
            $expsin, $clasin, $nombreagente) {
                
        $this->id = $id;
        $this->persin = $persin;
        $this->trasin = $trasin;
        $this->fensin = $fensin;
        $this->clisin = $clisin;
        $this->agesin = $agesin;
        $this->asesin = $asesin;
        $this->dassin = $dassin;
        $this->passin = $passin;
        $this->tassin = $tassin;
        $this->tassin2 = $tassin2;
        $this->polsin = $polsin;
        $this->numsin = $numsin;
        $this->classin = $classin;
        $this->ptpsin = $ptpsin;
        $this->fsasin = $fsasin;
        $this->carsin = $carsin;
        $this->ordsin = $ordsin;
        $this->tomsin = $tomsin;
        $this->pagsin = $pagsin;
        $this->inmsin = $inmsin;
        $this->obssin = $obssin;
        $this->euro = $euro;
        $this->nznsin = $nznsin;
        $this->activo = $activo;
        $this->departamento = $departamento;
        $this->tag2 = $tag2;
        $this->expsin = $expsin;
        $this->clasin = $clasin;
        $this->nombreagente = $nombreagente;
    }
 
    
        public static function getSiniestrosJoinedAsegurado($asegurado, $cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE ucase(asesin) LIKE ? AND clisin = ?";        
        $consulta = $conexion->prepare($select);
        $consulta->execute(array("%$asegurado%", $cliente_id));
        $siniestros = [];        
        while ($registro = $consulta->fetchObject()) {
        $siniestros[] = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        }
        $consulta->closeCursor();  
        return $siniestros;   
        
} 
    
    
    public static function getSiniestrosJoinedNumSiniestro($numSiniestro, $cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE ucase(numsin) LIKE ? AND clisin = ?";
        $consulta = $conexion->prepare($select);
        $consulta->execute(array("%$numSiniestro%", $cliente_id));
        $siniestros = [];
        while ($registro = $consulta->fetchObject()) {
        $siniestros[] = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        }
        $consulta->closeCursor();
        return $siniestros;
}
    
    public static function getSiniestrosJoinedNumPoliza($numPoliza, $cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE ucase(polsin) LIKE ? AND clisin = ?";
        $consulta = $conexion->prepare($select);
        $consulta->execute(array("%$numPoliza%", $cliente_id));
        $siniestros = [];        
        while ($registro = $consulta->fetchObject()) {
        $siniestros[] = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        }
        $consulta->closeCursor();
        return $siniestros;
    }
        
    
    public static function getSiniestrosJoinedTipo($tipoSiniestro, $cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE ucase(clasin) LIKE ? AND clisin = ?";
        $consulta = $conexion->prepare($select);
        $consulta->execute(array("%$tipoSiniestro%", $cliente_id));
        $siniestros = [];

        while ($registro = $consulta->fetchObject()) {
        $siniestros[] = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        }
        $consulta->closeCursor();
        return $siniestros;
} 
    public static function getSiniestrosJoinedNumTelefono($telefono, $cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE ucase(tassin) LIKE ? AND clisin = ?";
        $consulta = $conexion->prepare($select);
        $consulta->execute(array("%$telefono%", $cliente_id));
        $siniestros = [];

        while ($registro = $consulta->fetchObject()) {
        $siniestros[] = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        }
        $consulta->closeCursor();
        return $siniestros;
   }
    
     public static function getSiniestrosJoinedFechaAltaSin($fecha, $cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE fensin = ? AND clisin = ?";
        $consulta = $conexion->prepare($select);
        $consulta->execute(array($fecha, $cliente_id));
        $siniestros = [];
         
        while ($registro = $consulta->fetchObject()) {
        $siniestros[] = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        }
        $consulta->closeCursor();
        return $siniestros;
    }
    
    public static function getSiniestrosJoinedCompania($ciaaseguradora, $cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE ucase(nombreagente) LIKE ? AND clisin = ?";
        $consulta = $conexion->prepare($select);
        $consulta->execute(array("%$ciaaseguradora%", $cliente_id));
        $siniestros = [];
         
        while ($registro = $consulta->fetchObject()) {
        $siniestros[] = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        }
        $consulta->closeCursor();
        return $siniestros;
    } 
    
   
        public static function getSiniestrosJoinedEstado($radioEstado, $cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE activo = $radioEstado AND clisin = $cliente_id";
        $consulta = $conexion->query($select);
        ///$consulta->execute(array($radioEstado, $cliente_id));
        $siniestros = [];
         
        while ($registro = $consulta->fetchObject()) {
        $siniestros[] = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        }
        //$consulta->closeCursor();
        return $siniestros;
    } 
    
   
        public static function getSiniestrosJoinedTodos($cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE clisin = ?";
        $consulta = $conexion->prepare($select);
        $consulta->execute(array($cliente_id));
        $siniestros = [];
         
        while ($registro = $consulta->fetchObject()) {
        $siniestros[] = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        }
        $consulta->closeCursor();
        return $siniestros;
    } 
    
    public static function getSiniestrosJoinedByNivel($cliente_id, $nivel) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE clisin = ?  AND (nivel = ?";
        
        if($nivel=="A"){
         $select = $select . " OR nivel = ? OR nivel = ?)";   
        
        }else if($nivel=="A1"){
         $select = $select . " OR nivel = ?)";   
            
        }
       
        $consulta = $conexion->prepare($select);
        
         if($nivel=="A"){
           $consulta->execute(array($cliente_id,$nivel,"A1","A1A"));  
        
        }else if($nivel=="A1"){
          $consulta->execute(array($cliente_id,$nivel,"A1A")); 
            
        }else if($nivel=="A1A"){
               $consulta->execute(array($cliente_id,$nivel));
        }
        
     
        $siniestros = [];
        
        while ($registro = $consulta->fetchObject()) {
        $siniestros[] = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        }
        $consulta->closeCursor();
        return $siniestros;
    }
    
    
        public static function getSiniestroJoinedTodosByExpsin($expsin) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM siniestro WHERE expsin = ?";
        $consulta = $conexion->prepare($select);
        $consulta->execute(array($expsin));
        $registro = $consulta->fetchObject();
     
        $siniestro = new Joined($registro->id, $registro->persin, $registro->trasin, $registro->fensin
                    , $registro->clisin, $registro->agesin, $registro->asesin, $registro->dassin
                    , $registro->passin, $registro->tassin, $registro->tassin2, $registro->polsin
                    , $registro->numsin, $registro->classin, $registro->ptpsin, $registro->fsasin
                    , $registro->carsin, $registro->ordsin, $registro->tomsin, $registro->pagsin
                    , $registro->inmsin, $registro->obssin, $registro->euro, $registro->nznsin
                    , $registro->activo, $registro->tag2, $registro->departamento
                    , $registro->expsin, $registro->clasin, $registro->nombreagente);
        
        $consulta->closeCursor();
        return $siniestro;
    } 
    
    function getId() {
        return $this->id;
    }

    function getPersin() {
        return $this->persin;
    }

    function getTrasin() {
        return $this->trasin;
    }

    function getFensin() {
        return $this->fensin;
    }

    function getClisin() {
        return $this->clisin;
    }

    function getAgesin() {
        return $this->agesin;
    }

    function getAsesin() {
        return $this->asesin;
    }

    function getDassin() {
        return $this->dassin;
    }

    function getPassin() {
        return $this->passin;
    }

    function getTassin() {
        return $this->tassin;
    }

    function getTassin2() {
        return $this->tassin2;
    }

    function getPolsin() {
        return $this->polsin;
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

    function getCarsin() {
        return $this->carsin;
    }

    function getOrdsin() {
        return $this->ordsin;
    }

    function getTomsin() {
        return $this->tomsin;
    }

    function getPagsin() {
        return $this->pagsin;
    }

    function getInmsin() {
        return $this->inmsin;
    }

    function getObssin() {
        return $this->obssin;
    }

    function getEuro() {
        return $this->euro;
    }

    function getNznsin() {
        return $this->nznsin;
    }

    function getActivo() {
        return $this->activo;
    }

    function getTag2() {
        return $this->tag2;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getExpsin() {
        return $this->expsin;
    }

    function getClasin() {
        return $this->clasin;
    }

    function getNombreagente() {
        return $this->nombreagente;
    }

    

    
    
    public function jsonSerialize() {
        return [
            "id" => $this->id,
            "persin" => $this->persin,
            "trasin" => $this->trasin,
            "fensin" => $this->fensin,
            "clisin" => $this->clisin,
            "agesin" => $this->agesin,
            "asesin" => $this->asesin,
            "dassin" => $this->dassin,
            "passin" => $this->passin,
            "tassin" => $this->tassin,
            "tassin2" => $this->tassin2,
            "polsin" => $this->polsin,
            "numsin" => $this->numsin,
            "classin" => $this->classin,
            "ptpsin" => $this->ptpsin,
            "fsasin" => $this->fsasin,
            "carsin" => $this->carsin,
            "ordsin" => $this->ordsin,
            "tomsin" => $this->tomsin,
            "pagsin" => $this->pagsin,
            "inmsin" => $this->inmsin,
            "obssin" => $this->obssin,
            "euro" => $this->euro,
            "nznsin" => $this->nznsin,
            "activo" => $this->activo,
            "tag2" => $this->tag2,
            "departamento" => $this->departamento,
            "expsin" => $this->expsin,
            "clasin" => $this->clasin,
            "nombreagente" => $this->nombreagente
        ];
    }

}
