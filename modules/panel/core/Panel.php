<?php
            
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 

/**
 * Description of Panel
 *
 * @author zinho
 */
class Panel {
    public function ListaCampanas($opc) {
         $sql="select * from callcenter.campanas ca inner join callcenter.campanaespecial es on ca.idcampanas=es.`campaña` and es.estado=1 order by es.idpredictivo desc";
        $res=  mysql_query($sql,  Config::conectar_db('callcenter')) or die(mysql_error());
        $ssql="select * from callcenter.campanas ";
        $res2=  mysql_query($ssql,  Config::conectar_db('callcenter')) or die(mysql_error());
        
        switch ($opc) {
            case 1:
                    while($campa=  mysql_fetch_array($res2)){
                        echo '<br>'.$campa['campana'].": ".Panel::Contactados($campa['base_datos'], $campa['tabla_datos'], 'dmlastac','Positiva',$campa['campana']);
                    }
                break;
                case 2:
                    while($campa=  mysql_fetch_array($res2)){
                        echo  '<br>'.$campa['campana'].": " . Panel::Ventas($campa['base_datos'], $campa['tabla_datos'], 'dmlastac',3,$campa['campana']);
                    }
                break;
                case 3:
                    echo "<tr><td>Campaña</td><td>Pendientes</td><td>Llamadas Cortas</td><td>Bloqueados</td><td>Fallidas</td><td>Conectadas</td><td>Estado</td><td>Acciones</td></tr>";
                    while($campa=  mysql_fetch_array($res)){
                        echo  '<tr><td>'.$campa['nombre_campana']."</td>"
                                . "<td>" .Panel::Contar($campa['idpredictivo'],"and retries=0 ")."</td>"
                                . "<td>".Panel::Contar($campa['idpredictivo'],"and status='shortcall'")."</td>"
                                . "<td>".Panel::Contar($campa['idpredictivo'],"and retries=99")."</td>"
                                . "<td>".Panel::Contar($campa['idpredictivo'],"and status='Failure'")."</td>"
                                . "<td>".Panel::Contar($campa['idpredictivo'],"and status='Success'")."</td>" 
                                . "<td>".Panel::Estado_campana($campa['idpredictivo'],"estatus")."</td>"
                                . '<td> <div class="btn-group">
 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-phone" title="Enviar numeros"></i> <span class="caret"></span>
  </button>';
  echo  '<ul class="dropdown-menu">';
  echo '    <li><a target="_blank" href="'.BASE_URL.MODULO_PANEL.'view/campana.php?cmp='.$campa['idpredictivo'].'&edo=A" ><i  class="fa fa-external-link" title="Activar Campaña"></i> Activar Campaña</a></li>';
  echo '   <li><a target="_blank" href="'.BASE_URL.MODULO_PANEL.'view/campana.php?cmp='.$campa['idpredictivo'].'&edo=I"><i class="fa fa-trash" title="Desactivar Campaña"></i> Desctivar Campaña</a></li>';
           echo '</ul>';
echo '</div></td>'."</tr>";
                    }
                break;
                
            default:  
                break;
        }
        
        //echo json_encode(array($campanas,$valor));
    }
        private function Contactados($bd,$taba,$campo_codigo,$codigo,$nombreCampana,$carga) {
              $sql="select count(*) from ".$bd.".".$taba." datos
                inner join data_altoriesgo_abcdin.resp_rapida_subrespuesta rrs on rrs.id_resp_rapida_subrespuesta=datos.dmlastrc and rrs.tipo_gestion='".$codigo."' and datos.estado=1";
             $res=mysql_query($sql,  Config::conectar_db($bd));
             return mysql_result($res, 0);
        
            
        }
        private function Ventas($bd,$taba,$campo_codigo,$codigo,$nombreCampana) {
               $sql="select count(*) from ".$bd.".historico_gestion datos inner join $bd.".$bd."_datos da on da.id_cartera=datos.cartera_id_cartera and da.estado=1 where datos.resp_rapida_accion_id_resp_rapida_accion='".$codigo."' ";
             $res=mysql_query($sql,  Config::conectar_db($bd));
             return mysql_result($res, 0);
        
            
        }
        private function Contar($campana,$consulta) {  
             $sql="select count(*) from call_center.calls where id_campaign=$campana ".$consulta;
            $res=  mysql_query($sql, Predictivo::conectar_db_predictivo('call_center'));
            return mysql_result($res, 0);
            
        }
        private function Estado_campana($idCampana,$campo) {
             $sql="select $campo from call_center.campaign where id=$idCampana";
            $res=  mysql_query($sql,Predictivo::conectar_db_predictivo('call_center'));
            switch (mysql_result($res, 0)){
                case 'A': $estado="Activa";
                        break;
                case 'I': $estado="Inactiva";
                        break;
                case 'T': $estado="Terminada";
                        break;
            }
            return $estado;
            
        }
            
        }
    
