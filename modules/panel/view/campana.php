<?php

require_once '../../ppal/Config.php';
$estado=$_GET['edo'];
$campana=$_GET['cmp'];
 $sql="update call_center.campaign set estatus='$estado' where id=$campana";
mysql_query($sql,  Predictivo::conectar_db_predictivo('call_center')) or die(mysql_error());
if(mysql_affected_rows()>0){
    echo "<h1>Campaña Actualizada</h1>";
}
else{
    echo "<h1>Campaña NO Actualizada</h1>";
}

