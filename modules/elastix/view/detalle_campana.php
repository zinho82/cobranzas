<?php
    require_once '../../ppal/config.php';
?>
<html>
    <head>
        <?php 
        require_once (__ROOT__.'/'.MODULO_ELASTIX.'includes.php');
        require_once (__ROOT__.'/'.MODULO_ELASTIX.'css.php');
        require_once (__ROOT__.'/'.MODULO_ELASTIX.'js.php');
        require_once (__ROOT__.'/'.MODULO_LOGIN.'css.php');
        require_once (__ROOT__.'/'.MODULO_LOGIN.'includes_login.php');
        $ObjCamp=new Predictivo();
        $ObjCamp->traer_datos_llamadas($_GET['cpn'], 'call_center');
        $ObjCamp->tipo_telefono('celular');
        $ObjCamp->tipo_telefono('telefono');
        $ObjCamp->limpiar_tabla('callcenter','tbl_recorrido_predictivo');
        $ObjCamp->contar_fono('callcenter', ' and ( cal.status="Success" or cal.status="Abandoned" or cal.status="ShortCall")', $_GET['cpn'],'celular','success','conectadas');
        $ObjCamp->contar_fono('callcenter'," and (cal.`status` is NULL or cal.`status`='')", $_GET['cpn'],'celular','success','por_realizar');
        $ObjCamp->contar_fono('callcenter', ' ', $_GET['cpn'],'celular','conectadas',"cargadas");
        $ObjCamp->contar_fono('callcenter', "and cal.status='Failure'", $_GET['cpn'],'celular','failure','fallidas');
        $ObjCamp->contar_fono('callcenter', "and cal.status='NoAnswer'", $_GET['cpn'],'celular','failure','nocontestadas');
        $ObjCamp->contar_fono('callcenter', "and cal.status='Success'", $_GET['cpn'],'celular','failure','contestadas');
        $ObjCamp->contar_fono('callcenter', "and cal.status='Abandoned'", $_GET['cpn'],'celular','failure','abandonadas');
        $ObjCamp->contar_fono('callcenter', "and cal.status='ShortCall'", $_GET['cpn'],'celular','failure','shortcall');
        $ObjCamp->contar_fono('callcenter', "and cal.failure_cause='28'", $_GET['cpn'],'celular','failure','numerror');
        $ObjCamp->contar_fono('callcenter', "and cal.failure_cause='21'", $_GET['cpn'],'celular','failure','rechazada');
        $ObjCamp->contar_fono('callcenter', "and cal.failure_cause='20'", $_GET['cpn'],'celular','failure','ausente');
        $ObjCamp->contar_fono('callcenter', "and cal.failure_cause='17'", $_GET['cpn'],'celular','failure','ocupado');
        $ObjCamp->contar_fono('callcenter', "and (cal.failure_cause!='' and cal.failure_cause!='17' and cal.failure_cause!='20' and cal.failure_cause!='21' and cal.failure_cause!='28')", $_GET['cpn'],'celular','failure','fin');
        $ObjCamp->contar_fono('callcenter', "and cal.id_rrs='positiva'", $_GET['cpn'],'celular','id_rrs','positiva');
        $ObjCamp->contar_fono('callcenter', "and cal.id_rrs='negativa'", $_GET['cpn'],'celular','id_rrs','negativa');
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
            <table id="tabla" cellspacing="0" cellpadding="3"     width="100%"   >
                <thead>
                    <tr>
                        <th>Campa&ntilde;a:</th>
                        <th colspan="2"><b><?php echo $ObjCamp->nombre_campana('call_center', $_GET['cpn']) ; ?></b> </th>
                    </tr>
                    <tr>
                        <td>Telefono </td>
                        <th>Cargadas</th>
                        <th>Por Realizar</th>
                        <th>Conectadas</th>
                        <th>Fallidas</th>
                        <th>No Contestadas</th> 
                        <th>Contestadas</th>
                        <th>Abandonadas</th>
                        <th>Menores a 10 segundos</th>
                        <th>Numero Erroneo</th>
                        <th>Llamada Rechazada</th>
                        <th>Ausente</th>
                        <th>Ocupado</th>
                        <th>Fin Llamada</th>
                        <th>Positiva</th>
                        <th>Negativa</th>
                    </tr>
                </thead>
                <tbody>
                <?php $ObjCamp->resultado_cuenta(); ?>
            </tbody>
            <tfoot>
                <tr>
                        <th>Telefono </th>
                        <th>Cargadas</th>
                        <th>Por Realizar</th>
                        <th>Conectadas</th>
                        <th>Fallidas</th>
                        <th>No Contestadas</th> 
                        <th>Contestadas</th>
                        <th>Abandonadas</th>
                        <th>Menores a 10 segundos</th>
                        <th>Numero Erroneo</th>
                        <th>Llamada Rechazada</th>
                        <th>Ausente</th>
                        <th>Ocupado</th>
                        <th>Fin Llamada</th>
                        <th>Positiva</th>
                        <th>Negativa</th>
            </tfoot>
            </table>
        </div>
        <footer>Creado por codigozeta.cl</footer>
    </body>
</html>



