<?php
require_once '../../ppal/superior.php';
  if(isset($_POST['campana']))
  {
      Campanas::getCampana($_POST['campana']);
  }
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

                


