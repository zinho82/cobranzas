<?php
require_once 'config.php';
require_once  (__ROOT__.MODULO_LOGIN."core/db.php");
class actualiza{
    function crear_indice($tabla,$db,$indice){
       echo  $sql="create index ".$indice." on ".$db.".".$tabla." (".$indice.")";
        $conn = new db();
        mysql_query($sql,$conn->conectar_db($db)) or die(mysql_error());
    }
    function eliminar_espacios($tabla,$db,$campo){
      echo   $sql="update ".$db.".".$tabla." set ".$campo."=trim(".$campo.")";
                 $conn = new db();
        mysql_query($sql,$conn->conectar_db($db)) or die(mysql_error());
    }
    function cambiar_campo($campo,$db,$tabla,$tipo_campo,$largo_campo){
          $conn=new db();
          echo $sql="alter table ".$db.".".$tabla."  modify ".$campo." ".$tipo_campo."(".$largo_campo.")";
          mysql_query($sql,$conn->conectar_db($db));
    }
}
$act =new actualiza();
$act->crear_indice('cartera','workflow_limpio_cobranzas','dmlstact');
$act->crear_indice('persona','workflow_limpio_cobranzas','celular');
$act->crear_indice('persona','workflow_limpio_cobranzas','telefono');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6catelcasa');
$act->crear_indice('cartera','workflow_limpio_cobranzas','dmphone');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6catelofic');
$act->crear_indice('cartera','workflow_limpio_cobranzas','dmbphone');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6catelcelu');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6catelcont');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6catelotr1');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6catelotr2');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6catelotr3');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6telotro1');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6telotro2');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6telotro3');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6telcelu');
$act->crear_indice('cartera','workflow_limpio_cobranzas','u6telconta');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6telconta');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6catelcelu');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6telcelu');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6telotro3');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6telotro2');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6telotro1');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6catelotr3');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6catelotr2');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6catelotr1');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6catelconta');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6catelcelu');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','dmbphone');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6catelofic');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','u6catelcasa');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','dmbphone');
$act->eliminar_espacios('persona','workflow_limpio_cobranzas','telefono');
$act->eliminar_espacios('persona','workflow_limpio_cobranzas','celular');
$act->eliminar_espacios('persona','workflow_limpio_cobranzas','dmacct');
$act->eliminar_espacios('persona','workflow_limpio_cobranzas','dmassnum'); 
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','dmname');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','dmaddr1');
$act->eliminar_espacios('cartera','workflow_limpio_cobranzas','dmaddr2');
$act->cambiar_campo("u6telconta", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6catelcelu", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6telcelu", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6telotro3", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6catelotr2", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6telotro1", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6catelotr3", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6catelotr2", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6catelotr1", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6catelconta", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6catelcelu", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6catelcasa", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6catelofic", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("dmbphone", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
$act->cambiar_campo("u6catelcont", 'workflow_limpio_cobranzas', 'cartera', 'int', 11);
?>

