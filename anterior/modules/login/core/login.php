<?php
session_start();
class login {
     function login_verificar($usuario,$clave,$nombre_base){
        $conn=new db();
		//echo $clave=sha1(md5(sha1($clave)));
      echo   $sql="select * from ".$nombre_base.".usuario where usuario='".$usuario."' and pwd='".$clave."'";
        $res=mysql_query($sql,$conn->conectar_db($nombre_base)) or die(mysql_error());
        while($usuario=mysql_fetch_row($res)){
            var_dump($usuario);
          echo 'usuario: '.  $usuario['ncompleto'];
            $_SESSION['usuario']['nombre_completo']=$usuario[5];
            $_SESSION['usuario']['id_usuario']=$usuario[0];
        }
        
    }
}
?>