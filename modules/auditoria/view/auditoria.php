<?php
require_once '../../ppal/superior.php';
  if(isset($_POST['campana']))
  Campanas::getCampana($_POST['campana']);
 ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?>  Buscar Registros </div>
        <div class="panel-body">
            <div class="panel panel-primary">
    <div class="panel-heading">Seleccionar Campaña</div>
    <div class="panel-body">
        
        
<!--el enctype debe soportar subida de archivos con multipart/form-data-->
<form enctype="multipart/form-data" class="formulario" id="formularios" method="post">
    <select name="campana" > 
                    <?php Campanas::ListaCampanasSelect(); ?>
        </select>
    <input type="text" name="cuenta" placeholder="Ingrese numero de cuenta">
    <input type="submit" value="Buscar" class="btn btn-success">
    </form>
   <?php if(isset($_POST['campana'])):?> 
<table class="table">
    <thead>
        <tr>
            <th>Numero de Carga</th>
            <th>Cuenta </th>
            <th>Rut</th>
            <th>Nombre  </th>
            <th>Deuda Vencida</th>
            <th>Ultima Gestion</th>
            <th>Fecha Ultima Gestion</th>
            <th>Acciones</th> 
        </tr>
    </thead>
    <tbody>
        <?php             
            Buscar::BuscarCuenta($_SESSION['bd'],$_SESSION['tabla'],$_POST['cuenta'],$_POST['campana']) ;
        ;?>
        
    </tbody>
</table>
     <?php     endif;?>
    </div>  
  
       </div>
    </div>
</div>
   
<?php require_once '../../ppal/footer.php';?>

                    
                    <?php
              /*          echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelcelu,u6telcelu) ",'Movil',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelcasa,dmphone) ",'Fono1',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelofic,dmbphone) ",'Fono2',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelcont,u6telconta) ",'Fono3',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelotr1,u6telotro1) ",'Fono4',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelotr2,u6telotro2) ",'Fono4',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelotr3,u6telotro3) ",'Fono5',$_POST['ncampana'],$_POST['ncarga']);
                        */
                  ?>


