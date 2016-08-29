<?php
require_once '../../ppal/superior.php';
 $proc=$_GET['proc'];
  $ruta=__ROOT__.MODULO_ACCESORIOS;
 $objCampana=new Campanas();
 ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?>Cargar Base de Datos</div>
        <div class="panel-body">
            <div class="panel panel-primary">
    <div class="panel-heading">Seleccionar Campañas</div>
    <div class="panel-body">
        <?php if(!isset($_POST['campana'])):?> 
        
<!--el enctype debe soportar subida de archivos con multipart/form-data-->
<form enctype="multipart/form-data" class="formulario" id="formulario" method="post">
        <select name="campana">
                    <?php Campanas::ListaCampanasSelect(); ?>
        </select>
    <select name="archivo">
                    <?php $objCampana->traer_archivo('bd') ?>
    </select>
    <input type="text" value="<?php echo date('Ymd');?>" name="numcarga">
    <input type="submit" value="Comenzar Carga" class="btn btn-success">
    </form>
    <!--div para visualizar mensajes-->
    <div class="messages"></div><br /><br />
    <!--div para visualizar en el caso de imagen-->
    <div class="showImage"></div>
    <?php else:?> 
    <?php 
         $objCampana->getCampana($_POST['campana']);
      
                if( $objCampana->getArchivoBD($_POST['archivo'],$ruta."/archivos/",$_POST['numcarga']."\t")==TRUE){
            
                    if($objCampana->CargarCampana($_SESSION['bd'],$_SESSION['tabla'])==TRUE){
                        echo "<br>revisar y actualizar numeros de telefono null numero menores a largo 5";
                           $objCampana->RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono1','u6catelcasa','dmphone');
                           $objCampana->RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono2','u6catelofic','dmbphone');
                           $objCampana->RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono3','u6catelcelu','u6telcelu');
                           $objCampana->RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono4','u6catelotr1','u6telotro1');
                           $objCampana->RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono5','u6catelotr2','u6telotro2');
                           $objCampana->RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono6','u6catelotr3','u6telotro3');
                           $objCampana->RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono7','u6catelotr6','u6telotro6');
                           $objCampana->RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono8','u6catelotr7','u6telotro7');
                           $objCampana->RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono9','u6catelotr8','u6telotro8');
                           $objCampana->RevisarNumeroTelefono($_SESSION['bd'],$_SESSION['tabla'],'fono10','u6catelotr9','u6telotro9'); 
                           $sql="update ".$_SESSION['bd'].".".$_SESSION['tabla']." set estado=0 where numero_de_carga!='".$_POST['numcarga']."'";
                           mysql_query($sql,  Config::conectar_db($_SESSION['bd'])) or die(mysql_error()); 
                           }
                           else{
                               echo "<br>Error cargando registros o actualizando numero telefonicos ";
                           }
                } 
               else{
                    echo "Error Cargando base Temporal";
                }
    ?>
     <?php     endif;?>
    </div>
  
       </div>
    </div>
</div>
   
<?php require_once '../../ppal/footer.php';?>
