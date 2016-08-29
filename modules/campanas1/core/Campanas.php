<?php
	class Campanas{ 
            private function RevisarRut($r) {
                if((!$r) or (is_array($r)))
                    return false; /* Hace falta el rut */

                if(!$r = preg_replace('|[^0-9kK]|i', '', $r))
                    return false; /* Era código basura */

                if(!((strlen($r) == 8) or (strlen($r) == 9)))
                    return false; /* La cantidad de carácteres no es válida. */

                $v = strtoupper(substr($r, -1));
                if(!$r = substr($r, 0, -1))
                    return false;

                if(!((int)$r > 0))
                    return false; /* No es un valor numérico */

                $x = 2; $s = 0;
                for($i = (strlen($r) - 1); $i >= 0; $i--){
                    if($x > 7)
                        $x = 2;
                    $s += ($r[$i] * $x);
                    $x++;
                }
                $dv=11-($s % 11);
                if($dv == 10)
                    $dv = 'K';
                if($dv == 11)
                    $dv = '0';
                if($dv == $v)
                    return number_format($r, 0, '', '.').'-'.$v; /* Formatea el RUT */
                return false;
            }
            public function getArchivoBD($archivo,$ruta,$ncarga,$separador){
                $ObjConfig = new Config();
             echo    "<br>guardando archivo temporal<br>";
                mysql_query("truncate callcenter.temporal",  $ObjConfig->conectar_db("callcenter")) or die(mysql_error());
                    $sql="select * from callcenter.archivos where idarchivos='".$archivo."'";
                $res=  mysql_query($sql,  Config::conectar_db("callcenter")) or die(mysql_error());
              $arch=  mysql_fetch_row($res);
                $archivo=$arch[1];
                $lineas = file($ruta.$archivo); 
              foreach ($lineas as $linea_num => $linea)
                {
                 $datos = explode("\t",$linea);
 
                      $cuenta = trim(substr($datos[0],0,24));
                     $rut = trim(substr($datos[0],25,12));
                     $nombre= trim(substr($datos[0],37,80));
                     $fnac= trim(substr($datos[0],117,10));
                     $ecivil= trim(substr($datos[0],127,1));
                     $sexo= trim(substr($datos[0],128,1));
                     
                     $consulta = "INSERT INTO callcenter.temporal VALUES(null,'".$cuenta."','". Campanas::RevisarRut($rut)."','".$nombre."','".$fnac."','".$ecivil."','".$sexo."','".trim(substr($datos[0],129,80))."'"
                           . ",'".trim(substr($datos[0],209,80))."','".trim(substr($datos[0],289,40))."','".trim(substr($datos[0],329,35))."'"
                           . ",'".trim(substr($datos[0],364,10))."','".trim(substr($datos[0],374,40))."','".trim(substr($datos[0],414,3))."'"
                           . ",'".trim(substr($datos[0],417,13))."','".trim(substr($datos[0],430,3))."','".trim(substr($datos[0],433,13))."'"
                           . ",'".trim(substr($datos[0],446,3))."','".trim(substr($datos[0],449,13))."','".trim(substr($datos[0],462,3))."'"
                           . ",'".trim(substr($datos[0],465,13))."','".trim(substr($datos[0],478,3))."','".trim(substr($datos[0],481,13))."'"
                           . ",'".trim(substr($datos[0],494,3))."','".trim(substr($datos[0],497,13))."','".trim(substr($datos[0],510,3))."'"
                           . ",'".trim(substr($datos[0],513,13))."','".trim(substr($datos[0],526,9))."','".trim(substr($datos[0],535,5))."'"
                           . ",'".trim(substr($datos[0],540,1))."','".trim(substr($datos[0],541,2))."','".trim(substr($datos[0],543,15))."'"
                           . ",'".trim(substr($datos[0],558,10))."','".trim(substr($datos[0],568,2))."','".trim(substr($datos[0],570,4))."'"
                           . ",'".trim(substr($datos[0],574,8))."','".trim(substr($datos[0],582,6))."','".trim(substr($datos[0],588,6))."'"
                           . ",'".trim(substr($datos[0],594,2))."','".trim(substr($datos[0],596,8))."','".trim(substr($datos[0],604,10))."'"
                           . ",'".trim(substr($datos[0],614,35))."','".trim(substr($datos[0],649,10))."','".trim(substr($datos[0],659,10))."'"
                           . ",'".trim(substr($datos[0],669,10))."','".trim(substr($datos[0],679,9))."','".trim(substr($datos[0],688,9))."'"
                           . ",'".trim(substr($datos[0],697,9))."','".trim(substr($datos[0],706,9))."','".trim(substr($datos[0],715,9))."'"
                           . ",'".trim(substr($datos[0],724,9))."','".trim(substr($datos[0],733,9))."','".trim(substr($datos[0],742,9))."'"
                           . ",'".trim(substr($datos[0],751,9))."','".trim(substr($datos[0],760,9))."','".trim(substr($datos[0],769,9))."'"
                           . ",'".trim(substr($datos[0],778,10))."','".trim(substr($datos[0],788,15))."','".trim(substr($datos[0],803,3))."'"
                           . ",'".trim(substr($datos[0],806,3))."','".trim(substr($datos[0],809,1))."','".trim(substr($datos[0],810,10))."'"
                           . ",'".trim(substr($datos[0],820,15))."','".trim(substr($datos[0],835,9))."','".trim(substr($datos[0],844,10))."'"
                           . ",'".trim(substr($datos[0],854,5))."','".trim(substr($datos[0],859,5))."','".trim(substr($datos[0],864,4))."'"
                           . ",'".trim(substr($datos[0],868,2))."','".trim(substr($datos[0],870,2))."','".trim(substr($datos[0],872,2))."'"
                           . ",'".trim(substr($datos[0],874,6))."','".trim(substr($datos[0],880,6))."','".trim(substr($datos[0],886,6))."'"
                           . ",'".trim(substr($datos[0],892,5))."','".trim(substr($datos[0],897,5))."','".trim(substr($datos[0],902,5))."'"
                           . ",'".trim(substr($datos[0],907,5))."','".trim(substr($datos[0],912,5))."','".trim(substr($datos[0],917,5))."'"
                           . ",'".trim(substr($datos[0],922,5))."','".trim(substr($datos[0],927,5))."','".trim(substr($datos[0],932,5))."'"
                           . ",'".trim(substr($datos[0],937,5))."','".trim(substr($datos[0],942,5))."','".trim(substr($datos[0],947,5))."'"
                           . ",'".trim(substr($datos[0],952,5))."','".trim(substr($datos[0],957,5))."','".trim(substr($datos[0],962,1))."'"
                           . ",'".trim(substr($datos[0],963,10))."','".trim(substr($datos[0],973,1))."','".trim(substr($datos[0],975,2))."'"
                           . ",'".trim(substr($datos[0],977,2))."','".trim(substr($datos[0],979,4))."','".trim(substr($datos[0],983,4))."'"
                           . ",'".trim(substr($datos[0],987,4))."','".trim(substr($datos[0],991,4))."','".trim(substr($datos[0],995,4))."'"
                           . ",'".trim(substr($datos[0],999,4))."','".trim(substr($datos[0],1003,4))."','".trim(substr($datos[0],1007,4))."'"
                           . ",'".trim(substr($datos[0],1011,4))."','".trim(substr($datos[0],1015,4))."','".trim(substr($datos[0],1019,6))."'"
                           . ",'".trim(substr($datos[0],1025,4))."','".trim(substr($datos[0],1029,4))."','".trim(substr($datos[0],1033,4))."'"
                           . ",'".trim(substr($datos[0],1037,4))."','".trim(substr($datos[0],1041,4))."','".trim(substr($datos[0],1045,4))."'"
                           . ",'".trim(substr($datos[0],1049,4))."','".trim(substr($datos[0],1053,4))."','".trim(substr($datos[0],1057,5))."'"
                           . ",'".trim(substr($datos[0],1062,4))."','".trim(substr($datos[0],1065,10))."','".trim(substr($datos[0],1076,10))."'"
                           . ",'".trim(substr($datos[0],1086,10))."','".trim(substr($datos[0],1096,15))."','".trim(substr($datos[0],1111,4))."'"
                           . ",'".trim(substr($datos[0],1115,9))."','".trim(substr($datos[0],1124,13))."','".trim(substr($datos[0],1137,13))."'"
                           . ",'".trim(substr($datos[0],1150,13))."','".trim(substr($datos[0],1163,13))."','".trim(substr($datos[0],1176,13))."'"
                           . ",'".trim(substr($datos[0],1202,10))."','".trim(substr($datos[0],1212,10))."','".trim(substr($datos[0],1222,10))."'"
                           . ",'".trim(substr($datos[0],1232,10))."','".trim(substr($datos[0],1242,10))."','".trim(substr($datos[0],1252,10))."'"
                           . ",'".trim(substr($datos[0],1262,10))."','".trim(substr($datos[0],1272,10))."','".trim(substr($datos[0],1282,10))."'"
                           . ",'".trim(substr($datos[0],1292,10))."','".trim(substr($datos[0],1302,10))."','".trim(substr($datos[0],1312,10))."'"
                           . ",'".trim(substr($datos[0],1322,10))."','".trim(substr($datos[0],1332,10))."','".trim(substr($datos[0],1342,10))."'"
                           . ",'".trim(substr($datos[0],1352,10))."','".trim(substr($datos[0],1362,10))."','".trim(substr($datos[0],1372,10))."'"
                           . ",'".trim(substr($datos[0],1382,10))."','".trim(substr($datos[0],1392,10))."','".trim(substr($datos[0],1402,10))."'"
                           . ",'".trim(substr($datos[0],1412,10))."','".trim(substr($datos[0],1422,10))."','".trim(substr($datos[0],1432,10))."'"
                           . ",'".trim(substr($datos[0],1442,10))."','".trim(substr($datos[0],1452,10))."','".trim(substr($datos[0],1462,10))."'"
                           . ",'".trim(substr($datos[0],1472,10))."','".trim(substr($datos[0],1482,10))."','".trim(substr($datos[0],1492,10))."'"
                           . ",'".trim(substr($datos[0],1502,10))."',null,null,'".$ncarga."',null)";
                    mysql_query($consulta, Archivos::conectar_db('callcenter')) or die(mysql_error());
                }
                if(mysql_affected_rows()>0){
                    return true;
                }
                
            }
            public function getArchivoBD_CSV($archivo,$ruta,$ncarga,$separador){
                $ObjConfig = new Config();
                 "<br>guardando archivo temporal<br>";
                mysql_query("truncate callcenter.temporal",  $ObjConfig->conectar_db("callcenter")) or die(mysql_error());
                    $sql="select * from callcenter.archivos where idarchivos='".$archivo."'";
                $res=  mysql_query($sql,  Config::conectar_db("callcenter")) or die(mysql_error());
                  $arch=  mysql_fetch_row($res);
                  $ruta;
                  $lineas = file($ruta.$arch[1]); 
              foreach ($lineas as $linea_num => $linea)
                {
                  $datos = explode(";",$linea);
 
                     $cuenta = trim($datos[0]); 
                     $rut = trim($datos[1]);
                     $nombre= trim($datos[2]);
                     $fnac= trim($datos[3]);
                     $ecivil= trim($datos[4]);
                     $sexo= trim($datos[5]);
                     
                        $consulta = "INSERT INTO callcenter.temporal VALUES(null,'".$cuenta."','". $rut."','".$nombre."','".$fnac."','".$ecivil."','".$sexo."','".trim($datos[6])."'"
                           . ",'".trim($datos[7])."','".trim($datos[8])."','".trim($datos[9])."'"
                           . ",'".trim($datos[10])."','".trim($datos[11])."','".trim($datos[12])."'"
                           . ",'".trim($datos[13])."','".trim($datos[14])."','".trim($datos[15])."'"
                           . ",'".trim($datos[16])."','".trim($datos[17])."','".trim($datos[18])."'"
                           . ",'".trim($datos[19])."','".trim($datos[20])."','".trim($datos[21])."'"
                           . ",'".trim($datos[22])."','".trim($datos[23])."','".trim($datos[24])."'"
                           . ",'".trim($datos[25])."','".trim($datos[26])."','".trim($datos[27])."'"
                           . ",'".trim($datos[28])."','".trim($datos[29])."','".trim($datos[30])."'"
                           . ",'".trim($datos[31])."','".trim($datos[32])."','".trim($datos[33])."'"
                           . ",'".trim($datos[34])."','".trim($datos[35])."','".trim($datos[36])."'"
                           . ",'".trim($datos[37])."','".trim($datos[38])."','".trim($datos[39])."'"
                           . ",'".trim($datos[40])."','".trim($datos[41])."','".trim($datos[42])."'"
                           . ",'".trim($datos[43])."','".trim($datos[44])."','".trim($datos[46])."'"
                           . ",'".trim($datos[46])."','".trim($datos[47])."','".trim($datos[48])."'"
                           . ",'".trim($datos[49])."','".trim($datos[50])."','".trim($datos[51])."'"
                           . ",'".trim($datos[52])."','".trim($datos[53])."','".trim($datos[54])."'"
                           . ",'".trim($datos[55])."','".trim($datos[55])."','".trim($datos[56])."'"
                           . ",'".trim($datos[58])."','".trim($datos[59])."','".trim($datos[60])."'"
                           . ",'".trim($datos[61])."','".trim($datos[62])."','".trim($datos[63])."'"
                           . ",'".trim($datos[64])."','".trim($datos[65])."','".trim($datos[66])."'"
                           . ",'".trim($datos[67])."','".trim($datos[68])."','".trim($datos[69])."'"
                           . ",'".trim($datos[70])."','".trim($datos[71])."','".trim($datos[72])."'"
                           . ",'".trim($datos[73])."','".trim($datos[74])."','".trim($datos[75])."'"
                           . ",'".trim($datos[76])."','".trim($datos[77])."','".trim($datos[78])."'"
                           . ",'".trim($datos[79])."','".trim($datos[80])."','".trim($datos[81])."'"
                           . ",'".trim($datos[82])."','".trim($datos[83])."','".trim($datos[84])."'"
                           . ",'".trim($datos[85])."','".trim($datos[86])."','".trim($datos[87])."'"
                           . ",'".trim($datos[88])."','".trim($datos[89])."','".trim($datos[90])."'"
                           . ",'".trim($datos[91])."','".trim($datos[92])."','".trim($datos[93])."'"
                           . ",'".trim($datos[94])."','".trim($datos[95])."','".trim($datos[96])."'"
                           . ",'".trim($datos[97])."','".trim($datos[98])."','".trim($datos[99])."'"
                           . ",'".trim($datos[100])."','".trim($datos[101])."','".trim($datos[102])."'"
                           . ",'".trim($datos[103])."','".trim($datos[104])."','".trim($datos[105])."'"
                           . ",'".trim($datos[106])."','".trim($datos[107])."','".trim($datos[108])."'"
                           . ",'".trim($datos[109])."','".trim($datos[110])."','".trim($datos[111])."'"
                           . ",'".trim($datos[112])."','".trim($datos[113])."','".trim($datos[114])."'"
                           . ",'".trim($datos[115])."','".trim($datos[116])."','".trim($datos[117])."'"
                           . ",'".trim($datos[118])."','".trim($datos[119])."','".trim($datos[120])."'"
                           . ",'".trim($datos[121])."','".trim($datos[122])."','".trim($datos[123])."'"
                           . ",'".trim($datos[124])."','".trim($datos[125])."','".trim($datos[126])."'"
                           . ",'".trim($datos[127])."','".trim($datos[128])."','".trim($datos[129])."'"
                           . ",'".trim($datos[130])."','".trim($datos[131])."','".trim($datos[132])."'"
                           . ",'".trim($datos[133])."','".trim($datos[134])."','".trim($datos[135])."'"
                           . ",'".trim($datos[137])."','".trim($datos[138])."','".trim($datos[139])."'"
                           . ",'".trim($datos[140])."','".trim($datos[141])."','".trim($datos[142])."'"
                           . ",'".trim($datos[143])."','".trim($datos[144])."','".trim($datos[145])."'"
                           . ",'".trim($datos[146])."','".trim($datos[147])."','".trim($datos[148])."'"
                           . ",'".trim($datos[149])."','".trim($datos[150])."','".trim($datos[151])."'"
                           . ",'".trim($datos[152])."','".trim($datos[153])."','".trim($datos[154])."'"
                           . ",'".trim($datos[155])."',null,null,'".$ncarga."',null)";
                    mysql_query($consulta, Archivos::conectar_db('callcenter')) or die(mysql_error());
                }
                return TRUE;
            }
            public function traer_archivo($tipo_carga){
                $ObjConfig = new Config();
                echo "<option selected>Seleccione un archivo</option>";
                $sql="select * from callcenter.archivos where proceso='".$tipo_carga."' and date(fecha_upload) like '".date('Y-m')."%'";
                $res=mysql_query($sql,$ObjConfig->conectar_db('callcenter')) or die(mysql_error());
                while($archi=  mysql_fetch_array($res)){
                    echo "<option value='".$archi['idarchivos']."'>".$archi['nombre']." (".$archi['fecha_upload'].")"."</option>";
                }
            }
            public function CargarCampana($bd,$tabla) {
                  $sql="insert into ".$bd.".".$tabla."
                    select 
                    null,temp.ncarga,temp.c1,temp.c2,temp.c3,temp.c4,temp.c5,temp.c6,temp.c7,temp.c8
                    ,temp.c9,temp.c10,temp.c11,temp.c12,temp.c13,temp.c14,temp.c15,temp.c16,temp.c17,temp.c18
                    ,temp.c19,temp.c20,temp.c21,temp.c22,temp.c23,temp.c24,temp.c25,temp.c26,temp.c27,temp.c28
                    ,temp.c29,temp.c30,temp.c31,temp.c32,temp.c33,temp.c34,temp.c35,temp.c36,temp.c37,temp.c38
                    ,temp.c39,temp.c40,temp.c41,temp.c42,temp.c43,temp.c44,temp.c45,temp.c46,temp.c47,temp.c48
                    ,temp.c49,temp.c50,temp.c51,temp.c52,temp.c53,temp.c54,temp.c55,temp.c56,temp.c57,temp.c58
                    ,temp.c59,temp.c60,temp.c61,temp.c62,temp.c63,temp.c64,temp.c65,temp.c66,temp.c67,temp.c68
                    ,temp.c69,temp.c70,temp.c71,temp.c72,temp.c73,temp.c74,temp.c75,temp.c76,temp.c77,temp.c78
                    ,temp.c79,temp.c80,temp.c81,temp.c82,temp.c83,temp.c84,temp.c85,temp.c86,temp.c87,temp.c88
                    ,temp.c89,temp.c90,temp.c91,temp.c92,temp.c93,temp.c94,temp.c95,temp.c96,temp.c97,temp.c98
                    ,temp.c99,temp.c100,temp.c101,temp.c102,temp.c103,temp.c104,temp.c105,temp.c106,temp.c107,temp.c108
                    ,temp.c109,temp.c110,temp.c111,temp.c112,temp.c113,temp.c114,temp.c115,temp.c116,temp.c117,temp.c118
                    ,temp.c119,temp.c120,temp.c121,temp.c122,temp.c123,temp.c124,temp.c125,temp.c126,temp.c127,temp.c128
                    ,temp.c129,temp.c130,temp.c131,temp.c132,temp.c133,temp.c134,temp.c135,temp.c136,temp.c137,temp.c138
                    ,temp.c139,temp.c140,temp.c141,temp.c142,temp.c143,temp.c144,temp.c145,temp.c146,temp.c147,temp.c148
                    ,temp.c149,temp.c150,temp.c151,null,null,null,null,null,null,null
                    ,null,null,null,null,null,null,null,null,null,null
                    ,null,null,null,null,null,null,null,null,null,null
                    ,null,null,null,null,null,null,null,null,null,null
                    ,null,null,null,null,null,null,null,null,null,null  
                    ,null,null,null,null,null,null,null,1
                    from callcenter.temporal temp where temp.existe is null";
        mysql_query($sql,  Config::conectar_db($bd)) or die(mysql_error());
                if(mysql_affected_rows()>0){
            echo "<br>  <i class='fa fa-check-circle'></i> Campaña Cargada <br>Se cargaron ".  mysql_affected_rows()." registros<br>";
            return true;
        }
        else{
            echo "<br> <i class='fa fa-exclamation-triangle'></i> No se Cargaron registros nuevos<br>";
            
        }
            }
            public function RevisarNumeroTelefono($bd,$tabla,$campotelefono,$area,$telefono) {
                mysql_query("update $bd.$tabla set $area= null where $area=0");
                mysql_query("update $bd.$tabla set $telefono= null where $telefono=0");
                Campanas::RepararFonos($area,$telefono,$bd,$tabla);
                  $sql="update ".$bd.".".$tabla." set ".$campotelefono."=concat(".$area.",".$telefono.")";
                mysql_query($sql,  Config::conectar_db($bd)) or die(mysql_error());
                   $sql="update ".$bd.".".$tabla." set ".$campotelefono."=NULL where length(".$campotelefono.")<5";
                mysql_query($sql, Config::conectar_db($bd)) or die(mysql_error());
                if(mysql_affected_rows()>0){
                    echo "<br><i class='fa fa-check-circle'></i> Telefono ".$campotelefono." Actualizado<br>";
                }
            }
            public function getCampana($idcampana) {
                $sql="select * from callcenter.campanas where idcampanas=".$idcampana;
                $res=mysql_query($sql, Config::conectar_db('callcenter')) or die(mysql_error());
                $camp=mysql_fetch_array($res);
                        $_SESSION['bd']=$camp['base_datos'];
                        $_SESSION['tabla']=  $camp['tabla_datos'];
                        $_SESSION['campana']=  $camp['campana'];
                        $_SESSION['predictivo']=$camp['campana_predictivo'];
                        $_SESSION['idcampana']=$camp['idcampanas'];
            }
            public function getFonos($idcliente,$db,$tabla) {
                $ObjConfig = new Config();
                 $sql="select fono1,fono2,fono3,fono4,fono5,fono6,fono7,fono8,fono9,fono10,fono11,fono12,fono13 from ".$db.".".$tabla." where id_cartera=".$idcliente;
             $res=mysql_query($sql,$ObjConfig->conectar_db($db));
             return mysql_fetch_array($res);
            }
            public function postFonos($f1,$f2,$f3,$f4,$f5,$f6,$f7,$f8,$f9,$f10,$f11,$f12,$f13,$idcliente,$tabla,$bd) {
                $ObjConfig = new Config();
                  $query="update ".$bd.".".$tabla." set fono1=".$f1
                        . ",fono2='".$f2."'"
                        . ",fono3='".$f3."'"
                        . ",fono4='".$f4."'"
                        . ",fono5='".$f5."'"
                        . ",fono6='".$f6."'"
                        . ",fono7='".$f7."'"
                        . ",fono8='".$f8."'"
                        . ",fono9='".$f9."'"
                        . ",fono10='".$f10."'"
                        . ",fono11='".$f11."'"
                        . ",fono12='".$f12."'"
                        . ",fono13='".$f13."'"
                        . " where id_cartera=".$idcliente;
                        
                mysql_query($query,$ObjConfig->conectar_db($bd)) or die(mysql_error());
                
            }
            public function ListaCampanasSelect(){
                echo "<option selected>Seleccione una opcion</option>";
               echo  $sql="select * from campanas"; 
                $res=  mysql_query($sql, Config::conectar_db('callcenter'))or die(mysql_error());
                while($cam=  mysql_fetch_array($res)){
                    echo '<option value="'.$cam['idcampanas'].'">'.$cam['campana'].'</option>';
                }
            }
            public function MostrarNumeroCarga($bd,$tabla) {
                echo "<option>Seleccione Numero de Carga</option>";
                 $sql="select numero_de_carga from ".$bd.".".$tabla." group by numero_de_carga";
                $res=mysql_query($sql,  Config::conectar_db($bd));
                while($nc=  mysql_fetch_array($res)){
                echo "<option values='".$nc['numero_de_carga']."'>".$nc['numero_de_carga']."</option>";
                }
            }
            public function MarcarCartas($bd,$tabla,$numcarga,$campoactualizar,$campo_temporal){
                         $sql="update ".$bd.".".$tabla." datos
                             set datos.".$campoactualizar."=null where numero_de_carga='".$numcarga."'";
                mysql_query($sql,  Config::conectar_db($bd));   

                         $sql="update ".$bd.".".$tabla." datos
                    inner join callcenter.temporal tmp on tmp.c2=datos.dmacct  and trim(tmp.".$campo_temporal.")='1'
                    set datos.".$campoactualizar."='SI',datos.u6codcam=tmp.c5";
                mysql_query($sql,  Config::conectar_db($bd));
                echo "<br>Se han Actualizado: ".mysql_affected_rows()." registros con ".strtoupper($campoactualizar);
                
            }
            public function MarcarPie0($bd,$tabla,$numcarga,$campoactualizar,$campo_temporal){
                  $sql="update ".$bd.".".$tabla." datos
                             set datos.".$campoactualizar."=null where numero_de_carga='".$numcarga."'";
                mysql_query($sql,  Config::conectar_db($bd));   

                          $sql="update ".$bd.".".$tabla." datos
                    inner join callcenter.temporal tmp on tmp.c1=datos.dmacct  
                    set datos.".$campoactualizar."='SI'";
                mysql_query($sql,  Config::conectar_db($bd));
                echo "<br>Se han Actualizado: ".mysql_affected_rows()." registros con ".strtoupper($campoactualizar);
                
            }
            public function RepararFonos($area,$fono,$bd,$tabla) {
                 $sql="update ".$bd.".".$tabla." da set da.".$area."= "
                       . "case when length(da.".$area.")=1 and length(da.".$fono.")=7 and da.".$area."!=2 then concat(9,da.".$area.") "
                       . "when length(da.".$area.")=1 and length(da.".$fono.")=6 and da.".$area."!=2 then concat(99,da.".$area.") "
                       . "when length(da.".$area.")=1 and length(da.".$fono.")=6 and da.".$area."=2 then concat(22,da.".$area.") "
                       . "when length(da.".$area.")=1 and length(da.".$fono.")=7 and da.".$area."=2 then concat(2,da.".$area.") "
                       . "when length(da.".$area.")=2 and length(da.".$fono.")=6 then concat(da.".$area.",2) "
                       . "else da.".$area." end"; 
                       mysql_query($sql,  Config::conectar_db($bd));
            }
            public function BloquearRegistros($tabla,$bd) {
                 $sql="update ".$bd.".".$tabla." set estado=null where estado is not null";
                mysql_query($sql,  Config::conectar_db($bd)) or die(mysql_error());
                
                if(mysql_affected_rows()>0){
                    echo "<br><i class='fa fa-check-circle'></i> Registros bloqueados<br>";
                     return true;
                }
                else{
                    echo "<br><i class='fa fa-thumbs-down'></i>No se Bloquearon Registros<br>";
                     return true;
                }
                   
                }
            public function RegistrosExistentes($tabla,$bd) {
                $sql="update callcenter.temporal te
                        inner join ".$bd.".".$tabla." da on da.dmacct=te.c1 
                        set te.existe=1";    
                mysql_query($sql,  Config::conectar_db($bd)) or die(mysql_error());
                    if(mysql_affected_rows()>0){
                        echo " <i class='fa fa-check-circle'></i> Se Marcaron los Registros Existentes";
                        return true;
                    
                    }
                    else{
                        echo "<br><i class='fa fa-thumbs-down'></i>No se encontraron registros existentes";
                    }
                }
            public function ActivarRegistro($bd,$tabla) {
                 $sql="update $bd.$tabla inner join callcenter.temporal on c1=dmacct set estado=1 ";
                mysql_query($sql,  Config::conectar_db($bd));
                echo "<i class='fa fa-check-circle'></i> Se activaron ".mysql_affected_rows()." Registros";
                $sql="select count(*) from $bd.$tabla where estado is null";
                $res=  mysql_query($sql,  Config::conectar_db("callcenter"));
                echo "<br><i class='fa fa-check-circle'></i>  Se bloquearon ".mysql_result($res, 0)." Registros";
                    
                }
            public function ActualizarBD($bd,$tabla) {
                    $sql="update $bd.$tabla da
                            inner join callcenter.temporal tmp on da.dmacct=tmp.c1
                            set da.u6fecnac=tmp.c4,da.u6estciv=tmp.c5,da.u6sexo= tmp.c6,da.dmaddr1=tmp.c7,da.dmaddr2=tmp.c8,da.dmcity=tmp.c9
 ,da.u6desccomu=tmp.c10,da.dmzip=tmp.c11,da.u6cupodisp=tmp.c27,da.dmdays=tmp.c28,da.u6trammor=tmp.c29,da.u6trampro=tmp.c30
 ,da.dmpayamt=tmp.c31,da.dmpaydt=tmp.c32,da.u6diavenc=tmp.c33,da.u6clasifcli=tmp.c34,da.u6sucapertur=tmp.c35,da.u6scrbehavio=tmp.c36
 ,da.u6scrcobra=tmp.c37,da.u6orplanc=tmp.c38,da.dmagency=tmp.c39,da.dmassagdt=tmp.c40,da.u6codcam=tmp.c41,da.u6fecinicam=tmp.c42
 ,da.u6fecfincam=tmp.c43,da.dmdlqdt=tmp.c44,da.dmcurbal=tmp.c45,da.u6carxtrve=tmp.c46,da.u6gastcob=tmp.c47,da.u6intxmora=tmp.c48
 ,da.u6otrcarv=tmp.c49,da.u6deuvenc=tmp.c50,da.u6mondeuxven=tmp.c51,da.u6carxven=tmp.c52,da.u6tdeuxven=tmp.c53,da.u6totdeud=tmp.c54
 ,da.dmppdue=tmp.c55,da.dmppkept=tmp.c57,da.dmppbrok=tmp.c58,da.dmppflag=tmp.c59,da.dmppmade=tmp.c60 ";
                    mysql_query($sql,  Config::conectar_db("callcenter"));
                    
                }
            public function LimpiarTemporal($campoinicio,$campofin,$bd,$tabla,$campo) {
                for ($i=$campoinicio;$i<=$campofin;$i++){
                      $sql="update $bd.$tabla set $campo".$i."=null where $campo".$i."=0 or $campo".$i.'=""';
                     mysql_query($sql,  Config::conectar_db("callcenter"));
                }   
            }
	} 
		
	