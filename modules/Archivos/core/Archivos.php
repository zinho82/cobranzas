<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * clase gestion archivos
 * 
 *
 * @author zinho
 */
class Archivos {
    function conectar_db($db){
        $conn=mysql_connect("localhost","root","") or die(mysql_error().' '.  mysql_errno());
	if (! $conn){
         	echo "<h2 align='center'>ERROR: 1 Imposible establecer conecci&oacute;n con el servidor de BD</h2>";
	}
//Seleccionamos la base
mysql_select_db($db,$conn);
mysql_query("SET NAMES 'utf8'"); 
return $conn;
	}
    public function guardar_archivo($archivo,$campana,$proceso,$numcarga,$nomArchivo) {
     echo    $sql="insert into callcenter.archivos values (null,'".$archivo."','".date('Y-m-d G:i:s')."','".$proceso."','".$campana."','".$numcarga."','".$nomArchivo."')";
     mysql_query($sql, $this->conectar_db('callcenter')) or die(mysql_error());
    } 
}
