<?php
require_once '../../ppal/superior.php';
 $proc=$_GET['proc'];
  $ruta=__ROOT__.MODULO_ACCESORIOS;
 $objCampana=new Campanas();
 if(isset($_POST['campana']))
  Campanas::getCampana($_POST['campana']);
 ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?> Marcar Cartas y Juicios</div>
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
                    <?php $objCampana->traer_archivo($proc) ?>
    </select>
    <select name="numcarga" id="numcarga">
                    
        </select>
    <input type="submit" value="Marcar" class="btn btn-success">
    </form>
    <?php if(isset($_POST['campana'])):?>  
    <?php 
    ///////////////////////
    /////marcar cartas en la bd
    /////////////////////
    $objCampana->getArchivoBD_CSV($_POST['archivo'], $ruta.'archivos/', $_POST['numcarga'],";");
    $objCampana->MarcarCartas($_SESSION['bd'], $_SESSION['tabla'], $_POST['numcarga'], 'cartaabogado','c9');
    $objCampana->MarcarCartas($_SESSION['bd'], $_SESSION['tabla'], $_POST['numcarga'], 'juicio','c8');
    ?>
     <?php     endif;?>
    </div> 
  
       </div>
    </div>
</div>
   
<?php require_once '../../ppal/footer.php';?>
