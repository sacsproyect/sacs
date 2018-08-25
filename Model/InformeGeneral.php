<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Model/Conexion.php';

class InformeGeneral implements JsonSerializable{

    private $id_cliente;
    private $id_usuario;
    private $textoFila;
    private $total1;
    private $total2;
    private $diversos1;
    private $diversos2;
    private $autos1;
    private $autos2;
    private $vip1;
    private $vip2;
    private $orden;
    private $tipoSiniestro;
    

    function __construct($id_cliente, $id_usuario, $textoFila, $total1, $total2, $diversos1, $diversos2, $autos1
            , $autos2, $vip1, $vip2, $orden) {
        
        $this->id_cliente = $id_cliente;
        $this->id_usuario = $id_usuario; 
        $this->textoFila = $textoFila;
        $this->total1 = $total1;
        $this->total2 = $total2;
        $this->diversos1 = $diversos1;
        $this->diversos2 = $diversos2;
        $this->autos1 = $autos1;
        $this->autos2 = $autos2;
        $this->vip1 = $vip1;
        $this->vip2 = $vip2;
        $this->orden = $orden;  
    }

    public static function getInformeGeneral($cliente_id) {
        $conexion = Conexion::connectDB();
        $select = "SELECT * FROM informe_general WHERE id_cliente = '$cliente_id' ORDER BY orden";
        $consulta = $conexion->query($select);

        $informeGeneral = [];

        while ($registro = $consulta->fetchObject()) {
            $informeGeneral[] = new InformeGeneral($registro->id_cliente, $registro->id_usuario
                    , $registro->textoFila, $registro->total1, $registro->total2, $registro->diversos1
                    , $registro->diversos2, $registro->autos1, $registro->autos2, $registro->vip1
                    , $registro->vip2, $registro->orden);
        }

        return $informeGeneral;
    }

    
    function getId_cliente() {
        return $this->id_cliente;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getTextoFila() {
        return $this->textoFila;
    }

    function getTotal1() {
        return $this->total1;
    }

    function getTotal2() {
        return $this->total2;
    }

    function getDiversos1() {
        return $this->diversos1;
    }

    function getDiversos2() {
        return $this->diversos2;
    }

    function getAutos1() {
        return $this->autos1;
    }

    function getAutos2() {
        return $this->autos2;
    }

    function getVip1() {
        return $this->vip1;
    }

    function getVip2() {
        return $this->vip2;
    }

    function getOrden() {
        return $this->orden;
    }

    function getTipoSiniestro() {
        return $this->tipoSiniestro;
    }

        
    
        public function jsonSerialize() {
        return [
            "id_cliente" => $this->id_cliente,          
            "id_usuario" => $this->id_usuario,
            "textoFila" => $this->textoFila,
            "total1" => $this->total1,
            "total2" => $this->total2,
            "diversos1" => $this->diversos1,
            "diversos2" => $this->diversos2,
            "autos1" => $this->autos1,
            "autos2" => $this->autos2,
            "vip1" => $this->vip1,
            "vip2" => $this->vip2,
            "orden" => $this->orden
            
        ];
    }

}
