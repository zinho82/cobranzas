<?php
class Cobranzas extends Config {
    function getCliente_historico($cliente_id,$db,$tabla,$campo_id){
       
         $sql="select * from ".$db.'.'.$tabla." where ".$campo_id."=".$cliente_id." order by fecha_gestion desc";
        $res=mysql_query($sql, Config::conectar_db($db)) or die(mysql_error());
        while($recorrido_cliente=  mysql_fetch_array($res)){
                echo "<tr><td>". $recorrido_cliente['fecha_gestion'] ."</td>"
                    ."<td>". Cobranzas::traerAgente($recorrido_cliente['operador'])."</td>"
                    ."<td>".$recorrido_cliente['comentario'] ."</td>"
                    ."<td>".$this->traer_codigo('callcenter', 'resp_rapida_subrespuesta', 'id_resp_rapida_subrespuesta', $recorrido_cliente['resp_rapida_subrespuesta_id_resp_rapida_subrespuesta'])."</td>"
                    ."<td>".$this->traer_codigo('callcenter', 'resp_rapida_accion', 'id_resp_rapida_accion', $recorrido_cliente['resp_rapida_resultado_id_resp_rapida_resultado'])."</td</tr>"
                    ."<td>".$recorrido_cliente['fono_contacto'] ."</td>";
        }
        
    }
    function getCliente($cliente_id,$db,$tabla,$campo_id){
       
         $sql="select * from ".$db.'.'.$tabla." where ".$campo_id."=".$cliente_id;
        $res=mysql_query($sql, Config::conectar_db($db)) or die(mysql_error());
        return mysql_fetch_assoc($res);
        
    }
    function traer_codigos($db,$tabla,$agrupado,$campotexto,$campo_id){
        $codigo='';
        echo "<option selected>Seleccione...</option>";
         $sql="select ".$campo_id." as id,".$campotexto." as texto from ".$db.'.'.$tabla.' '.$agrupado;
        $res=mysql_query($sql, Config::conectar_db($db)) or die(mysql_error());
        while($cod=mysql_fetch_array($res)){
            echo "<option value='".$cod['id']."'>".$cod['texto'] ."</option>";
        }
        //return $codigo;
    }
    function guarda_historico($db,$cartera_idcartera,$comentario,$fecha_gestion,$operador,$grabacion,$id_resp_rapida_subrespuesta,$id_resp_rapida_resultado,$id_resp_rapida_accion,$fonocontacto){
          $sql="insert into ".$db.".historico_gestion values (null,'".$cartera_idcartera."','".$comentario."','".$fecha_gestion."','".$operador."','".$grabacion."','".$id_resp_rapida_subrespuesta."','".$id_resp_rapida_resultado."','".$id_resp_rapida_accion."','".$fonocontacto."')";
         if(!mysql_query($sql,  Config::conectar_db("callcenter"))){
             echo 'Registro Historico no cargado '.  mysql_error();
         }
         else{
            // echo "Registro Historico  cargado";
         }
    }
    function traer_codigo($db,$tabla,$campo,$codigo_buscar){
      
         $sql="select * from ".$db.'.'.$tabla." where ".$campo."=".$codigo_buscar;
        $res=mysql_query($sql, Config::conectar_db($db)) or die(mysql_error());
        return  mysql_result($res, 0,1);
    }
    function actualiza_cliente($db,$tabla,$comentario,$fecha_compromiso,$cod_accion,$cod_respuesta,$id_cliente){
         $sql="update ".$db.".".$tabla." set observacion='".$comentario."',dmppmade='".$fecha_compromiso."',accion='".$cod_accion."',subrespuesta='".$cod_respuesta."',dmlstact='".date('Y-m-d')."' where id_cartera=".$id_cliente;
            if(!mysql_query($sql,  Config::conectar_db("callcenter"))){
             echo 'Registro  No Actualizado '.  mysql_error();
         }
         else{ 
             echo "Registro   Actualizado";
         }
    }
    Private function traerAgente($agente){
          $sql="select name from callcenter.users where usuario_predictivo='$agente' or user_id='$agente'   ";  
        $res=  mysql_query($sql,  Config::conectar_db("callcenter"));
        return mysql_result($res,0); 
    } 
    public function RegistroManual($bd,$tabla,$numcarga,$agente,$campana) {
         $sql="select * from $bd.$tabla  where numero_de_carga='$numcarga' and accion in (2,3) or subrespuesta in (12,54) order by rand() limit 1";
       $res=  mysql_query($sql,  Config::conectar_db($bd)) or die(mysql_error());
       $reg=mysql_fetch_row($res);
       echo "<a class='btn-info btn' taregt='_blank' href='".BASE_URL."modules/cobranzas/view/index2.php?&idcl=".$reg[0]."&idc=".$campana."&agente=".$agente."&graba={__UNIQUEID__}&fc={__PHONE__}'>Mostrar Registro</a>";
    } 
    public function Asignado($agente) {
         $sql="select ej.ncarga,ca.campana,ca.base_datos,ca.tabla_datos,ca.idcampanas  from ejecutivo_campana ej inner join  campanas ca on ca.idcampanas=ej.campana where ej.ejecutivo='$agente'";
        $res=  mysql_query($sql,  Config::conectar_db("callcenter")) or die(mysql_error());
        while($cam=  mysql_fetch_array($res)){
            $_SESSION['nombre']=$cam['campana'];
            $_SESSION['bd']=$cam['base_datos'];
            $_SESSION['tabla']=$cam['tabla_datos'];
            $_SESSION['idcampana']=$cam['idcampanas'];
            $_SESSION['numcarga']=$cam['ncarga'];
           // var_dump($_SESSION);
        }
    }
    public function NumerosDiscar($cliente,$bd,$tabla) {
    echo     $sql="select fono1,fono2,fono3,fono4,fono5,fono6,fono7,fono8,fono9,fono10,fono11,fono12,fono13 from $bd.$tabla where id_cartera=$cliente";
    $res= mysql_query($sql,  Config::conectar_db($bd)) or die(mysql_error());
    while($fonos=  mysql_fetch_array($res)){
        for($i=0;$i<14;$i++){
            if($fonos['fono'.$i]>0){
        echo "<option>".$fonos['fono'.$i]."</option>";
            } 
        }
    }
            
    
    }
}
