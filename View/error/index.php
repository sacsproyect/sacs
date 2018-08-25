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
                    <h1>Error</h1>
                    <?php
                    switch ($error) {
                        case 'err1':
                            echo ' <h4>No se ha podido grabar el siniestro</h4>';
                            include_once $_SERVER['DOCUMENT_ROOT'] . '/View/error/index.php';
                            break;
                        case 'err2':
                            include_once $_SERVER['DOCUMENT_ROOT'] . '/View/error/index.php';
                            break;
                        case 'err3':
                            include_once $_SERVER['DOCUMENT_ROOT'] . '/View/error/index.php';
                            break;
                        case 'err4':
                            include_once $_SERVER['DOCUMENT_ROOT'] . '/View/error/index.php';
                            break;
                        case 'err5':
                            echo ' <h4>No hay coincidencias</h4>';
                            break;
                    }
                    ?>                
                    <h4>Por favor inténtelo nuevamente</h4>
                </div>
            </div>
        </div>
    </div>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/footer.php';
        
