<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Cliente.php';

if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../Controller/index.php");
}
$usuario = unserialize($_SESSION['logueado']);
?>

<div class="row header">   

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
        <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2">
            <a href="../Controller/index.php?accion=cerrarsesion">
<!--                <i class="glyphicon glyphicon-log-out" title="Adiós!!"></i></a>-->
                <i class="glyphicon glyphicon-new-window" title="Cerrar Sesión"></i></a>
        </div>

        <div class="col-xs-4 col-sm-6 col-md-8 col-lg-8">    
            <a href="../Controller/index.php">
                <img class="logo center-block" src="../View/img/sacs-white.png" alt="sacs"></a>
        </div>
        <div class="col-xs-4 col-sm-3 col-md-2 col-lg-2">
            <span class="usuario"> Usuario:&nbsp;<?= $usuario->getNombre() ?>&nbsp;<?= $usuario->getApellido1() ?></span>
            <span class="usuario"> <?= Cliente::getNombreClienteById($usuario->getCliente_id()) ?></span>
        </div>
    </div>

</div>

