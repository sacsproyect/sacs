<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/SiniestroAlta.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/InformeGeneral.php';

if (isset($_SESSION['logueado'])) {
    $usuario = unserialize($_SESSION['logueado']);

    //var_dump($usuario);
    if (isset($_GET['accion']) && ($_GET['accion'] == 'cerrarsesion')) {
        session_destroy();
        header("Location: ../Controller/index.php");
    }


    $cliente_id = $usuario->getCliente_id();
    $informeGeneral = InformeGeneral::getInformeGeneral($cliente_id);
    include_once $_SERVER['DOCUMENT_ROOT'] . '/View/home/index.php';
    
} else {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/View/login/index.php';
}

    
