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
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?> Cargar Nuevos Telefonos</div>
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
    /////Actualizar registros y cargar archivo temporal
    /////////////////////
    if(Campanas::getArchivoBD_CSV($_POST['archivo'],$ruta."archivos/",$_POST['numcarga'].";")==TRUE){
        Campanas::LimpiarTemporal(1,27,"callcenter","temporal","c");
        Campanas::LimpiarTemporal(7,13,$_SESSION['bd'],$_SESSION['tabla'],"fono");
        Predictivo::FonoNuevo($_SESSION['bd'],$_SESSION['tabla'],'c1','c2','fono7');
        Predictivo::FonoNuevo($_SESSION['bd'],$_SESSION['tabla'],'c4','c5','fono8');
        Predictivo::FonoNuevo($_SESSION['bd'],$_SESSION['tabla'],'c7','c8','fono9');
        Predictivo::FonoNuevo($_SESSION['bd'],$_SESSION['tabla'],'c10','c11','fono10');
        Predictivo::FonoNuevo($_SESSION['bd'],$_SESSION['tabla'],'c13','c14','fono11');
        Predictivo::FonoNuevo($_SESSION['bd'],$_SESSION['tabla'],'c16','c17','fono12');
        Predictivo::FonoNuevo($_SESSION['bd'],$_SESSION['tabla'],'c19','c20','fono13');
        
         
    }
    ?>
     <?php     endif;?>
    </div>
  
       </div>
    </div>
</div>
   
<?php require_once '../../ppal/footer.php';?>
