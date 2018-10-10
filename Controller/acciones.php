<?php

session_start();

if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../Controller/index.php");
}

if (isset($_REQUEST['accion'])) {
    switch ($_REQUEST['accion']) {
        case 'msj':          
           include_once $_SERVER['DOCUMENT_ROOT'].'/View/msj/index.php';   
            break;
         case 'mensajeEnviado':          
           include_once $_SERVER['DOCUMENT_ROOT'].'/View/mensajeExpediente/mensajeEnviado.php';   
            break;
        case 'err1': 
            $error = 'err1';
            include_once $_SERVER['DOCUMENT_ROOT'].'/View/error/index.php';
            break;
        case 'err2':           
            include_once $_SERVER['DOCUMENT_ROOT'].'/View/error/index.php';
            break;
        case 'err3': 
            include_once $_SERVER['DOCUMENT_ROOT'].'/View/error/index.php';
            break;      
        case 'err4':       
            include_once $_SERVER['DOCUMENT_ROOT'].'/View/error/index.php';
            break;
        case 'err5':     
            $error = 'err5';
            include_once $_SERVER['DOCUMENT_ROOT'].'/View/error/index.php';
            break;      
    }
}
