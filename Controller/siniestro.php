<?php

ini_set('error_reporting', 0);

session_start();

if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../Controller/index.php");
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Historial.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Joined.php';

$user = unserialize($_SESSION['logueado']);

$cliente_id = $user->getCliente_id();
$usuario = $user->getUsuario();
$nivel = $user->getNivel();


if (isset($_REQUEST['exp'])) {
    $expsin = ($_REQUEST['exp']);
    $siniestro = Joined::getSiniestroJoinedTodosByExpsin($expsin);
    $historial = Historial::getHistorialByExp($expsin);
    require_once $_SERVER['DOCUMENT_ROOT'] . '/View/expediente/index.php';
} else {
//############### Recogemos los datos que vienen del formulario ##################################    

    if (!empty($_POST['radioEstado'])) {
        $radioEstado = $_POST['radioEstado'];
    }

    if (isset($_POST['asegurado'])) {
        $asegurado = strtoupper($_POST['asegurado']);
    }

    if (isset($_POST['numSiniestro'])) {
        $numSiniestro = strtoupper(str_replace(' ', '', $_POST['numSiniestro']));
    }

    if (isset($_POST['numPoliza'])) {
        $numPoliza = strtoupper(str_replace(' ', '', $_POST['numPoliza']));
    }

    if (isset($_POST['tipoSiniestro'])) {
        $tipoSiniestro = strtoupper(utf8_encode($_POST['tipoSiniestro']));
    }

    if (isset($_POST['telefono'])) {
        $telefono = strtoupper($_POST['telefono']);
    }

    if (isset($_POST['fecha'])) {
        $fecha = $_POST['fecha'];
    }

    if (isset($_POST['ciaaseguradora'])) {
        $ciaaseguradora = strtoupper($_POST['ciaaseguradora']);
    }
    
//    if (isset($_POST['obssin'])) {
//        $ciaaseguradora = strtoupper($_POST['obssin']);
//    }



// print_r($_POST);
//###########################################################################################//  

    if ($radioEstado) {
        if ($radioEstado == 'todos') {
            $siniestros = Joined::getSiniestrosJoinedByNivel($cliente_id, $nivel);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/listadoExpediente/index.php';
        } else if ($radioEstado == true) {
            $siniestros = Joined::getSiniestrosJoinedEstadoByNivel($radioEstado, $cliente_id, $nivel);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/listadoExpediente/index.php';
        } else if ($radioEstado == false) {
            $siniestros = Joined::getSiniestrosJoinedEstadoByNivel($radioEstado, $cliente_id, $nivel);
        } else {
            header("Location: ../Controller/acciones.php?accion=err5 ");
        }

//###########################################################################################//  
    } else if ($asegurado) {
        $siniestros = Joined::getSiniestrosJoinedAseguradoByNivel($asegurado, $cliente_id, $nivel);
        $rows = count($siniestros);
        if ($rows == 1) {
            $expsin = $siniestros[0]->getExpsin();
            $siniestro = Joined::getSiniestroJoinedTodosByExpsin($expsin);
            $historial = Historial::getHistorialByExp($expsin);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/expediente/index.php';
        } else if ($rows > 1) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/listadoExpediente/index.php';
        } else {
            header("Location: ../Controller/acciones.php?accion=err5 ");
        }

        //###########################################################################################//     
    } else if ($numSiniestro) {
        $siniestros = Joined::getSiniestrosJoinedNumSiniestroByNivel($numSiniestro, $cliente_id, $nivel);
        $rows = count($siniestros);
        if ($rows == 1) {
            $expsin = $siniestros[0]->getExpsin();
            $siniestro = Joined::getSiniestroJoinedTodosByExpsin($expsin);
            $historial = Historial::getHistorialByExp($expsin);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/expediente/index.php';
        } else if ($rows > 1) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/listadoExpediente/index.php';
        } else {
            header("Location: ../Controller/acciones.php?accion=err5 ");
        }
//###########################################################################################// 
    } else if ($numPoliza) {
        $siniestros = Joined::getSiniestrosJoinedNumPolizaByNivel($numPoliza, $cliente_id, $nivel);
        $rows = count($siniestros);
        if ($rows == 1) {
            $expsin = $siniestros[0]->getExpsin();
            $siniestro = Joined::getSiniestroJoinedTodosByExpsin($expsin);
            $historial = Historial::getHistorialByExp($expsin);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/expediente/index.php';
        } else if ($rows > 1) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/listadoExpediente/index.php';
        } else {
            header("Location: ../Controller/acciones.php?accion=err5 ");
        }
        //###########################################################################################//         
    } else if ($tipoSiniestro) {
        $siniestros = Joined::getSiniestrosJoinedTipoByNivel($tipoSiniestro, $cliente_id, $nivel);
        $rows = count($siniestros);
        if ($rows == 1) {
            $expsin = $siniestros[0]->getExpsin();
            $siniestro = Joined::getSiniestroJoinedTodosByExpsin($expsin);
            $historial = Historial::getHistorialByExp($expsin);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/expediente/index.php';
        } else if ($rows > 1) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/listadoExpediente/index.php';
        } else {
            header("Location: ../Controller/acciones.php?accion=err5 ");
        }
//###########################################################################################//         
    } else if ($telefono) {
        $siniestros = Joined::getSiniestrosJoinedNumTelefonoByNivel($telefono, $cliente_id, $nivel);
        $rows = count($siniestros);
        if ($rows == 1) {
            $expsin = $siniestros[0]->getExpsin();
            $siniestro = Joined::getSiniestroJoinedTodosByExpsin($expsin);
            $historial = Historial::getHistorialByExp($expsin);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/expediente/index.php';
        } else if ($rows > 1) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/listadoExpediente/index.php';
        } else {
            header("Location: ../Controller/acciones.php?accion=err5 ");
        }
//###########################################################################################//         
    } else if ($fecha) {
        $siniestros = Joined::getSiniestrosJoinedFechaAltaSinByNivel($fecha, $cliente_id, $nivel);
        $rows = count($siniestros);
        if ($rows == 1) {
            $expsin = $siniestros[0]->getExpsin();
            $siniestro = Joined::getSiniestroJoinedTodosByExpsin($expsin);
            $historial = Historial::getHistorialByExp($expsin);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/expediente/index.php';
        } else if ($rows > 1) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/listadoExpediente/index.php';
        } else {
            header("Location: ../Controller/acciones.php?accion=err5 ");
        }

        //###########################################################################################//        
    } else if ($ciaaseguradora) {
        $siniestros = Joined::getSiniestrosJoinedCompaniaByNivel($ciaaseguradora, $cliente_id, $nivel);
        $rows = count($siniestros);
        if ($rows == 1) {
            $expsin = $siniestros[0]->getExpsin();
            $siniestro = Joined::getSiniestroJoinedTodosByExpsin($expsin);
            $historial = Historial::getHistorialByExp($expsin);
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/expediente/index.php';
        } else if ($rows > 1) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/View/listadoExpediente/index.php';
        } else {
            header("Location: ../Controller/acciones.php?accion=err5 ");
        }
    }
}
    
