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

$informes = Informe::getSiniestrosDisconformidades($cliente_id);
include_once $_SERVER['DOCUMENT_ROOT'].'/View/disconformidades/index.php';  
