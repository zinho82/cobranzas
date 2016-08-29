<?php
require_once '../../ppal/superior.php';
$proc = $_GET['proc'];
$ruta = __ROOT__ . MODULO_ACCESORIOS;
 $objCampana = new Campanas ();
$objPredictivo = new Predictivo();
if (isset($_POST['campana']))
   
$objCampana->getCampana($_POST['campana']);
?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading"><?php if (isset($_SESSION['campana'])) ;
echo "<b>Campaña: " . $_SESSION['campana'] . "</b> -" ?>  Gestion Telefonos </div>
        <div class="panel-body">
            <div class="panel panel-primary">
                <div class="panel-heading">Seleccionar Campaña</div>
                <div class="panel-body">


                    <!--el enctype debe soportar subida de archivos con multipart/form-data-->
                    <form enctype="multipart/form-data" class="formulario" id="formularios" method="post">
                        <select name="campana" id="campana"> 
<?php $objCampana->ListaCampanasSelect(); ?>
                        </select>
                        <select name="numcarga" id="numcarga">

                        </select>
                        <input type="submit" value="Buscar" class="btn btn-success">
                    </form>
                    <?php if (isset($_POST['campana'])): ?> 
                        <?php
                        $_SESSION['numcarga'] = $_POST['numcarga'];
                        $f = "Fono";
                        $f1 = "Fono1";
                        $f6 = "Fono6";
                        $f11 = "Fono11";
                        $f2 = "Fono2";
                        $f7 = "Fono7";
                        $f12 = "Fono12";
                        $f3 = "Fono3";
                        $f8 = "Fono8";
                        $f13 = "Fono13";
                        $f4 = "Fono4";
                        $f9 = "Fono9";
                        $f5 = "Fono5";
                        $f10 = "Fono10";

                        $objPredictivo->traer_datos_llamadas($_SESSION['predictivo'], 'call_center');
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
    <?php for ($i = 1; $i < 14; $i++): ?>
                                    <tr>
                                    <?php $objPredictivo->ActualizarGestionTelefono(strtolower($f . $i), $_SESSION['tabla'], $_SESSION['bd'], "check_tel_new_" . $i); ?>
                                        <td><?php echo $f . $i; ?></td>
                                        <td><?php $objPredictivo->ContarNumeros(strtolower($f . $i), $_SESSION['bd'], $_SESSION['tabla'], 'where  numero_de_carga=' . $_POST['numcarga']) ?></td>
                                        <td><?php $objPredictivo->ContarNumeros(strtolower($f . $i), $_SESSION['bd'], $_SESSION['tabla'], 'where length(' . strtolower($f . $i) . ')=9 and numero_de_carga=' . $_POST['numcarga']) ?></td>
                                        <td><?php $objPredictivo->ContarNumeros(strtolower($f . $i), $_SESSION['bd'], $_SESSION['tabla'], 'where length(' . strtolower($f . $i) . ')!=9 and numero_de_carga=' . $_POST['numcarga']) ?></td>
                                        <td><?php $objPredictivo->ContarNumeros('fono', 'callcenter', 'recorrido_predictivo', "inner join " . $_SESSION['bd'] . "." . $_SESSION['tabla'] . "  on " . strtolower($f . $i) . "=fono where status!='' " . 'and numero_de_carga=' . $_POST['numcarga']) ?></td>
                                        <td><?php $objPredictivo->ContarNumeros($f . $i, $_SESSION['bd'], $_SESSION['tabla'], 'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_' . $i . ' and b.tipo_gestion="Negativa"  and numero_de_carga=' . $_POST['numcarga']) ?></td>
                                        <td><?php $objPredictivo->ContarNumeros($f . $i, $_SESSION['bd'], $_SESSION['tabla'], 'a inner join resp_rapida_subrespuesta b on b.id_resp_rapida_subrespuesta=a.check_tel_new_' . $i . ' and b.tipo_gestion="Positiva"  and numero_de_carga=' . $_POST['numcarga']) ?></td>
                                        <td><?php $objPredictivo->BotonesAccion($_SESSION['predictivo'], strtolower($f . $i)); ?></td>
                                    </tr>
    <?php endfor; ?>

                            </tbody>
                        </table>
    <?php endif; ?>
                </div>  

            </div>
        </div>
    </div>

    <?php require_once '../../ppal/footer.php'; ?>


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


