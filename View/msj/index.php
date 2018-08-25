<?php
//session_start();

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
            <div>
                <div class="page-header">                  
                    <h1>La información del siniestro se ha grabado correctamente</h1>
                </div>
            </div>
        </div>
    </div>   
     
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/footer.php'; ?> 
