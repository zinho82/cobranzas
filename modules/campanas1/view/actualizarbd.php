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
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?> Actualizar Base de Datos</div>
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
    if(Campanas::getArchivoBD($_POST['archivo'],$ruta."archivos/",$_POST['numcarga']."\t")==TRUE){
        if( Campanas::BloquearRegistros($_SESSION['tabla'],$_SESSION['bd'])==true){

         if(Campanas::RegistrosExistentes($_SESSION['tabla'],$_SESSION['bd'])==true){
                 if(Campanas::CargarCampana($_SESSION['bd'],$_SESSION['tabla'])==true){
                     
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono1','u6catelcasa','dmphone');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono2','u6catelofic','dmbphone');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono3','u6catelcelu','u6telcelu');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono4','u6catelotr1','u6telotro1');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono5','u6catelotr2','u6telotro2');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono6','u6catelotr3','u6telotro3');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono7','u6catelotr6','u6telotro6');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono8','u6catelotr7','u6telotro7');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono9','u6catelotr8','u6telotro8');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono10','u6catelotr9','u6telotro9'); 
                           Campanas:: ActivarRegistro($_SESSION['bd'],$_SESSION['tabla']);
                           Campanas::ActualizarBD($_SESSION['bd'],$_SESSION['tabla']);
                 }
                 else{
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono1','u6catelcasa','dmphone');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono2','u6catelofic','dmbphone');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono3','u6catelcelu','u6telcelu');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono4','u6catelotr1','u6telotro1');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono5','u6catelotr2','u6telotro2');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono6','u6catelotr3','u6telotro3');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono7','u6catelotr6','u6telotro6');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono8','u6catelotr7','u6telotro7');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono9','u6catelotr8','u6telotro8');
                           Campanas::RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono10','u6catelotr9','u6telotro9'); 
                           Campanas:: ActivarRegistro($_SESSION['bd'],$_SESSION['tabla']);
                           Campanas::ActualizarBD($_SESSION['bd'],$_SESSION['tabla']);
                 }
         }
        }
    }
    ?>
     <?php     endif;?>
    </div>
  
       </div>
    </div>
</div>
   
<?php require_once '../../ppal/footer.php';?>
