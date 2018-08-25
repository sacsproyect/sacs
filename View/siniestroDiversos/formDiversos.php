<?php
if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../../Controller/index.php");
}
?> 

<!-- //DIVERSOS-->
<div class="dividerLarge"></div>
<br>

<h2>Datos del asegurado / póliza</h2>
<div class="divider"></div>

<div>
    <label>Ramo</label>
    <select class="select-style"  name="siniestro_ramo_id" id="siniestro_ramo_id">
        <option value="">- Seleccionar -</option>
        <?php
        foreach ($ramosSinAutos as $ramoSinAutos) {
            ?>    
            <option value="<?= $ramoSinAutos->getId() ?>"><?= $ramoSinAutos->getRamo() ?></option>

            <?php
        }
        ?>
    </select>
</div>
<br>
<div>
    <label>Clase de siniestro</label>
    <select class="select-style"  name="siniestro_tipo_id" id="siniestro_tipo_id">
        <option value="">- Seleccionar -</option>
        <?php
        foreach ($siniestroTipos as $siniestroTipo) {
            ?>    
            <option value="<?= $siniestroTipo->getId() ?>"><?= $siniestroTipo->getTipo() ?></option>

            <?php
        }
        ?>
    </select>
</div>
<br>
<div class="form-group">
    <label for="telefono">Teléfono y otros datos de contacto *</label>
    <input type="text" class="form-control" id="telefono" name="telefono" required="" maxlength="50" size="50">
</div>
<div>
    <label>Compañía * </label>
    <select class="select-style" name="ciaaseguradora" id="ciaaseguradora" required="">
        <option value="">- Seleccionar -</option>
        <?php
        foreach ($companias as $compania) {
            ?>    
            <option value="<?= $compania->getNombre() ?>"><?= $compania->getNombre() ?></option>
            <?php
        }
        ?>
    </select>
</div>
<br>
<div class="checkbox"> 
    <label>
        <input type="checkbox" id="checkbox3"> Voy a Adjuntar condiciones particulares de la poliza      
        <a href="javascript:void(0)">
                <i class="glyphicon glyphicon-question-sign" title="En el caso de adjuntar las condiciones particulares de la póliza, hacer click en la casilla de verificación. "></i></a>
    </label>
</div>
<div class="ocultar3">
    <div class="form-group">
        <label for="asegurado">Asegurado</label>
        <input type="text" class="form-control" id="asegurado" name="asegurado">
    </div>
    <div class="form-group">
        <label for="poliza">Número de póliza</label>
        <input type="text" class="form-control" id="poliza" name="poliza">
    </div>
    <div class="form-group">
        <label for="direccion">Domicilio del siniestro</label>
        <input type="text" class="form-control" id="direccion" name="direccion">
    </div>
    <div class="form-group">
        <label for="localidad">Localidad</label>
        <input type="text" class="form-control" id="localidad" name="localidad">
    </div>
    <div>
        <label>Provincia </label>
        <select class="select-style" name="provincia" id="provincia">
            <option value="">- Seleccionar -</option>
            <?php
            foreach ($provincias as $provincia) {
                ?>    
                <option value="<?= $provincia->getNombre() ?>"><?= $provincia->getNombre() ?></option>

                <?php
            }
            ?>
        </select>
    </div>
</div>
<br>
<div class="checkbox">
    <label>
        <input type="checkbox" name="checkbox4" id="checkbox4" > 
        Solicitar al asegurado el resto de la información por teléfono
    </label>
</div>

<div class="ocultar4">
    <h2>Datos del siniestro</h2>
    <div class="divider"></div>
    <div class="form-group">
        <label for="fecha">Fecha de siniestro</label>
        <input type="date" class="form-control" id="fecha" name="fecha">
    </div>
    <div class="form-group">
        <label for="declaracion">Descripción de siniestro</label>
        <textarea name="declaracion" class="form-control" id="declaracion" cols="32" maxlength="1000"></textarea>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="terceros" value="" id="terceros"> 
            Existen terceros perjudicados<br>
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="urgente" value="" id="urgente"> 
            Se requiere intervención urgente de reparadores<br>
        </label>
    </div>
</div>
<br>
<div class="checkbox">
    <label>
        <input type="checkbox" name="vip" value="" id="vip"> 
        Asegurado VIP<br>
    </label>
</div>

<div class="form-group">
    <label for="observaciones">Consideraciones para el tramitador </label>
    <textarea name="observaciones" class="form-control" id="observaciones" cols="32" maxlength="1000" ></textarea>
</div>

<div class="form-group" id="adjuntos">
    <br>
</div>
<!--<div id="addCampo">-->
<!--<a href="javascript:void(0)" onClick="addCampo()">Adjuntos 
    <i class="glyphicon glyphicon-plus" title="Adjuntar"></i></a>
</div>-->
<div id="addCampo">
    <a href="javascript:void(0)" onClick="addCampo()">
        <i title="Adjuntar Documentos" class="glyphicon glyphicon-plus"></i>
        Adjuntar Documentación </a>  
</div>
<div class="form-group">
    <button type="submit" class="send" >Enviar</button>
</div>     
