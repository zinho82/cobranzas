<?php
require_once '../core/db_predictivo.php';
require_once '../../login/core/db.php';
$ObjCarga=new Predictivo();
 $ObjCarga->traer_numero_carga($_POST['ncampana']);
?>