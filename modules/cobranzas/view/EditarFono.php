<?php 
    require '../../ppal/superior.php';
    if(isset($_POST['actualizar'])){
        Campanas::postFonos($_POST['fono1'],$_POST['fono2'],$_POST['fono3'],$_POST['fono4'],$_POST['fono5'],$_POST['fono6'],$_POST['fono7'],$_POST['fono8'],$_POST['fono9'],$_POST['fono10'],$_POST['fono11'],$_POST['fono12'],$_POST['fono13'],$_GET['usuario'],$_SESSION['tabla'],$_SESSION['bd']);
    }
    $fonos=Campanas::getFonos($_GET['usuario'],$_SESSION['bd'],$_SESSION['tabla']);
?>
<div class="container">
    <div class="form-group">
        <div class="panel panel-primary">
            <div class="panel-heading">Actualizar Telefonos</div>
            <div class="panel-body">
    <form method="post">
        <div class="input-group"><label for="fono1">Telefono 1: </label> <input maxlength="9"  type="text" name="fono1" value="<?php echo $fonos['fono1'] ?>"></div>
        <div class="input-group"><label for="fono2">Telefono 2: </label> <input maxlength="9"  type="text" name="fono2" value="<?php echo $fonos['fono2'] ?>"></div>
        <div class="input-group"><label for="fono3">Telefono 3: </label> <input maxlength="9"  type="text" name="fono3" value="<?php echo $fonos['fono3'] ?>"></div>
        <div class="input-group"><label for="fono4">Telefono 4: </label> <input maxlength="9"  type="text" name="fono4" value="<?php echo $fonos['fono4'] ?>"></div>
        <div class="input-group"><label for="fono5">Telefono 5: </label> <input maxlength="9"  type="text" name="fono5" value="<?php echo $fonos['fono5'] ?>"></div>
        <div class="input-group"><label for="fono6">Telefono 6: </label> <input maxlength="9"  type="text" name="fono6" value="<?php echo $fonos['fono6'] ?>"></div>
        <p><strong>Telefonos Nuevos</strong></p>
        <div class="input-group"><label for="fono7">Telefono 7: </label> <input maxlength="9"  type="text" name="fono7" value="<?php echo $fonos['fono7'] ?>"></div>
        <div class="input-group"><label for="fono8">Telefono 8: </label> <input maxlength="9"  type="text" name="fono8" value="<?php echo $fonos['fono8'] ?>"></div>
        <div class="input-group"><label for="fono9">Telefono 9: </label> <input maxlength="9"  type="text" name="fono9" value="<?php echo $fonos['fono9'] ?>"></div>
        <div class="input-group"><label for="fono10">Telefono 10: </label> <input maxlength="9"  type="text" name="fono10" value="<?php echo $fonos['fono10'] ?>"></div>
        <div class="input-group"><label for="fono11">Telefono 11: </label> <input maxlength="9"  type="text" name="fono11" value="<?php echo $fonos['fono11'] ?>"></div>
        <div class="input-group"><label for="fono12">Telefono 12: </label> <input maxlength="9"  type="text" name="fono12" value="<?php echo $fonos['fono12'] ?>"></div>
        <div class="input-group"><label for="fono13">Telefono 13: </label> <input maxlength="9"  type="text" name="fono13" value="<?php echo $fonos['fono13'] ?>"></div>
        <input type="submit" value="Actualizar" name="actualizar" class="btn btn-block btn-success"></div>
    </form>
        </div>
        </div>
</div>
</div>