<?php

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Login.php';

if (isset($_POST['usuario'])) {
    $usuario = $_POST['usuario'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

$usuarios = Usuario::getUsuarios();
//print_r($usuarios);

foreach ($usuarios as $user) {
    if (($user->getUsuario() == $usuario) && ($user->getPassword() == $password)) {
        $_SESSION['logueado'] = serialize($user);

        $us = $user->getUsuario();

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        function getBrowser($user_agent) {
            if (strpos($user_agent, 'MSIE') !== FALSE) {
                return 'Explorer';
            } elseif (strpos($user_agent, 'Edge') !== FALSE) {//Microsoft Edge
                return 'Microsoft Edge';
            } elseif (strpos($user_agent, 'Trident') !== FALSE) { //IE 11
                return 'Explorer';
            } elseif (strpos($user_agent, 'Opera Mini') !== FALSE) {
                return "Opera Mini";
            } elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE) {
                return "Opera";
            } elseif (strpos($user_agent, 'Firefox') !== FALSE) {
                return 'Firefox';
            } elseif (strpos($user_agent, 'Chrome') !== FALSE) {
                return 'Chrome';
            } elseif (strpos($user_agent, 'Safari') !== FALSE) {
                return "Safari";
            } else {
                return 'No detectado';
            }
        }

        $navegador = getBrowser($user_agent);
        $ip = $_SERVER['REMOTE_ADDR'];
        $equipo = $_SERVER['HTTP_USER_AGENT'];

        Login::insertLogin($us, $navegador, $ip, $equipo);

        header("Location: ../Controller/index.php");
    } else {
        header("Location: ../Controller/index.php");
    }
}

