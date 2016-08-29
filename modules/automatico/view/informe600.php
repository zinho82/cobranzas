<?php
require_once '/var/www/html/cobranzas/modules/ppal/Config.php';
if($_POST['fecha']){
        if(!is_dir(__ROOT__.MODULO_ACCESORIOS. "/archivos")) {
            mkdir(__ROOT__.MODULO_ACCESORIOS."/archivos", 0777);
            echo "<br>creado archivos<br>";
        }
        if(!is_dir(__ROOT__.MODULO_ACCESORIOS. "/archivos/informes")) {
            mkdir(__ROOT__.MODULO_ACCESORIOS."/archivos/informes", 0777);
            echo "<br>creado informes<br>";
        }
        if(!is_dir(__ROOT__.MODULO_ACCESORIOS. "/archivos/informes/600")) {
            mkdir(__ROOT__.MODULO_ACCESORIOS."/archivos/informes/600", 0777);
            echo "<br>creado 200<br>";
        }
        
        unlink(__ROOT__.MODULO_ACCESORIOS. "archivos/informes/600/b600_sa017_".date("ymd").".txt");
        $fp=fopen(__ROOT__.MODULO_ACCESORIOS. "archivos/informes/600/b600_sa017_".date("ymd").".txt","x") ;
        if(!is_file(__ROOT__.MODULO_ACCESORIOS."archivos/informes/600/b600_sa017_".date("ymd").".txt")){
            echo "archivo no existe";
        }
        
           $sql="select 
'600' as campo1,case
	when length(origen.dmacct)<8 then concat(origen.dmacct,' ')
else
origen.dmacct
end 
as cuenta
,'063' as empresa
,case when hour(datos.fecha_gestion)<10 then date_format(datos.fecha_gestion,'%d%m%Y') 
else date_format(datos.fecha_gestion,'%y%m%Y') end as fechayhora
,'001' as campo2
,rra.cod_accion
,rrs.cod_resultado
,substring(datos.comentario,1,56) as observacion
,fono_contacto
,date_format(origen.dmppmade,'%d%m%Y') as dmppmade
,origen.u6deuvenc
from data_nresto_abcdin.historico_gestion datos 
inner join data_nresto_abcdin.data_nresto_abcdin_datos origen on origen.id_cartera=datos.cartera_id_cartera
inner join data_nresto_abcdin.resp_rapida_accion rra on rra.id_resp_rapida_accion=datos.resp_rapida_resultado_id_resp_rapida_resultado
inner join data_nresto_abcdin.resp_rapida_resultado rrs on rrs.id_resp_rapida_resultado=datos.resp_rapida_accion_id_resp_rapida_accion where date(datos.fecha_gestion) like '".str_replace('/', '-', $_POST['fecha'])."%' and datos.resp_rapida_accion_id_resp_rapida_accion=3";
        $res=mysql_query($sql,  Config::conectar_db('callcenter')) or die(mysql_error());
                while($consu=mysql_fetch_array($res)){
                      $contenido=$consu['campo1'].  Config::espacios_izq($consu['cuenta'],26)
                            .  Config::espacios_izq($consu['empresa'],8)
                            .trim($consu['cod_accion'])
                            .$consu['cod_resultado']
                            .$consu['fechayhora']
                            .$consu['campo2']
                            .$consu['campo2'] 
                            .$consu['dmppmade']
                            .  Config::ceros($consu['u6deuvenc'].".00",15)
                            .chr(13).chr(10);
                    fwrite($fp,$contenido);
                }
                    $sql="select 
'600' as campo1,case
	when length(origen.dmacct)<8 then concat(origen.dmacct,' ')
else
origen.dmacct
end 
as cuenta
,'063' as empresa
,case when hour(datos.fecha_gestion)<10 then date_format(datos.fecha_gestion,'%d%m%Y') 
else date_format(datos.fecha_gestion,'%y%m%Y') end as fechayhora
,'001' as campo2
,rra.cod_accion
,rrs.cod_resultado
,substring(datos.comentario,1,56) as observacion
,fono_contacto
,date_format(origen.dmppmade,'%d%m%Y') as dmppmade
,origen.u6deuvenc
from data_altoriesgo_abcdin.historico_gestion datos 
inner join data_altoriesgo_abcdin.data_altoriesgo_abcdin_datos origen on origen.id_cartera=datos.cartera_id_cartera
inner join data_altoriesgo_abcdin.resp_rapida_accion rra on rra.id_resp_rapida_accion=datos.resp_rapida_resultado_id_resp_rapida_resultado
inner join data_altoriesgo_abcdin.resp_rapida_resultado rrs on rrs.id_resp_rapida_resultado=datos.resp_rapida_accion_id_resp_rapida_accion where date(datos.fecha_gestion) like '".str_replace('/', '-', $_POST['fecha'])."%' and datos.resp_rapida_accion_id_resp_rapida_accion=3";
        $res=mysql_query($sql,  Config::conectar_db('callcenter')) or die(mysql_error());
                while($consu=mysql_fetch_array($res)){
                      $contenido=$consu['campo1'].  Config::espacios_izq($consu['cuenta'],26)
                            .  Config::espacios_izq($consu['empresa'],8)
                            .trim($consu['cod_accion'])
                            .$consu['cod_resultado']
                            .$consu['fechayhora']
                            .$consu['campo2']
                            .$consu['campo2'] 
                            .$consu['dmppmade']
                            .  Config::ceros($consu['u6deuvenc'].".00",15)
                            .chr(13).chr(10);
                    fwrite($fp,$contenido);
                }
                    $sql="select 
'600' as campo1,case
	when length(origen.dmacct)<8 then concat(origen.dmacct,' ')
else
origen.dmacct
end 
as cuenta
,'063' as empresa
,case when hour(datos.fecha_gestion)<10 then date_format(datos.fecha_gestion,'%d%m%Y') 
else date_format(datos.fecha_gestion,'%y%m%Y') end as fechayhora
,'001' as campo2
,rra.cod_accion
,rrs.cod_resultado
,substring(datos.comentario,1,56) as observacion
,fono_contacto
,date_format(origen.dmppmade,'%d%m%Y') as dmppmade
,origen.u6deuvenc
from data_especial_abcdin.historico_gestion datos 
inner join data_especial_abcdin.data_especial_abcdin_datos origen on origen.id_cartera=datos.cartera_id_cartera
inner join data_especial_abcdin.resp_rapida_accion rra on rra.id_resp_rapida_accion=datos.resp_rapida_resultado_id_resp_rapida_resultado
inner join data_especial_abcdin.resp_rapida_resultado rrs on rrs.id_resp_rapida_resultado=datos.resp_rapida_accion_id_resp_rapida_accion where date(datos.fecha_gestion) like '".str_replace('/', '-', $_POST['fecha'])."%' and datos.resp_rapida_accion_id_resp_rapida_accion=3";
        $res=mysql_query($sql,  Config::conectar_db('callcenter')) or die(mysql_error());
                while($consu=mysql_fetch_array($res)){
                      $contenido=$consu['campo1'].  Config::espacios_izq($consu['cuenta'],26)
                            .  Config::espacios_izq($consu['empresa'],8)
                            .trim($consu['cod_accion'])
                            .$consu['cod_resultado']
                            .$consu['fechayhora']
                            .$consu['campo2']
                            .$consu['campo2'] 
                            .$consu['dmppmade']
                            .  Config::ceros($consu['u6deuvenc'].".00",15)
                            .chr(13).chr(10);
                    fwrite($fp,$contenido);
                }
            fclose($fp) ; 
}
 ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        Archivo Compromiso de Pago
    </div>
    <div class="panel-body">
        <form method="post">
            <div class='input-group date' id='datetimepicker2'>
                <span class="input-group-addon">
                    Fecha
                    <span class="glyphicon glyphicon-calendar"></span>
                 </span>
                <input type='text' name="fecha" class="form-control" />
            </div>
            <input type="submit" class="btn btn-block" value="Crear Informe">
        </form>
        <?php if(isset($_POST['fecha'])):?>
        <a class="btn-block btn btn-info" href="<?php echo BASE_URL.MODULO_ACCESORIOS."archivos/informes/600/b600_sa017_".  date("ymd").".txt" ?>">Descargar Informe Gestion</a>
        <?php endif;?>
    </div>
           
    
</div>
<?php require_once '../../ppal/footer.php';?>