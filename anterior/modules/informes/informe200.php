<?php
require_once '../ppal/config.php';
require_once __ROOT__.MODULO_LOGIN.'/core/db.php';
require_once (__ROOT__.MODULO_ELASTIX.'core/db_predictivo.php') ;
$datos=new Predictivo();
$datos->traer_datos_llamadas_informe('', "call_center");
$datos->traer_carpeta('call_center','id_carpeta','id_carpeta');
$datos->traer_carpeta('call_center','id_cartera','id_cartera');
$datos->traer_carpeta('call_center','cuenta','cuenta');
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
        $conn=new db();
       
        unlink(__ROOT__.INFORMES. "200/b200_sa017_".date("ymd").".txt");
        $fp=fopen(__ROOT__.INFORMES. "200/b200_sa017_".date("ymd").".txt","x") ;
         $sql="select '2006' as campo1,carte.dmacct,replace(ro.fecha_hora,'-','') as fechayhora,'001' as campo2,rra.cod_accion,rrs.cod_resultado,substring(ro.observacion,1,56) as observacion from cartera carte inner join carpeta carp on carp.id_cartera=carte.id_cartera inner join resultado_operacion ro on ro.id_carpeta=carp.id_carpeta inner join resp_rapida_accion rra on rra.id_resp_rapida_accion=ro.id_resp_rapida_accion inner join resp_rapida_resultado rrs on rrs.id_resp_rapida_resultado=ro.id_resp_rapida_resultado where date(ro.fecha_hora) like '".date('Y-m-d')."%'";
        $res=  mysql_query($sql,$conn->conectar_db_ppal('192.168.3.230','workflow_limpio_cobranzas')) or die(mysql_error());
                while($consu=mysql_fetch_array($res)){
                     $contenido=$consu['campo1'].espacios($consu['dmacct'],25)
                            .$consu['fechayhora']
                            .$consu['campo2']
                            .trim($consu['cod_accion'])
                            .$consu['cod_resultado']
                            .espacios('063',10)
                            .str_replace(chr(10), '',str_replace(chr(13), '',$consu['observacion']))
                            .chr(13).chr(10);
                    fwrite($fp,$contenido);
                }
         $sql="select '2006' as campo1,case when length(cuenta)=10 then concat(cuenta,' ') else cuenta end  as cuenta,'SM' as cod_accion,'001' as campo2,fono,id_llamada,case when failure_cause=17 or failure_cause='19' or failure_cause='21' then 'Z1' when failure_cause=16 then 'Z0' when failure_cause=28 or failure_cause=1 or failure_cause=22  or failure_cause=127 then 'Z4' end as rrs,case when failure_cause=16 then '.No Contesta' when failure_cause=17 or failure_cause='19' or failure_cause='21' then '.Telefono Ocupado' when failure_cause=28 or failure_cause=1 or failure_cause=22  or failure_cause=127 then '.Telefono No Existe' end as comen from callcenter.recorrido_predictivo where (fono!=0 and fono!=2147483647) ";
        
        $res=  mysql_query($sql,$conn->conectar_db('callcenter')) or die(mysql_error());
        while($consu=mysql_fetch_array($res)){
              $contenido=$consu['campo1'].$consu['cuenta']
                        .espacios(date('Ymd G:i:s'),31)
                        .$consu['campo2']
                        .$consu['cod_accion']
                        .$consu['rrs'] 
                        .espacios('063',10)  
                        .$consu['fono'].$consu['comen']
                        .chr(13).chr(10);
            fwrite($fp,$contenido);
        }
            fclose($fp) ;
 ?>
<html>
    <head>
        <?php 
        require_once (__ROOT__.'/'.MODULO_LOGIN.'css.php');
        require_once (__ROOT__.'/'.MODULO_ELASTIX.'css.php');
        ?>
    </head>
    <body>
        <header> 
            
        </header>     
        <div id="menu">
            <ul class="nav">
                <li><a href="#">Elastix</a>
                    <ul>
                        <li><a href="<?php echo BASE_URL.MODULO_ELASTIX.'view/campana.php' ?>">Campa&ntilde;as</a></li>
                    </ul>
                    <li><a href="#">Informes</a>
                    <ul>
                        <li><a href="<?php echo BASE_URL.MODULO_INFORMES.'informe200.php' ?>">Informe Gestion</a></li>
                    </ul>
                </li>
                </li>
            </ul>
        </div>
       <div id="contenedor">
           <br><br>
           <a href="<?php echo BASE_URL.INFORMES."200/b200_sa017_".  date("ymd").".txt" ?>">Descargar Informe Gestion</a>
           
       </div>
    </body>
</html>
        
