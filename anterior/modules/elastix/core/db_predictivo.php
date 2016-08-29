<?php
class Predictivo {
    function conectar_db_predictivo($db){
        $host="192.168.3.110";    
        $user='zinho'; 
        $pass='zinho1982';
	$conn=  mysql_connect($host,$user,$pass) ;
	if (! $conn){
         	echo "<h2 align='center'>ERROR: 2 Imposible establecer conecci&oacute;n con el servidor  PREDICTIVO <br>".  mysql_error()."</h2>";
		exit;
	} 
  
//Seleccionamos la base
mysql_select_db($db,$conn) or die(mysql_error());
mysql_query("SET NAMES 'utf8'"); 
return $conn;
		}
    function traer_campanas($db){
        $sql="select * from ".$db.".campaign order by estatus asc";
        $res=  mysql_query($sql,$this->conectar_db_predictivo($db)) or die(mysql_error());
        while($campa=mysql_fetch_array($res)){
            switch ($campa['estatus']){
                case 'I': $campa['estatus']='Inactivo';
                          break;
                case 'A': $campa['estatus']='Activo';
                          break;
                case 'T': $campa['estatus']='Terminada';
                          break;
            }
            echo '<tr><td>'.$campa['id'].'</td>'
                    . '<td>'.$campa['name'].'</td>'
                    .'<td>'.$campa['datetime_init'].'</td>'
                    .'<td>'.$campa['datetime_end'].'</td>'
                    .'<td>'.$campa['retries'].'</td>'
                    .'<td>'.$campa['queue'].'</td>'
                    .'<td>'.$campa['num_completadas'].'</td>'
                    .'<td>'.$campa['estatus'].'</td>'
                    .'<td>'
                    . '<a href="'.BASE_URL.MODULO_ELASTIX.'view/detalle_campana.php?cpn='.$campa['id'].'"><img title="Detalle Campaña" alt="detalle" src="'.BASE_URL.MODULO_ELASTIX.'img/detalle.png" width="20"></a> ' 
                    . '<a href="'.BASE_URL.MODULO_ELASTIX.'view/gestion_campana.php?cpn='.$campa['id'].'"><img title="Numeros de Telefono" alt="Numeros de telefono" src="'.BASE_URL.MODULO_ELASTIX.'img/numerosfonos.jpg" width="30"></a> '
                    . 'modificar  </td>'
                    .'</tr>';
        }
        
    }
    function nombre_campana($db,$id_campana){
         $sql="select name from ".$db.".campaign where id='".$id_campana."'";
        $res=  mysql_query($sql,$this->conectar_db_predictivo($db));
        $nc=mysql_fetch_row($res);
        return strtoupper($nc[0]);
    }
    function contar_fono($db,$estado,$campana,$campo,$estado_final,$campo_completar){
        $conn=new db();
         $existe="select a.tipo_telefono,a.campana,a.conectadas from tbl_recorrido_predictivo a where a.tipo_telefono='".$campo."' and a.campana='".$campana."'  ";
        $res=  mysql_query($existe,$conn->conectar_db('callcenter'));
        if(mysql_num_rows($res)==0){
       
            $sql="insert into ".$db.".tbl_recorrido_predictivo (tipo_telefono,campana,conectadas) "
                   . "select  cal.campo,cal.id_campaign, count(*) as conectadas from ".$db.".recorrido_predictivo cal where  cal.id_campaign='".$campana."' ".$estado."";
        $res=  mysql_query($sql,$conn->conectar_db($db)) or die(mysql_error());
        }else{
          $sql="   update ".$db.".tbl_recorrido_predictivo set ".$campo_completar."=(select  count(*) as llamadas from ".$db.".recorrido_predictivo cal 
                    
                    where  cal.id_campaign='".$campana."' ".$estado.")" ;
        $res=  mysql_query($sql,$conn->conectar_db($db)) or die(mysql_error());
        }
    }
    function traer_datos_llamadas($campana,$db){
        $conn=new db();
         $sql="truncate callcenter.recorrido_predictivo";
        mysql_query($sql,$conn->conectar_db('callcenter')) or die(mysql_error());
        $sql="select * from ".$db.".calls where id_campaign='".$campana."'" ;
        $res=  mysql_query($sql,$this->conectar_db_predictivo($db)) or die(mysql_error());
       while($recorrido=  mysql_fetch_array($res)){
           $ssql="insert into callcenter.recorrido_predictivo (id_llamada,intentos,fono,status,failure_cause,failure_cause_txt,id_campaign) values ('".$recorrido['id']."','".$recorrido['retries']."','".$recorrido['phone']."','".$recorrido['status']."','".$recorrido['failure_cause']."','".$recorrido['failure_cause_txt']."','".$recorrido['id_campaign']."')";
          mysql_query($ssql,$conn->conectar_db('callcenter')) or die(mysql_error());
        }
    } 
    function traer_datos_llamadas_informe($campana,$db){
        $conn=new db();
         $sql="truncate callcenter.recorrido_predictivo";
        mysql_query($sql,$conn->conectar_db('callcenter')) or die(mysql_error());
        $sql="select * from ".$db.".calls where status like 'Failure' or status like 'NoAnswer'";
        $res=  mysql_query($sql,$this->conectar_db_predictivo($db)) or die(mysql_error());
       while($recorrido=  mysql_fetch_array($res)){
           $ssql="insert into callcenter.recorrido_predictivo (id_llamada,intentos,fono,status,failure_cause,failure_cause_txt,id_campaign) values ('".$recorrido['id']."','".$recorrido['retries']."','".$recorrido['phone']."','".$recorrido['status']."','".$recorrido['failure_cause']."','".$recorrido['failure_cause_txt']."','".$recorrido['id_campaign']."')";
          mysql_query($ssql,$conn->conectar_db('callcenter')) or die(mysql_error());
        }
    } 
    function traer_carpeta($db,$campo_buscar,$campo_actualizar){
        $conn=new db();
          $sql="select * from ".$db.".call_attribute  where columna='".$campo_buscar."'";
        $res=  mysql_query($sql,$this->conectar_db_predictivo($db)) or die(mysql_error());
       while($recorrido=  mysql_fetch_array($res)){
             $ssql="update callcenter.recorrido_predictivo set  ".$campo_actualizar."='".$recorrido['value']."' where id_llamada='".$recorrido['id_call']."' " ;
          mysql_query($ssql,$conn->conectar_db('callcenter')) or die(mysql_error());
        }
    }
    function tipo_telefono($tipo_fono,$nombre_campo,$fecha){
        $conn=new db();
         $sql="update callcenter.recorrido_predictivo a 
            inner join workflow_limpio_cobranzas.cartera perso on substring(a.fono,-8)=".$tipo_fono." and a.id_cartera=perso.id_cartera
            set a.campo='".$nombre_campo."' 
            where a.campo is null";
        mysql_query($sql,$conn->conectar_db('callcenter')) or die(mysql_error());
        $sql="update callcenter.recorrido_predictivo a 
            inner join workflow_limpio_cobranzas.cartera perso on substring(a.fono,-7)=".$tipo_fono." and a.id_cartera=perso.id_cartera
            set a.campo='".$nombre_campo."'
            where a.campo is null";
        mysql_query($sql,$conn->conectar_db('callcenter')) or die(mysql_error());
        $sql="update callcenter.recorrido_predictivo a 
                inner join workflow_limpio_cobranzas.cartera perso on  a.fono=".$tipo_fono." and a.id_cartera=perso.id_cartera
                set a.campo='".$nombre_campo."'
                where a.campo is null";
        mysql_query($sql,$conn->conectar_db('callcenter')) or die(mysql_error());
        
        
           $sql="update callcenter.recorrido_predictivo rep 
                inner join workflow_limpio_cobranzas.resultado_operacion rp on rep.id_carpeta=rp.id_carpeta 
                 set rep.id_rrr=rp.id_resp_rapida_resultado,rep.id_rra=rp.id_resp_rapida_accion,rep.id_rrs=rp.id_resp_rapida_subrespuesta
                 ,rep.fecha_gestion=rp.fecha_hora";
        mysql_query($sql,$conn->conectar_db('callcenter')) or die(mysql_error());
        $sql="update  callcenter.recorrido_predictivo rp
                inner join workflow_limpio_cobranzas.resp_rapida_accion rra  on rp.id_rra=rra.id_resp_rapida_accion
                inner join workflow_limpio_cobranzas.resp_rapida_resultado rrr on rrr.id_resp_rapida_resultado=rp.id_rrr
                inner join workflow_limpio_cobranzas.resp_rapida_subrespuesta rrs on rrs.id_resp_rapida_subrespuesta=rp.id_rrs
                set rp.id_rra=rra.cod_accion,rp.id_rrr=rrr.cod_resultado,rp.id_rrs=rrs.tipo_gestion";
         mysql_query($sql,$conn->conectar_db('callcenter')) or die(mysql_error());
    }
    function resultado_cuenta(){
        $conn=new db();
        $sql="select * from callcenter.tbl_recorrido_predictivo";
        $res=mysql_query($sql,$conn->conectar_db('callcenter')) or die(mysql_error());
        while($resultado=  mysql_fetch_array($res)){
            echo "<tr>"
                    ."<td align='center'>".$resultado['tipo_telefono']."</td>"
                    ."<td align='center'>".$resultado['cargadas']."</td>"
                    ."<td align='center'>".$resultado['por_realizar']."</td>"
                    ."<td align='center'>".$resultado['conectadas']."</td>"
                    ."<td align='center'>".$resultado['fallidas']."</td>"
                    ."<td align='center'>".$resultado['nocontestadas']."</td>"
                    ."<td align='center'>".$resultado['contestadas']."</td>"
                    ."<td align='center'>".$resultado['abandonadas']."</td>"
                    ."<td align='center'>".$resultado['shortcall']."</td>"
                    ."<td align='center'>".$resultado['numerror']."</td>"
                    ."<td align='center'>".$resultado['rechazada']."</td>"
                    ."<td align='center'>".$resultado['ausente']."</td>"
                    ."<td align='center'>".$resultado['ocupado']."</td>"
                    ."<td align='center'>".$resultado['fin']."</td>"
                    ."<td align='center'>".$resultado['positiva']."</td>"
                    ."<td align='center'>".$resultado['negativa']."</td>"
                    //.'<td align='center'><img src="'. BASE_URL.MODULO_ELASTIX.'img/barrer.jpg" id="barrer_predictivo" alt="Barrer numero" title="Barrer Numero" width="20" > 
                    //<img src="'.BASE_URL.MODULO_ELASTIX.'img/enviar.jpg" id="enviar_predictivo" alt="Enviar a Predictivo" title="Enviar a Predictivo" width="30"></td> '
                ."</tr>";
                
            
        }
    }
    function limpiar_tabla($bd,$tabla){
         $conn=new db();
         mysql_query("truncate ".$bd.".".$tabla,$conn->conectar_db($bd)) or die(mysql_error());
    }
    function traer_fonos($db,$tabla,$campo,$alias_campo,$id_campana,$fecha){
         $conn=new db;
     echo   $sql= "select count(".$campo." ) as cuenta  
 ,case 
 	when length(".$campo." )=9 then 
	 count(".$campo." ) 
	else 0 
	end as validos 
,case 
	when length(".$campo." )!=9 then 
		count(".$campo." ) 
	else 0 
	end as no_validos
, g4.descripcion
,g4.id_grupo4 
from ".$db.".".$tabla." per 
inner join carpeta car on car.id_cartera=per.id_cartera and date(car.fecha_ingreso) like '".$fecha."%' and car.id_grupo4=".$id_campana." and car.activar='on'
inner join grupo4 g4 on g4.id_grupo4=car.id_grupo4 
 group by car.id_grupo4 ";
         $res=mysql_query($sql,$conn->conectar_db($db)) or die(mysql_error());
         while($fonos=  mysql_fetch_array($res)){
             echo "<tr><td>".$alias_campo."</td>"
                     ."<td>".$fonos['cuenta']."</td>"
                     ."<td>".$fonos['validos']."</td>"
                     ."<td>".$fonos['no_validos']."</td>"
                     ."<td>".$this->contar_gestion('campo', $alias_campo)."</td>"
                     ."<td>".$this->contar_gestion('id_rrs', $alias_campo," and id_rrs='negativa'")."</td>"
                     ."<td>".$this->contar_gestion('id_rrs', $alias_campo," and id_rrs='positiva'")."</td>"
                     .'<td align="center"><img src="'.BASE_URL.MODULO_ELASTIX.'img/eyr.png" id="enviaryreparar" alt="Reparar y Enviar a Predictivo" title="Reparar y Enviar a Predictivo" width="20" >' 
                     . "</tr>";
         }
    }
    function traer_campanas_cobraza(){
        $conn =new db();
         $sql="select * from workflow_limpio_cobranzas.grupo4";
        $res= mysql_query($sql,$conn->conectar_db('workflow_limpio_cobranzas')) or die(mysql_error());
        while($campa=  mysql_fetch_array($res)){
            echo "<option value='".$campa['id_grupo4']."'>".$campa['descripcion']."</option>";
        }
    }
    function traer_numero_carga($id_campana){
        $conn=new db();
         $sql="select a.dmlstact as ncarga from workflow_limpio_cobranzas.cartera a
inner join workflow_limpio_cobranzas.carpeta b on b.id_cartera=a.id_cartera and b.id_grupo4=".$id_campana."
 group by a.dmlstact order by a.dmlstact desc ";
        $res=  mysql_query($sql,$conn->conectar_db("workflow_limpio_cobranzas")) or die(mysql_error());
        while($nc=  mysql_fetch_array($res)){
        echo   '<option>'.$nc['ncarga'].'</option>';
            
        }
       // return $respuesta;
    } 
    function contar_gestion($campo_contar,$campo_comparar,$comparacion2){
        $conn=new db();
         $sq="select count(*) as valor,a.".$campo_contar." from callcenter.recorrido_predictivo a
                where a.campo='".$campo_comparar."' ".$comparacion2."
                group by a.".$campo_contar;
        $res=  mysql_query($sq,$conn->conectar_db("callcenter"));
        return  mysql_result($res, 0);
        
    }
    function cambiar_campo($campo,$db,$tabla,$tipo_campo,$largo_campo){
          $conn=new db();
          echo $sql="alter table ".$db.".".$tabla."  modify ".$campo." ".$tipo_campo."(".$largo_campo.")";
    }
} 
?> 