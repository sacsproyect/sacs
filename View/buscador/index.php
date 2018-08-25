<?php

if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../Controller/index.php");
}
?>
<!-- VISTA HTML 5 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/head.php'; ?>
<body>
    <div class="container-fluid"> 
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/header.php'; ?>
        <div class="row"> 
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/menu.php'; ?> 
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                <div class="">                  
                    <?php
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/View/buscador/formBuscador.php';
                    ?>
                </div>
            </div>
        </div>   
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/footer.php'; 
