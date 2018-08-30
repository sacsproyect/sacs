<?php

session_start();

if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../Controller/index.php");
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Informe.php';

$user = unserialize($_SESSION['logueado']);

$cliente_id = $user->getCliente_id();
$usuario = $user->getUsuario();
$nivel = $user->getNivel();

$informes = Informe::getSiniestros40Dias($cliente_id,$nivel);
include_once $_SERVER['DOCUMENT_ROOT'].'/View/mayorCuarentaDias/index.php';  
