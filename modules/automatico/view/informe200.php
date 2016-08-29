<?php
require_once '/var/www/html/cobranzas/modules/ppal/Config.php';  
date_default_timezone_set ('America/Santiago' );
$fecha=date('Y-m-d');
        if(!is_dir(__ROOT__.MODULO_ACCESORIOS. "/archivos")) {
            mkdir(__ROOT__.MODULO_ACCESORIOS."/archivos", 0777);
            echo "<br>creado archivos<br>";
        }
        if(!is_dir(__ROOT__.MODULO_ACCESORIOS. "/archivos/informes")) {
            mkdir(__ROOT__.MODULO_ACCESORIOS."/archivos/informes", 0777);
            echo "<br>creado informes<br>";
        }
        if(!is_dir(__ROOT__.MODULO_ACCESORIOS. "/archivos/informes/200")) {
            mkdir(__ROOT__.MODULO_ACCESORIOS."/archivos/informes/200", 0777);
            echo "<br>creado 200<br>";
        }
        
        unlink(__ROOT__.MODULO_ACCESORIOS. "archivos/informes/200/b200_sa017_".date("ymd").".txt");
        $fp=fopen(__ROOT__.MODULO_ACCESORIOS. "archivos/informes/200/b200_sa017_".date("ymd").".txt","x") ;
        if(!is_file(__ROOT__.MODULO_ACCESORIOS."archivos/informes/200/b200_sa017_".date("ymd").".txt")){
            echo "archivo no existe";
        }
        
            echo "  cargarndo registro llamadas  ";
        Predictivo::traer_datos_llamadas_informe('', "call_center",  str_replace('/', '-', $fecha));
        echo "trayendo carpetas";
        Predictivo::traer_carpeta('call_center','idcliente','id_carpeta');
        echo "  trayendo cliente  ";
        Predictivo::traer_carpeta('call_center','campana','id_cartera');
        
       /////////////////////
     //// base altoriesgo
     /////////////////////
        
     Informes::LlenarArchivo('data_altoriesgo_abcdin','data_altoriesgo_abcdin_datos',str_replace('/', '-', $fecha),$fp,'038');
        /////////////////////
     //// base especial
     /////////////////////      
     Informes::LlenarArchivo('data_especial_abcdin','data_especial_abcdin_datos',str_replace('/', '-', $fecha),$fp,'138');
      /////////////////////
     //// base nresto
     /////////////////////
       Informes::LlenarArchivo('data_nresto_abcdin','data_nresto_abcdin_datos',str_replace('/', '-', $fecha),$fp,'091');  
            /////////////////////
     //// Recorrido Predictivo
     /////////////////////
                 '<br>extrayendo gesition predictivo';
           $sql="select '2006' as campo1
,case when length(ar.dmacct)<11 then concat(ar.dmacct,' ') else ar.dmacct end as cuenta, case when hour(fecha_gestion)<10 then date_format(fecha_gestion,'%m%d%Y 0%k:%i:%s') else date_format(fecha_gestion,'%m%d%Y %k:%i:%s') end as fecha_hora,'SM' as cod_accion,'001' as campo2,fono,id_llamada,case when failure_cause=17 or failure_cause=18 or failure_cause=20 or failure_cause='19' or failure_cause='21' or failure_cause='58' or status='ShortCall' then 'Z1' when failure_cause=16 then 'Z0' when failure_cause=28 or failure_cause=1 or failure_cause=22 or failure_cause=127 then 'Z4' when (status='Failure' or status='NoAnswer') and failure_cause='' then 'Z4' end as rrs,case when failure_cause=16 or failure_cause=20 then '.No Contesta' when failure_cause=17 or failure_cause='19' or failure_cause='21' or failure_cause='58' then '.Telefono Ocupado' when failure_cause=28 or failure_cause=1 or failure_cause=22 or failure_cause=127 then '.Telefono No Existe' when status='Failure' and failure_cause='' then '.Telefono sin Servicio' when status='ShortCall' and failure_cause='' then 'Telefono No Existe' when status='NoAnswer' and failure_cause='' then 'Telefono No Existe' end as comen 
,fono as fono_contacto
,rp.id_cartera as cmp
from callcenter.recorrido_predictivo rp
inner join callcenter.campanas camp on camp.idcampanas=rp.id_cartera
inner join data_altoriesgo_abcdin.data_altoriesgo_abcdin_datos ar on ar.id_cartera=rp.id_carpeta";   
        
        $res=  mysql_query($sql,  Config::conectar_db('callcenter')) or die(mysql_error());
        while($consu=mysql_fetch_array($res)){
		switch ($consu['cmp']){
                case 1: $cmp='036';
                    break;
                case 2: $cmp='091';
                    break;
                case 3: $cmp='138';
                    break;
            }
            
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
                        .$consu['fecha_hora']
                        .$consu['campo2']
                        .$consu['cod_accion'] 
                        .$consu['rrs'] 
                        . Config::espacios($cmp,10)  
                       .Config::espacios_izq(str_replace(chr(10), '',str_replace(chr(13), '',$consu['comen'])),56)
                            .Config::ceros_izq($fono,13)
                            .Config::ceros_izq($area,5)
                            .Config::ceros_izq(0,8)
                        .chr(10);
            fwrite($fp,$contenido);
        }
            fclose($fp) ; 
 ?>
