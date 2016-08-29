<?php   require_once '../../ppal/superior.php';?>
<?php
require_once '../../ppal/superior.php';
 $proc=$_GET['proc'];
  $ruta=__ROOT__.MODULO_ACCESORIOS;
  if(isset($_POST['campana']))
  Campanas::getCampana($_POST['campana']);
 ?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?>  Gestion Telefonos </div>
        <div class="panel-body">
            <div class="panel panel-primary">
    <div class="panel-heading">Seleccionar Campaña</div>
    <div class="panel-body">
        
        
<!--el enctype debe soportar subida de archivos con multipart/form-data-->
<form enctype="multipart/form-data" class="formulario" id="formularios" method="post">
    <select name="campana" id="campana"> 
                    <?php Campanas::ListaCampanasSelect(); ?>
        </select>
    <select name="numcarga" id="numcarga">
                    
        </select>
    <input type="submit" value="Buscar" class="btn btn-success">
    </form>
   <?php if(isset($_POST['campana'])):?> 
<?php 
     
     $f1="Fono1";$f6="Fono6";$f11="Fono11";
     $f2="Fono2";$f7="Fono7";$f12="Fono12";
     $f3="Fono3";$f8="Fono8";$f13="Fono13";
     $f4="Fono4";$f9="Fono9";
     $f5="Fono5";$f10="Fono10";
    
     Predictivo::ActualizarGestionTelefono(strtolower($f1),$_SESSION['tabla'],$_SESSION['bd'],"check_tel_new_1");
     Predictivo::ActualizarGestionTelefono(strtolower($f2),$_SESSION['tabla'],$_SESSION['bd'],"check_tel_new_2");
     Predictivo::ActualizarGestionTelefono(strtolower($f3),$_SESSION['tabla'],$_SESSION['bd'],"check_tel_new_3");
     Predictivo::ActualizarGestionTelefono(strtolower($f4),$_SESSION['tabla'],$_SESSION['bd'],"check_tel_new_4");
     Predictivo::ActualizarGestionTelefono(strtolower($f5),$_SESSION['tabla'],$_SESSION['bd'],"check_tel_new_5");
     Predictivo::ActualizarGestionTelefono(strtolower($f6),$_SESSION['tabla'],$_SESSION['bd'],"check_tel_new_6");
     Predictivo::traer_datos_llamadas($_SESSION['predictivo'],'call_center'); 
?>
<table class="table">
    <thead>
        <tr>
            <th>Telefono </th>
            <th>Cantidad</th> 
            <th>Validos  </th>
            <th>No Validos</th>
            <th>Recorridos</th>
            <th>Gestion Negativa</th>
            <th>Gestion Positiva</th>
            <th>Acciones</th> 
        </tr> 
    </thead>
    <tbody>
        <tr>
            <td><?php echo $f1;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f1),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
           <td><?php Predictivo::ContarNumeros(strtolower($f1),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f1).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f1),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f1).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f1)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f1,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f1,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f1));?></td>
        </tr>
        <tr>
            <td><?php echo $f2;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f2),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f2),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f2).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f2),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f2).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f2)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f2,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_2 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f2,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_2 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f2));?></td>
        </tr>
        <tr>
            <td><?php echo $f3;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f3),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f3),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f3).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f3),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f3).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f3)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f3,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_3 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f3,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_3 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f3));?></td>
        </tr>
        <tr>
            <td><?php echo $f4;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f4),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f4),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f4).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f4),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f4).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f4)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f4,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_4 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f4,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_4 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f4));?></td>
        </tr>
        <tr>
            <td><?php echo $f5;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f5),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f5),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f5).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f5),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f5).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f5)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f5,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_5 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f5,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_5 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f5));?></td>
        </tr>
        <tr>
            <td><?php echo $f6;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f6),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f6),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f6).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f6),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f6).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f6)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f6,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_6 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f6,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_6 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f6));?></td> 
        </tr>
        <tr>
            <td><?php echo $f7;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f7),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
           <td><?php Predictivo::ContarNumeros(strtolower($f7),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f7).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f7),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f7).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f7)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f7,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f7,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f7));?></td>
        </tr>
        <tr>
            <td><?php echo $f8;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f8),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
           <td><?php Predictivo::ContarNumeros(strtolower($f8),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f8).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f8),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f8).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f8)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f8,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f8,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f8));?></td>
        </tr>
        <tr>
            <td><?php echo $f9;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f9),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
           <td><?php Predictivo::ContarNumeros(strtolower($f9),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f9).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f9),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f9).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f9)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f9,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f9,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f9));?></td>
        </tr>
        <tr>
            <td><?php echo $f10;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f10),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
           <td><?php Predictivo::ContarNumeros(strtolower($f10),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f10).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f10),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f10).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f10)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f10,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f10,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f10));?></td>
        </tr>
        <tr>
            <td><?php echo $f11;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f11),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
           <td><?php Predictivo::ContarNumeros(strtolower($f11),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f11).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f11),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f11).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f11)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f11,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f11,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f11));?></td>
        </tr>
        <tr>
            <td><?php echo $f12;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f12),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
           <td><?php Predictivo::ContarNumeros(strtolower($f12),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f12).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f12),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f12).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f12)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f12,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f12,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f12));?></td>
        </tr>
        <tr>
            <td><?php echo $f13;?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f13),$_SESSION['bd'],$_SESSION['tabla']) ?></td>
           <td><?php Predictivo::ContarNumeros(strtolower($f13),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f13).')=9') ?></td>
            <td><?php Predictivo::ContarNumeros(strtolower($f13),$_SESSION['bd'],$_SESSION['tabla'],'where length('.strtolower($f13).')!=9') ?></td>
            <td><?php Predictivo::ContarNumeros('fono','callcenter','recorrido_predictivo',"inner join ".$_SESSION['bd'].".".$_SESSION['tabla']."  on ".strtolower($f13)."=fono where status!=''") ?></td>
            <td><?php Predictivo::ContarNumeros($f13,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Negativa"')?></td>
            <td><?php Predictivo::ContarNumeros($f13,$_SESSION['bd'],$_SESSION['tabla'],'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_1 and b.tipo_gestion="Positiva"')?></td>
            <td><?php Predictivo::BotonesAccion($_SESSION['predictivo'],strtolower($f13));?></td>
        </tr>
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


