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
                <div class="">  
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <h1><span class="text-center">Informe general</span></h1>
                    </div>
                    <br>
                    <form  method="post" action="../Controller/siniestro.php" id="tablaInfoGeneral">
                        <input type="hidden" class="searchInput" id="radioEstado2" name="radioEstado" value="true" checked> 
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marginTop20">
                            <div class="table-responsive">
                                <table  class="table table-striped table-hover table-condensed table-bordered informeGral">    
                                    <thead>
                                        <tr>
                                            <th colspan="4" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                            <th colspan="2" class="text-center">&nbsp;&nbsp;TOTAL&nbsp;&nbsp;</th>
                                            <th colspan="2" class="text-center">Diversos</th>
                                            <th colspan="2" class="text-center">&nbsp;&nbsp;Autos&nbsp;&nbsp;</th>
                                            <th colspan="2" class="text-center">&nbsp;&nbsp;&nbsp;Vip&nbsp;&nbsp;&nbsp;&nbsp;</th>                                                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($informeGeneral as $registro) {
                                            $textoFila = $registro->getTextoFila();
                                            ?>
                                            <tr>
                                                <td colspan="4">
                                                    <?php
                                                    if ($registro->getTextoFila() === 'Bandeja siniestros vivos:') {
                                                        echo "<a id=\"linkSiniestrosVivos\" href=\"\" onclick=\"myAjax()\">   $textoFila </a>";
                                                    } else {
                                                        echo $textoFila;
                                                    }
                                                    ?>

                                                    <script type="text/javascript">
                                                       
                                                        function myAjax() {
                                                            $.ajax({
                                                                method: "POST",
                                                                url: '../../Controller/siniestro.php',                                                               
                                                                success: function () {
                                                                    document.getElementById("tablaInfoGeneral").submit();
                                                                }
                                                            });
                                                        }
                                                    </script>

                                                </td>         
                                                <td class="text-center"><?= $registro->getTotal1() ?></td>
                                                <td class="text-center grey"><?= $registro->getTotal2() ?></td>
                                                <td class="text-center"><?= $registro->getDiversos1() ?></td>
                                                <td class="text-center grey"><?= $registro->getDiversos2() ?></td>
                                                <td class="text-center"><?= $registro->getAutos1() ?></td>                                               
                                                <td class="text-center grey"><?= $registro->getAutos2() ?></td>
                                                <td class="text-center"><?= $registro->getVip1() ?></td> 
                                                <td class="text-center grey"><?= $registro->getVip2() ?></td>       
                                            </tr>      
                                            <?php
                                        }
                                        ?>
                                    </tbody> 
                                </table>                          
                            </div>
                            <small class="grey">En gris claro se muestran los datos correspondientes al informe anterior</small>
                        </div> 
                    </form>
                </div>
            </div>
        </div>   
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/footer.php';




        