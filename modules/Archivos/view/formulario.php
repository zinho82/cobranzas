<?php 
    require_once  '../../ppal/superior.php';
    $ruta=__ROOT__.MODULO_ACCESORIOS_req; 
?>
<div class="panel panel-primary">  
    <div class="panel-heading">Subir Archivo</div>
    <div class="panel-body">
<!--el enctype debe soportar subida de archivos con multipart/form-data-->
<form enctype="multipart/form-data" class="formulario" id="formulario">
        <label>Subir un archivo</label><br />
         <select name="campana">
             <option selected="">Seleccione Campaña</option>
                    <?php Campanas::ListaCampanasSelect(); ?>
                </select>
                <select name="proceso">
                    <option selected="">Seleccione Tipo de Archivo a Cargar</option>
                    <option value="carta">Carta</option>
                    <option value="bd">Base de Datos</option>
                    <option value="juicio">Juicio</option>
                    <option value="abd">Actualizacion BD</option>
                    <option value="pie">Pie 0</option>
                    <option value="fono">Fonos Nuevos</option>
                    <option value="esp">Campañas Especiales</option>
                </select> 
        
        <input class="btn btn-success" name="archivo" type="file" id="imagen" /><br />
        <input name="ruta" type="hidden" value="<?php echo $ruta;?>" id="imagen" />
        
        <input class="btn btn-success " type="button" value="Subir Archivo" /><br />
    </form>
    <!--div para visualizar mensajes-->
    <div class="messages"></div><br /><br />
    <!--div para visualizar en el caso de imagen-->
    <div class="showImage"></div>
    </div>
</div>
<?php require_once  '../../ppal/footer.php';?>