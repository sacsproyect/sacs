<?php

ini_set('error_reporting', 0);
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
            <div class="col-sm-8 col-md-9 ">
                <br> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Asegurado:<input type="text" value="<?= strtoupper($siniestro->getAsesin()) ?>" readonly="">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Num Siniestro:<input type="text" value="<?= strtoupper($siniestro->getNumsin()) ?>" readonly="">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Compañía:<input type="text" value="<?= strtoupper($siniestro->getNombreagente()) ?>" readonly="">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Fecha:<input type="text" value="<?= $siniestro->getFensin() ?>" readonly="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                    <h1>Expediente nº <?= $expsin; ?></h1>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 back">          
                    <a href="../Controller/buscador.php" class="btn btn-primary btn-xs" role="button">Nueva Busqueda</a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="table-responsive">
                        <table  class="table table-striped expTable">    
                            <thead>
                                <tr>
                                    <th class="col-sm-2">FECHA</th>
                                    <th class="col-sm-2">HORA</th>
                                    <th class="col-sm-8 text-center">GESTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($historial as $registro) {
                                    ?>
                                    <tr>
                                        <td><?= $registro->getFecha() ?></td>
                                        <td><?= $registro->getHora() ?></td>
                                        <td><?= $registro->getObservacion() ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>   
                        </table>
                    </div>
                </div>
            </div>
        </div>        
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/footer.php'; ?> 
