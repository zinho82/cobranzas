<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
/**
 * Description of Buscar 
 *
 * @author zinho
 */
class Buscar {
    public function BuscarCuenta($bd,$tabla,$cuenta,$campana) {
          $sql="select * from ".$bd.".".$tabla." where dmacct=".trim($cuenta);
        if($res=  mysql_query($sql,  Config::conectar_db($bd)) or die(mysql_error())){
        while($busca=  mysql_fetch_array($res)){
            echo "<tr>"
                    . "<td>".$busca['numero_de_carga']."</td>"
                    . "<td>".$busca['dmacct']."</td>"
                    . "<td>".$busca['dmssnum']."</td>" 
                    . "<td>".$busca['dmname']."</td>" 
                    . "<td>".number_format($busca['u6deuvenc'],0)."</td>"
                    . "<td>". Buscar::MostrarCodigo($bd,'resp_rapida_resultado','id_resp_rapida_resultado',$busca['subrespuesta'])."</td>"
                    . "<td>".$busca['dmlstact']."</td>"
                    ."<td><a target='_blank' href='".BASE_URL.MODULO_COBRANZA. "/view/index.php?idcl=".$busca['id_cartera']."&idc=".$campana."' class='btn btn-info'><i class='fa fa-search' title='MostrarRegistro'> Mostrar</i></a></td>"
                . "</tr>";
        }
        }
        else{
            echo "<br>Sin Resultado ";
        }
          
    }
    public function MostrarCodigo($db,$tabla,$campo,$codigo_buscar) {
             $sql="select * from ".$db.'.'.$tabla." where ".$campo."=".$codigo_buscar;
        $res=mysql_query($sql, Config::conectar_db($db)) or die(mysql_error());
        return  mysql_result($res, 0,2).' - '.mysql_result($res, 0,3);
    }
}
