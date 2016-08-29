<?php require_once './core/Clicktocall.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Click to Call - WOM</title>
<style type="text/css">
<!--
.letra {
  font-family: Century Gothic,Calibri;
  size: 18px;
  color: #FFFFFF;
     background-color: #558ED5; 

}
.botones {
  font-family: Calibri, Century Gothic;
  size: 18px;
  background-color: #558ED5;


}
#redo{

 border-radius: 10px;
    -moz-border-radius:10px;
     -webkit-border-radius:10px;
  border-color: #000000;
  border-width: 2px;
  border-style: solid;
  background-color: #371851;
  border-radius: 20px;
  height: 370px;

}



#datos input{
	font-size: 12px;
	color: #ffffff;
	left:200px;
	background-color: #111111;
	font-family: "Lucida Console",Arial, Helvetica, sans-serif;
	border-radius: 5px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
	border-color: #aaa;
}
#datos select{
	font-size: 12px;
	margin-left:100px;
	color:#ffffff;
	background-color: #111111;
	border-radius: 5px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
	border-color: #aaa;
}


#datos{
	position:relative;
	display:block;
	z-index:2000;
	top:340px;	
	left: 20px;
        background-color: #371851;
        max-width: 500px;
        padding: 20px;
        border-radius: 10%;
	
}
#btn_llamar{
	position:relative;
	display:block;
	z-index:2001;
	top:350px;
	left:200px;
}
#nombre input{
	position:relative;
	display:block;
	z-index:2000;
	top:330px;	
	font-size: 12px;
	color: #fff;
	margin-left:120px;
	width:160px;
	border-radius:5px;
	background-color: #111111;
	font-family: "Lucida Console",Arial, Helvetica, sans-serif;
}
#app{
	position:relative;
	display:block;
	z-index:2000;
	top:365px;	
	left:253px;
}
-->
</style>
<script>
		function valida_envia(){
    //valido el nombre
    if(document.fvalida.tipo.value==0){
	       alert("Seleccione un tipo de Telefono")
	       document.fvalida.tipo.focus()
	       return 0;
	    }
	   if(document.fvalida.tipo.value=='cel' && document.fvalida.num.value.length!=8 ){
	   alert('Ingrese los 8 digitos de su Celular' );
	   	document.fvalida.num.focus()
	   	return 0;
	   	}
	   	if(document.fvalida.tipo.value=='RM' && document.fvalida.num.value.length!=8 ){
	   alert('Ingrese los 8 digitos de su telefono de Santiago');
	   	document.fvalida.num.focus()
	   	return 0;
	   }
	   if(document.fvalida.tipo.value=='LDN' && document.fvalida.num.value.length!=9 ){
	   alert('Ingrese codigo de (area + numero) de telefono EJ: 321234567');
	   	document.fvalida.num.focus()
	   	return 1;
	   	
	   }
	   if(document.fvalida.nombre.value.length<4  ){
	   alert('Ingrese Su Nombre' );
	   	document.fvalida.nombre.focus()
	   	return 0;
	   	}
	   	 if(document.fvalida.app.value.length<4  ){
	   alert('Ingrese su Apellido' );
	   	document.fvalida.app.focus()
	   	return 0;
	   	}

    //el formulario se envia
  //  alert("Muchas gracias por enviar el formulario");
    document.fvalida.submit();
} 
</script>
</script>
</head>

    <body onload = "resizeTo(555,530)" onresize = "resizeTo(555,530)" >
          <br />
<?php

$fono=$_POST['num'];
if(isset($fono))
{
   "<h2 class='letra'>Gracias Lo estamos Contactando</h2>";
  $anexo='232232020' ;
 //  $anexo=227256986;
  $tipo=$_POST['tipo'];
  if($tipo=='rm')
    {
    	 $fono=$fono;
    }
    if($tipo=='cel')
    {
    	 $fono='09'.$fono;
    }
     if($tipo=='region')
    {
    	 $fono='0'.$fono;
    }
    

echo "<div id='num'>";
    Clicktocall::llamar_queue($fono,$anexo);
  echo "</div>";
  
 //echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
}

?>

<table id="redo" border="0" width="600"  cellpadding="0" cellspacing="0">
    <tr><td colspan="2" align="center" valign="top"><img src="images/wom.jpg"  border="0" height="50%" /></td></tr>
<form  action="" name="fvalida" id="fvalida" method="post">


<!--<div id="nombre"><input type="text" size="35" name="nombre" /></div>-->
<!--<div id="app"><input type="text" name="app" size="35" /></div>-->
<div id="datos">
           <select name="tipo">
     	<option value="0" selected="selected">Tipo de Telefono</option>
                <option value="cel">Movil</option>
                <option value="rm">RM</option>
                <option value="region">Regiones</option>
           </select><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="text" name="num"  id="num" maxlength="9" placeholder="Numero de Telefono" />
       </div>
<div id="btn_llamar"      >
           <input type="image" onclick="valida_envia()" src="images/llamada.png" size="32" Title="Llamar" /> 
 </div>
</form>
</table>



</body>
</html>
