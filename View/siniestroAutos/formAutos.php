<?php
if (!isset($_SESSION['logueado'])) {
    session_destroy();
    header("Location: ../../Controller/index.php");
}
?>

<!-- //AUTOS-->
<div class="dividerLarge"></div>
<br>
<h2>Datos del asegurado / póliza</h2>
<div class="divider"></div>
<input type="hidden" name="siniestro_ramo_id" value="1">
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
    <input type="text" class="form-control" id="telefono" name="telefono" required="" maxlength="50" size="50" >
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
<div class="form-group">
    <label for="asegurado">Asegurado * </label>
    <input type="text" class="form-control" id="asegurado" name="asegurado" required="">
</div>
<div class="form-group">
    <label for="poliza">Número de póliza </label>
    <input type="text" class="form-control" id="poliza" name="poliza">
</div>
<div class="form-group">
    <label for="matricula">Matrícula</label>
    <input type="text" class="form-control" id="matricula" name="matricula">
</div>

<!------------//DATOS DEL SINIESTRO---------------->
<br>
<h2>Datos del siniestro</h2>
<div class="divider"></div>
<br>
<div class="checkbox">
    <label>
        <input type="checkbox" id="checkbox1" name="checkbox1"> 
        Se adjunta declaración Amistosa de Accidente(DAA)
    </label>
</div>
<div class="ocultar1">
    <div class="form-group">
        <label for="direccion">Domicilio del siniestro </label>
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

    <br>
    <div class="checkbox">
        <label>
            <input type="checkbox"id="checkbox2" name="checkbox2"> 
            Solicitar al asegurado el resto de la información por teléfono
        </label>
    </div>
    <br>
    <div class="ocultar2">
        <div class="form-group">
            <label for="fecha">Fecha Siniestro </label>
            <input type="date" class="form-control" id="fecha" name="fecha">
        </div>
        <div class="form-group">
            <label for="declaracion">Descripción del siniestro </label>
            <textarea name="declaracion" class="form-control" id="declaracion" cols="32" maxlength="1000"></textarea>
        </div>
        <div>
            <label>Intervencion Atestado </label>
            <select class="select-style" name="intervencionfi">
                <option value="">- Seleccionar -</option>
                <option value="no">No</option>
                <option value="nosabe">No sabe</option>
                <option value="policíalocal">Policía Local</option>
                <option value="guardiacivil">Guardia Civil</option>
                <option value="otros">Otros</option>                                        
            </select>
        </div>
        <br>
        <div class="checkbox" >
            <label>
                <input type="checkbox" name="lesionados" value="" id="lesionados" > 
                Existen lesionados
            </label>
        </div>

    </div>
</div>
<br>
<div class="checkbox" >
    <label>
        <input type="checkbox" name="vip" value="" id="vip" > 
        Asegurado VIP
    </label>
</div>
<br>
<div class="form-group">
    <label for="observaciones">Consideraciones para el tramitador </label>
    <textarea name="observaciones" class="form-control" id="observaciones" cols="32" maxlength="1000" ></textarea>
</div>
<div class="form-group" id="adjuntos">
    <br>
</div>
<div id="addCampo">
    <a href="javascript:void(0)" onClick="addCampo()">
        <i title="Adjuntar Documentos" class="glyphicon glyphicon-plus"></i>
        Adjuntar Documentación </a>  
</div>
<!--<div id="addCampo">
    <a href="javascript:void(0)" onClick="addCampo()">Adjuntos
        <i class="glyphicon glyphicon-plus" title="Adjuntar"></i></a>  
</div>-->

<div class="form-group">
    <button type="submit" class="send" >Enviar</button>   
</div>      
