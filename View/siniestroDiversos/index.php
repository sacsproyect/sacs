<?php
//session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Ramo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Compania.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Provincia.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/SiniestroTipo.php';

if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../Controller/index.php");
}

$categoria = 2;

$ramosSinAutos = Ramo::getRamosSinAutos();
$siniestroTipos = SiniestroTipo::getSiniestroTiposByCategoria($categoria);
$companias = Compania::getCompanias();
$provincias = Provincia::getProvincias();
?>

<!-- VISTA HTML 5 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/head.php'; ?>
<body>
  	<div class="row container centrar">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/header.php'; ?>
    <div class=" col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <div> 
            <h1> <!-- <a href="javascript:history.back()">
                     <i class="glyphicon glyphicon-arrow-left" title="Atrás"></i></a> -->
                &nbsp; Declaración de siniestro Diversos &nbsp;
                <a href="../Controller/index.php">
                    <i class="glyphicon glyphicon-home" title="Inicio"></i></a>
            </h1><!--                    
        </div>
            <!--                <div class="col-xs-2 col-sm-2 col-md-2 col-lg2 btnHome">          
                                <a href="../Controller/index.php" class="" role="button">Inicio</a>
                            </div>-->
            <div>
                <form method="post" action="../../Controller/siniestroAlta.php" enctype="multipart/form-data" id="formDiversos" onSubmit="return validate();">                     
                    <br>
                    <?php
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/View/siniestroDiversos/formDiversos.php';
                    ?>                    
                </form>
            </div>
        </div>
    </div>
 </div>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/footer.php'; ?>
       
