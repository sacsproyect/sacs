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
            <div class="col-sm-8 col-md-9 ">
                <div>                  
					<h1><a href="javascript:history.back()">
                            <i class="glyphicon glyphicon-arrow-left" title="Atrás"></i></a> 

                        &nbsp; Listado &nbsp; 

                        <a href="../Controller/index.php">
                            <i class="glyphicon glyphicon-home" title="Inicio"></i></a>
                    </h1>
                    <div class="">
                        <div class="table-responsive">
                            <table  class="table table-striped table-hover table-condensed">    
                                <thead>
                                    <tr>
                                        <th>FE ENTRADA</th>
                                        <th>ASEGURADO</th>
                                        <th>TIPO SINI</th>
                                        <th>NUM SINI</th>
                                        <th>POLIZA</th>
                                        <th>COMPAÑIA</th>
                                        <th>TELEFONO</th>                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($siniestros as $registro) {
                                        ?>
                                        <tr>
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= $registro->getFensin() ?></a></td>
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= strtoupper($registro->getAsesin()) ?></a></td>
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= strtoupper($registro->getClasin()) ?></a></td>
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= strtoupper($registro->getNumsin()) ?></a></td>
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= strtoupper($registro->getPolsin()) ?></a></td>                                               
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= strtoupper($registro->getNombreagente()) ?></a></td>
                                            <td><a class="btnEnlace" href="../../Controller/siniestro.php?exp=<?= $registro->getExpsin() ?>"><?= strtoupper($registro->getTassin()) ?></a></td>         
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
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/footer.php'; ?> 
