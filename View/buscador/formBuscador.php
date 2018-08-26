<?php

if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../../Controller/index.php");
}
?>

<h1><a href="javascript:history.back()">
        <i class="glyphicon glyphicon-arrow-left" title="Atrás"></i></a> 

    &nbsp; Buscador &nbsp; 

    <a href="../Controller/index.php">
        <i class="glyphicon glyphicon-home" title="Inicio"></i></a>
</h1>            
<div class="divider"></div>

<form method="post" action="../../Controller/siniestro.php" id="formSearch">
    <br>
    <div class="form-group text-center">
        <label>
            <input type="radio" class="searchInput" id="radioEstado3" name="radioEstado" value="todos"> 
            Todos
        </label>
        <label>
            <input type="radio" class="searchInput" id="radioEstado2" name="radioEstado" value="true" checked> 
            Abiertos
        </label>
        <label>
            <input type="radio" class="searchInput" id="radioEstado1" name="radioEstado" value="false"> 
            Cerrados
        </label>
    </div>
    <br>
    <div class="form-group col-sm-12 col-md-6">
        <div class="col-sm-4 col-md-12">
            <label for="asegurado">Asegurado</label>
        </div>
        <div class="col-sm-8 col-md-12">
            <input type="text" class="searchInput noRadio" onclick="unselect()" id="asegurado"name="asegurado" placeholder="Asegurado">
        </div>
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <div class="col-sm-4 col-md-12">
            <label for="numSiniestro" >Nº Siniestro</label>
        </div>
        <div class="col-sm-8 col-md-12">
            <input type="text" class="searchInput noRadio" onclick="unselect()" id="numSiniestro" name="numSiniestro" placeholder="Nº Siniestro">
        </div>
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <div class="col-sm-4 col-md-12">
            <label for="numPoliza">Nº Póliza</label>
        </div>
        <div class="col-sm-8 col-md-12">
            <input type="text" class="searchInput noRadio" onclick="unselect()" id="numPoliza" name="numPoliza" placeholder="Nº Póliza">
        </div>
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <div class="col-sm-4 col-md-12">
            <label for="tipoSiniestro" >Tipo Siniestro</label>
        </div>
        <div class="col-sm-8 col-md-12">
            <input type="text" class="searchInput noRadio" onclick="unselect()" id="tipoSiniestro" name="tipoSiniestro" placeholder="Tipo Siniestro">
        </div>
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <div class="col-sm-4 col-md-12">
            <label for="telefono">Telf Contacto</label>
        </div>
        <div class="col-sm-8 col-md-12">
            <input type="text" class="searchInput noRadio" onclick="unselect()" id="telefono" name="telefono" placeholder="Telf Contacto">
        </div>
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <div class="col-sm-4 col-md-12">
            <label for="fecha">Fecha Alta Siniestro</label>
        </div>
        <div class="col-sm-8 col-md-12">
            <input type="date" class="searchInput noRadio" onclick="unselect()" id="fecha" name="fecha">
        </div>
    </div>
    <div>
        <div class="form-group col-sm-12 col-md-6">
            <div class="col-sm-4 col-md-12">
                <label for="ciaaseguradora" >Compañía</label>
                <select class="select-styleCompaniaBuscar searchInput" id="ciaaseguradoracliente" name="ciaaseguradora" placeholder="Compañía" onchange="unselect()" >
                    <option value="">- Seleccionar -</option>
                    <?php
                    
                    foreach ($companiasPorCliente as $companiaPorCliente) {
                        ?>    
                        <option value="<?= $companiaPorCliente->getNombreagente() ?>"> <?= $companiaPorCliente->getNombreagente() ?></option>

                        <?php
                    }
                    ?>
                </select>                
            </div>
        </div>
    </div>
    <br>
     <div class="form-group  col-sm-12 col-md-12">
<!--        <div class="col-xs-offset-0 col-xs-12 col-sm-offset-6 col-sm-6 col-md-offset-8 col-md-4 col-lg-offset-8 col-lg-4">-->
<!--            <div>-->
                <button type="submit" class="botonBuscar">Buscar</button>
<!--            </div>-->
<!--        </div>-->
    </div>
</form>  
