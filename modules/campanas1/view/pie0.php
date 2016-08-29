<?php
require_once '../../ppal/superior.php';
 $proc=$_GET['proc'];
  $ruta=__ROOT__.MODULO_ACCESORIOS;
 //$objCampana=new Campanas();
 if(isset($_POST['campana']))
  Campanas::getCampana($_POST['campana']);
 ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?> Actualizar Pie 0</div>
        <div class="panel-body">
            <div class="panel panel-primary">
    <div class="panel-heading">Seleccionar Campaña</div>
    <div class="panel-body">
        
        
<!--el enctype debe soportar subida de archivos con multipart/form-data-->
<form enctype="multipart/form-data" class="formulario" id="formulario" method="post">
        <select name="campana">
                    <?php Campanas::ListaCampanasSelect(); ?>
        </select>
    <select name="archivo" id="archivo">
                    <?php Campanas::traer_archivo($proc) ?>
    </select>
    <select name="numcarga" id="numcarga">
                    
        </select>
    <input type="submit" value="Actualizar" class="btn btn-success">
    </form>
    <?php if(isset($_POST['campana'])):?>  
    <?php 
    ///////////////////////
    /////Actualizar PIE 0
    /////////////////////
    Campanas::getArchivoBD_CSV($_POST['archivo'],$ruta."archivos/",$_POST['numcarga'],";");
    Campanas::MarcarPie0($_SESSION['bd'],$_SESSION['tabla'],$_POST['numcarga'],'pie0','c1');
    ?> 
     <?php     endif;?>
    </div>
  
       </div>
    </div>
</div>
   
<?php require_once '../../ppal/footer.php';?>
