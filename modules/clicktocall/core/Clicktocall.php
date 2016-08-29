<?php
 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
/**
 * Description of Clicktocall
 *
 * @author zinho
 */
class Clicktocall {
    function llamar_queue($fono,$anexo)
{
	    $fono.' '.$anexo;
 	 $ipserver='192.168.3.110'; 
	$timeout=50;
	$socket=fsockopen($ipserver,'5038',$errno,$errstr,$timeout);

	if(!$socket){
		$error="No es posible conectarse al servidor: <br>$errstr($errno)";
		echo $error;
	}
	else
	{
		fwrite($socket,"Action: login\r\n");
		fwrite($socket,"UserName: Inside\r\n");
		fwrite($socket,"Secret: inside.2015\r\n\r\n");

		fwrite($socket,"Action: Logoff\r\n\r\n");

		$wrets="";
		while(!feof($socket))
		{
			$wrets.=fread($socket,8192);
		}

		fclose($socket);

		$msg='Conexion exitosa<br><br>'.$wrets;

		 $msg;
	}



	$timeout=10;
	$socket=fsockopen($ipserver,'5038',$errno,$errstr,$timeout);

	if(!$socket){
		$error="No es posible conectarse al servidor: 1  <br>$errstr($errno)";
		echo $error;
	}else{ 
		fwrite($socket,"Action: login\r\n");
		fwrite($socket,"UserName: Inside\r\n");
		fwrite($socket,"Secret: inside.2015\r\n\r\n");

		fwrite($socket,"Action: originate\r\n");
	  	fwrite($socket,"Channel: local/$anexo@from-internal\r\n");
		fwrite($socket,"Exten: ".$fono."\r\n");
		fwrite($socket,"Context: from-internal\r\n");
		fwrite($socket,"Priority: 1\r\n");
		fwrite($socket,"Timeout: 10000\r\n");
		fwrite($socket,"Callerid: ".$anexo."\r\n\r\n");
		

		fwrite($socket,"Action: Logoff\r\n\r\n");

		$wrets="";
		while(!feof($socket)){
			$wrets.=fread($socket,8192);
		}
		
		
		
		fclose($socket);

	 	  $msg='<h1>LLAMANDO A '.$anexo.' '.$fono.   '</h1><br><br>';

 		 $msg;
		 $lines = explode("/r/n",$wrets);
		 
		 $lines[0];
		foreach($lines as $value){
	 	  	 $value.'<br>';
			}
	}
        echo "Lo estamos Contactando";
}
}