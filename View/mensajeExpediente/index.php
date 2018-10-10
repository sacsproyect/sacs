<?php
if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../../Controller/index.php");
}
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/head.php';
?>

<body>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2  id="tituloModal" ><b>Contenido del mensaje:</b></h2>  
                </div>
                <!--<form method="post" action="../../Controller/mensajeAlta.php" id="formMensajeAlta">-->
                <div class="form-group">

                    <textarea  id="textareaModal" class="form-control cajaMensaje" cols="32" maxlength="1000" required=""></textarea>
                    <?php
                    date_default_timezone_set('Europe/Madrid');
                    $registro = date("Y-m-d H:i:s");
                    ?>
<!--                        <input type="hidden" name="registro" value="<?= $registro ?>" />-->
                </div>

                <div class="row modal-footer">
                    <div class="col-sm-12 text-center">
                        <button  id="footerModal" onclick="funcionPrueba()" class="btn btn-primary btn-xs " >Enviar</button> 
                    </div>
                    <!--                <div  class="col-sm-6">  
                                    <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close</button>
                                    </div>-->
                    <script type="text/javascript">
                            var tituloModal = document.getElementById("tituloModal");
                            var textareaModal = document.getElementById("textareaModal");
                            var footerModal = document.getElementById("footerModal");
                            var registroHora = '<?= $registro ?>';
                        function funcionPrueba() {
                           var mensajeExpediente = document.getElementById("textareaModal").value;
                            $.ajax({
                                type: 'POST',
                                url: '../../Controller/mensajeAlta.php',
                                data: {expSin: <?= $expsin ?>, registro: registroHora, mensajeExpediente: mensajeExpediente},
                                success: function (response) {
                                    textareaModal.style.display = "none";
                                        footerModal.style.display = "none";
                                    if (response.includes("okInsert")) {
                                        //tituloModal.style.display = "none";
                                        tituloModal.innerHTML ="<b>El mensaje se ha insertado correctamente</b>";

                                    } else {
                                         tituloModal.innerHTML ="<b>Ha ocurrido un error al enviar el mensaje.</b>";

                                    }
                                }
                            });
                        };
                        
                       

                    </script>
                </div>
                <!--                </form>-->
            </div>

        </div>
    </div>
</body>






