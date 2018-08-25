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
            <div class="col-sm-12 col-md-12 ">
                <div class="">  
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">                        
                        <h1><a href="javascript:history.back()">
                                <i class="glyphicon glyphicon-arrow-left" title="Atrás"></i></a> 

                            &nbsp; Siniestros > 40 días &nbsp; 

                            <a href="../Controller/index.php">
                                <i class="glyphicon glyphicon-home" title="Inicio"></i></a>
                        </h1>
                        <!-- <a href="../Controller/index.php" class="" role="button">Inicio</a>-->
                    </div>                  
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marginTop20">
                        <div class="table-responsive">
                           <table  class="table table-striped table-hover table-condensed table-bordered informeGral">    
                                <thead>
                                    <tr>                                   
                                        <th class="text-center">Num Siniestro</th>
                                        <th class="text-center">Apertura</th>
                                        <th class="text-center">Asegurado</th>
                                        <th class="text-center">&nbsp;&nbsp;&nbsp;Fecha&nbsp;&nbsp;&nbsp;</th> 
                                        <th class="text-center">&nbsp;&nbsp;&nbsp;Hora&nbsp;&nbsp;&nbsp;</th>
                                        <th colspan="8" class="text-center">Ultima Gestión</th>                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($informes as $registro) {
                                        ?>
                                        <tr>         
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= strtoupper($registro->getNumsin()) ?></a></td>
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= $registro->getFensin() ?></a></td>                                               
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= strtoupper($registro->getAsesin()) ?></a></td>
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= $registro->getFecha() ?></a></td> 
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= $registro->getHora() ?></a></td> 
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= $registro->getObservacion() ?></a></td>       
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
        </div>   
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/footer.php';


        
