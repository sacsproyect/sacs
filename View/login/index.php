
<!-- VISTA HTML 5 -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/head.php'; ?>
<body>
    <div class="container-fluid">
        <div class="row header">   
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                <a href="../Controller/index.php">
                    <img class="logo center-block" src="../View/img/sacs-white.png" alt="sacs"></a>
            </div>
        </div> 
        <div class="row ">
            <h1 class="text-center">Login</h1>
            <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form name="F" method="post" action="../Controller/validarLogin.php">
                    <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label>Usuario: </label>
                        </div>
                        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="text" name="usuario" placeholder="Usuario" autofocus="" required >
                        </div>
                    </div>
                    <div  class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label>Contraseña: </label>
                        </div>
                        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div  class=" col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 btn-block">
                            <button type="submit" class="send">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/View/footer.php';
       
