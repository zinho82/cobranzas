 <?php 
iF(!session_start()){ 
session_start();}
define("__ROOT__", "/var/www/html/sistema_inside/"); 
define("BASE_URL", "http://192.168.235.129/sistema_inside/");  
define("LOGO_EMPRESA", "logo_inside.jpg");
define("BASE_BBDD", "callcenter"); 
define("MODULO_ppal","modules/ppal/"); 
define("MODULO_PANEL","modules/panel/");
define("MODULO_BUSCAR","modules/buscar/");    
define("MODULO_LOGIN","modules/login/");
define("MODULO_ACCESORIOS","accesorios/"); 
define("MODULO_MENU","modules/menu/");
define("MODULO_ELASTIX","modules/elastix/");
define("MODULO_CAMPANA","modules/campanas/");
define("MODULO_AUDITORIA","modules/auditoria/");  
define("MODULO_COBRANZA","modules/cobranzas");
define("MODULO_INFORMES","modules/informes");   
define("MODULO_ppal_req","modules/ppal"); 
define("MODULO_AUTOMATICO","modules/automatico"); 
define("MODULO_LOGIN_req","modules/login");
define("MODULO_ACCESORIOS_req","accesorios"); 
define("MODULO_MENU_req","modules/menu");
define("MODULO_INFORMES_req","modules/informes");
define("MODULO_ELASTIX_req","modules/elastix");
define("MODULO_CAMPANA_req","modules/campanas");
define("MODULO_COBRANZA_req","modules/Cobranzas");  
define("MODULO_ARCHIVOS_req","modules/Archivos");  
define("MODULO_ARCHIVOS","modules/Archivos");  
define("INFORMES_req","informes"); 
    require_once __ROOT__.MODULO_CAMPANA ."/core/Campanas.php";
    require_once __ROOT__.MODULO_COBRANZA ."/core/Cobranzas.php" ;
    require_once __ROOT__.MODULO_ARCHIVOS_req ."/core/Archivos.php" ;
    require_once __ROOT__.MODULO_ELASTIX ."/core/Predictivo.php" ; 
    require_once __ROOT__.MODULO_BUSCAR ."/core/Buscar.php" ; 
    require_once __ROOT__.MODULO_PANEL ."/core/Panel.php" ;  
require_once __ROOT__.MODULO_INFORMES ."/core/Informes.php" ;    
//require_once __ROOT__.MODULO_ACCESORIOS."libs/ECCP.class.php"; 
    //require_once __ROOT__.MODULO_AUDITORIA ."/core/Auditoria.php" ;   
class Config {
    function conectar_db($db){
        $conn=mysql_connect("localhost","root","zinho1982") or die(mysql_error().' '.  mysql_errno());
	if (! $conn){
         	echo "<h2 align='center'>ERROR: 1 Imposible establecer conecci&oacute;n con el servidor de BD</h2>";
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
    function espacios($campo,$largo)
	{
		$lcampo=strlen($campo);
		$tcampo=$largo-$lcampo;
		$lcampo;
		for($i=0;$i<$tcampo;$i++)
		{
			$campo=' '.$campo;
		}
		return $campo;
		 
	}
    function espacios_izq($campo,$largo)
	{
		$lcampo=strlen($campo);
		$tcampo=$largo-$lcampo;
		$lcampo;
		for($i=0;$i<$tcampo;$i++)
		{
			$campo=$campo.' ';
		}
		return $campo;
		 
	}
   function ceros($campo,$largo)
	{
		$lcampo=strlen($campo);
		$tcampo=$largo-$lcampo;
		$lcampo;
		for($i=0;$i<$tcampo;$i++)
		{
			$campo='0'.$campo;
		}
		return $campo;
		 
	}
     function ceros_izq($campo,$largo)
	{
		$lcampo=strlen($campo);
		$tcampo=$largo-$lcampo;
		$lcampo;
		for($i=0;$i<$tcampo;$i++)
		{
			$campo='0'.$campo;
		}
		return $campo;
		 
	}
        
}
 
