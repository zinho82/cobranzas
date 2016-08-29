<?php
class db{
    function conectar_db($db){
        $conn=mysql_connect("localhost","root","") or die(mysql_error().' '.  mysql_errno());
	if (! $conn){
         	echo "<h2 align='center'>ERROR: 1 Imposible establecer conecci&oacute;n con el servidor de BD</h2>";
		exit;
	}
//Seleccionamos la base
mysql_select_db($db,$conn);
mysql_query("SET NAMES 'utf8'"); 
return $conn;
	}
 function conectar_db_ppal($ip,$db){
   $conn=mysql_connect($ip,"zinho","zinho1982") or die(mysql_error().' '.  mysql_errno());
	if (! $conn){
         	echo "<h2 align='center'>ERROR: 2 Imposible establecer conecci&oacute;n con el servidor de BD</h2>";
		exit;
	}
//Seleccionamos la base
mysql_select_db($db,$conn);
mysql_query("SET NAMES 'utf8'"); 
return $conn;
}
	}
        
?>
