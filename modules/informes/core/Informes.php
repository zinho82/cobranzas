<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Informes
 *
 * @author zinho
 */
class Informes {
    public function LlenarArchivo($bd,$tabla,$fecha,$fp,$campana) {
        echo      $sql="select 
'2006' as campo1,case 
	when length(origen.dmacct)<8 then concat(origen.dmacct,' ')
else
origen.dmacct
end 
as cuenta
,case when hour(datos.fecha_gestion)<10 then date_format(datos.fecha_gestion,'%m%d%Y 0%k:%i:%s') 
else date_format(datos.fecha_gestion,'%m%d%Y %k:%i:%s') end as fechayhora
,'001' as campo2
,rra.cod_accion
,rrs.cod_resultado
,substring(datos.comentario,1,56) as observacion
,fono_contacto
,substring(trim(operador),7,8) as operador
from $bd.historico_gestion datos 
inner join $bd.$tabla origen on origen.id_cartera=datos.cartera_id_cartera
inner join callcenter.resp_rapida_accion rra on rra.id_resp_rapida_accion=datos.resp_rapida_resultado_id_resp_rapida_resultado
inner join callcenter.resp_rapida_resultado rrs on rrs.id_resp_rapida_resultado=datos.resp_rapida_accion_id_resp_rapida_accion where date(datos.fecha_gestion) like '$fecha%'";
        $res=mysql_query($sql, Config::conectar_db('callcenter')) or die(mysql_error());
                while($consu=mysql_fetch_array($res)){
                       if((substr(trim($consu['fono_contacto']),0, 1)!=9) and (substr($consu['fono_contacto'],0, 1)!=2)){
                        $fono=  substr($consu['fono_contacto'], -7);
                        $area= substr($consu['fono_contacto'], 1,2);
                    }
                    else {
                        $fono=  substr($consu['fono_contacto'], -8);
                        $area= substr($consu['fono_contacto'],1, 1);
                    }
                      $contenido=$consu['campo1']
                            .Config::espacios_izq(trim($consu['cuenta']),25)
                            .$consu['fechayhora']
                            .$consu['campo2']
                            .trim($consu['cod_accion'])
                            .$consu['cod_resultado']
                            .Config::espacios($campana,10)
                            .Config::espacios_izq(str_replace(chr(10), '',str_replace(chr(13), '',$consu['observacion'])),56)
                            .Config::ceros_izq($fono,13)
                            .Config::ceros_izq($area,5)
                            .$consu['operador']
                            .chr(10);
                    fwrite($fp,$contenido); 
                }   
    }
}
