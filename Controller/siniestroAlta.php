<?php

session_start();

if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../Controller/index.php");
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/SiniestroAlta.php';

$user = unserialize($_SESSION['logueado']);

$cliente_id = $user->getCliente_id();
$cliente_sucursal_id = $user->getCliente_sucursal_id();
$usuario = $user->getId();
$id = $user->getId();
$nivel = $user->getNivel();

//############### Recogemos los datos que vienen del formulario ################################## 


if (isset($_POST['siniestro_ramo_id'])) {
    $siniestro_ramo_id = $_POST['siniestro_ramo_id'];
}
if (isset($_POST['siniestro_tipo_id'])) {
    $siniestro_tipo_id = $_POST['siniestro_tipo_id'];
}
if (isset($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
}
if (isset($_POST['ciaaseguradora'])) {
    $ciaaseguradora = $_POST['ciaaseguradora'];
}

$asegurado = (empty($_POST['asegurado'])) ? 'NULL' : strtoupper($_POST['asegurado']);

$poliza = (empty($_POST['poliza'])) ? 'NULL' : strtoupper(str_replace(' ', '', $_POST['poliza']));

$matricula = (empty($_POST['matricula'])) ? 'NULL' : strtoupper(str_replace(' ', '', $_POST['matricula']));

$direccion = (empty($_POST['direccion'])) ? 'NULL' : strtoupper($_POST['direccion']);

$localidad = (empty($_POST['localidad'])) ? 'NULL' : strtoupper($_POST['localidad']);

$provincia = (empty($_POST['provincia'])) ? 'NULL' : $_POST['provincia'];

$cp = (empty($_POST['cp'])) ? 'NULL' : $_POST['cp'];

$fecha = (empty($_POST['fecha'])) ? 'NULL' : $_POST['fecha'];

$hora = (empty($_POST['hora'])) ? 'NULL' : $_POST['hora'];

$declaracion = (empty($_POST['declaracion'])) ? 'NULL' : $_POST['declaracion'];

$intervencionfi = (empty($_POST['intervencionfi'])) ? 'NULL' : $_POST['intervencionfi'];

$lesionados = isset($_POST['lesionados']) ? 1 : 0;

$vip = isset($_POST['vip']) ? 1 : 0;

$terceros = isset($_POST['terceros']) ? 1 : 0;

$urgente = isset($_POST['urgente']) ? 1 : 0;

$observaciones = (empty($_POST['observaciones'])) ? 'NULL' : $_POST['observaciones'];

$leido_por_mayordomo = (empty($_POST['leido_por_mayordomo'])) ? 'NULL' : $_POST['leido_por_mayordomo'];

$expsin = (empty($_POST['expsin'])) ? 'NULL' : $_POST['expsin'];

$lastInsertId;
try {

    //############## Creacion de un obj para la llamada al metodo insert ###############
    $data = new SiniestroAlta("", $cliente_id, $cliente_sucursal_id, $siniestro_ramo_id, $siniestro_tipo_id
            , $asegurado, $ciaaseguradora, $poliza, $matricula, $telefono, $vip, $declaracion, $fecha, $hora
            , $terceros, $lesionados, $intervencionfi, $observaciones, $direccion, $localidad, $provincia
            , $cp, $urgente, $usuario, "", $leido_por_mayordomo, $expsin,$nivel);

    //############### insertamos los datos en la bbdd ##################################   
    $lastInsertId = SiniestroAlta::insertSiniestroAltaWithNivel($data);

    $directorio = '../View/files/' . $id . "_" . $lastInsertId . '/';

    if (!file_exists($directorio)) {
        mkdir($directorio, 0777);
    }

    $uploadOk = 0;
    foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {

        if ($_FILES["archivo"]["name"][$key]) {
            $uploadOk = 0;
            $filename = $_FILES["archivo"]["name"][$key];
            $source = $_FILES["archivo"]["tmp_name"][$key];

            $permitidos = array("image/gif", "image/png", "image/jpg", "image/jpeg", "application/pdf");
            $limite_kb = 5000;

            if (in_array($_FILES["archivo"]["type"][$key], $permitidos) && ($_FILES["archivo"]["size"][$key] <= $limite_kb * 1024)) {
                $uploadOk = 1;               
            }

            if ($uploadOk == 1) {
                $dir = opendir($directorio);
                $target_file = $directorio . '/' . $filename;
                move_uploaded_file($source, $target_file);
                closedir($dir);
            }
        }
    }

    header("Location: ../Controller/acciones.php?accion=msj");
} catch (Exception $ex) {

    header("Location: ../Controller/acciones.php?accion=err1");
}


//#######################################################################################

