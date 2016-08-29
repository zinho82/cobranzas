<?php

class Cobranzas {
    function mostrar_registro($db,$tabla,$id_cartera){
        $conn=new db();
        $sql="select * from ".$db.".".$tabla."where id_carpeta=".$id_cartera;
        $rs= mysql_query($sql,$conn->conectar_db($db));
        return $datos=mysql_fetch_array($rs);
    }
}
?>