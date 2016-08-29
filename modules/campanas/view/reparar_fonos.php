<?php
require_once '../../ppal/superior.php';
$cam=new Campanas();
?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?> Reparar Telefonos</div>
        <div class="panel-body">
            <div class="panel panel-primary">
    <div class="panel-heading">Reparando Telefonos</div>
    <div class="panel-body">
        <table class="table">
            <tr>
                <td></td>
                <td >Telefono 1</td>
                <td >Telefono 2</td>
                <td >Telefono 3</td>
                <td >Telefono 4</td>
                <td >Telefono 5</td>
                <td >Telefono 6</td>
                <td >Telefono 7</td>
            </tr>
            <tr><td>Reparados</td>
                <td><?php $cam->RepararFonos("u6catelcasa", "dmphone", "data_especial_abcdin", "data_especial_abcdin_datos");$cam->ActualizarFono("u6catelcasa", "dmphone", "data_especial_abcdin", "data_especial_abcdin_datos", "fono1") ;?></td>
                <td><?php $cam->RepararFonos("u6catelofic", "dmphone", "data_especial_abcdin", "data_especial_abcdin_datos");$cam->ActualizarFono("u6catelofic", "dmbphone", "data_especial_abcdin", "data_especial_abcdin_datos", "fono2") ;?></td>
                <td><?php $cam->RepararFonos("u6catelcelu", "u6telcelu", "data_especial_abcdin", "data_especial_abcdin_datos");$cam->ActualizarFono("u6catelcelu", "u6telcelu", "data_especial_abcdin", "data_especial_abcdin_datos", "fono3") ;?></td>
                <td><?php $cam->RepararFonos("u6catelcont", "u6telconta", "data_especial_abcdin", "data_especial_abcdin_datos");$cam->ActualizarFono("u6catelconta", "u6telcont", "data_especial_abcdin", "data_especial_abcdin_datos", "fono4") ;?></td>
                <td><?php $cam->RepararFonos("u6telotr1", "u6telotro1", "data_especial_abcdin", "data_especial_abcdin_datos");$cam->ActualizarFono("u6catelotr1", "u6telotro1", "data_especial_abcdin", "data_especial_abcdin_datos", "fono5") ;?></td>
                <td><?php $cam->RepararFonos("u6telotr2", "u6telotro2", "data_especial_abcdin", "data_especial_abcdin_datos");$cam->ActualizarFono("u6catelotr2", "u6telotro2", "data_especial_abcdin", "data_especial_abcdin_datos", "fono6") ;?></td>
                <td><?php $cam->RepararFonos("u6telotr3", "u6telotro3", "data_especial_abcdin", "data_especial_abcdin_datos");$cam->ActualizarFono("u6catelotr3", "u6telotro3", "data_especial_abcdin", "data_especial_abcdin_datos", "fono7") ;?></td>
                
                
            </tr>
            <tr><td>No Reparables</td>
                <td><?php echo $cam->FonosBad("fono1",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->FonosBad("fono2",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->FonosBad("fono3",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->FonosBad("fono4",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->FonosBad("fono5",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->FonosBad("fono6",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->FonosBad("fono7",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
            </tr>
            <tr><td>Telefonos ok</td>
                <td><?php echo $cam->Fonosok("fono1",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->Fonosok("fono2",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->Fonosok("fono3",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->Fonosok("fono4",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->Fonosok("fono5",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->Fonosok("fono6",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
                <td><?php echo $cam->Fonosok("fono7",  "data_especial_abcdin", "data_especial_abcdin_datos") ;?></td>
            </tr>
            </tr>
        </table>
        
    </div>
            </div>
        </div>
    </div>
</div>



<?php require_once '../../ppal/footer.php';?>