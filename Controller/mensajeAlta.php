<?php

session_start();

if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../Controller/index.php");
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Historial.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Joined.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Mensajes.php';


$user = unserialize($_SESSION['logueado']);
$expsin = $_POST['expSin'];
$registro = $_POST['registro'];
$mensajeExpediente = $_POST['mensajeExpediente'];
$usuario = $user->getId();

try {


    //############## Creacion de un obj para la llamada al metodo insert ###############
    $data = new Mensajes($expsin, $registro, $mensajeExpediente, $usuario);

    //############### insertamos los datos en la bbdd ##################################   
    $lastInsertId = Mensajes::insertMensaje($data);
    //var_dump($lastInsertId);
    var_dump('okInsert');
//    header("Location: ../Controller/acciones.php?accion=mensajeEnviado");
} catch (Exception $ex) {
    var_dump('errorInsert');
}




