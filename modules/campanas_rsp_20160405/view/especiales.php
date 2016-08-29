<?php
    require_once '../../ppal/superior.php';
    $proc=$_GET['proc'];
    $ruta=__ROOT__.MODULO_ACCESORIOS;
?>
<div class="panel panel-group">
    <div class="panel-info">
        <div class="panel-heading">  <?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?> Campañas Especiales</div>
        <div class="panel-body">
       <form enctype="multipart/form-data" class="formulario" id="formulario" method="post">
        <select name="campana">
                    <?php Campanas::ListaCampanasSelect(); ?>
        </select>
    <select name="archivo" id="archivo">
                    <?php Campanas::traer_archivo($proc) ?>
    </select>
    <select name="numcarga" id="numcarga"></select>
    <input type="text" name="nomcampana" placeholder="Nombre Nueva Campaña" size="28">
    <select name="fono" id="fono">
        <option value="fono1"> Seleccione Telefono a Enviar</option>
        <?php
            for($i=1;$i<14;$i++){
                echo "<option value='fono".$i."'>Fono".$i."</option>";
            }
        ?>
    </select>
    <select name="colas">
        <option value="0">Seleccione una cola</option>
        <?php
                Predictivo::colas();
        ?>
    </select>
    
    <input type="submit" value="Crear Campaña" class="btn btn-success">
    </form>
        </div>
    </div>
    <?php if(isset($_POST['campana'])):?>
    <div class="panel-warning">
        <div class="panel-heading"><?php echo $panel_respuesta_especial_titulo?></div>
        <div class="panel-body">
            <?php  
                if(Campanas::getArchivoBD_CSV($_POST['archivo'], $ruta.'archivos/', $_POST['numcarga'],";")==true){
                 $idPred=Predictivo::CrearCampanaPredictivo(str_replace(" ", "_",$_POST['nomcampana'].' '.$_SESSION['campana']." ".$_POST['fono'] ),$_POST['colas']);
                Campanas::crear_campanaNueva($_POST['campana'],$idPred,  strtoupper($_POST['nomcampana'].' '.$_SESSION['campana']." ".$_POST['fono']) );
                Campanas::EnviarNuevaCampana($idPred,$_POST['campana'],$_SESSION['bd'],$_SESSION['tabla'],$_POST['fono'],$_POST['numcarga'])    ;
                    echo " <i class='fa fa-check-circle'></i> Campaña Creada y registros enviados";
                }
                else{
                    echo "<br>No se cargo archivo<br>"; 
                }
            ?>
        </div>
    </div>
    <?php     endif;?>
</div>
<?php
require_once '../../ppal/footer.php';
?>

