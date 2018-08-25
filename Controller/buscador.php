<?php

session_start();

if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../Controller/index.php");
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/View/buscador/index.php';

