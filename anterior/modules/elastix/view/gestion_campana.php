<?php
    require_once '../../ppal/config.php';
?>
<html>
    <head>
        <?php
        require_once (__ROOT__.'/'.MODULO_LOGIN.'includes_login.php');
        require_once (__ROOT__.'/'.MODULO_ELASTIX.'includes.php');
        require_once (__ROOT__.'/'.MODULO_ELASTIX.'css.php');
        require_once (__ROOT__.'/'.MODULO_ELASTIX.'js.php');
        require_once (__ROOT__.'/'.MODULO_LOGIN.'css.php');
        $ObjCamp=new Predictivo();
        $ObjCamp->traer_datos_llamadas($_GET['cpn'], "call_center");
        $ObjCamp->traer_carpeta("call_center","id_carpeta","id_carpeta");
        $ObjCamp->traer_carpeta("call_center","id_cartera","id_cartera");
        $ObjCamp->tipo_telefono("concat(trim(perso.u6catelcelu),trim( perso.u6telcelu))",'movil',$_POST['ncarga']);
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
            <form id="campanas" method="post">
                <table>
                    <tr>
                        <td>
                            <select id="ncampana" name="ncampana">
                                <option value="0">Seleccione Campa&ntilde;a</option>
                                <?php echo $ObjCamp->traer_campanas_cobraza();?>
                            </select>
                        </td>
                        <td>
                            <select id="ncarga" name="ncarga">
                                <option value="0">Seleccione Numero de Carga</option>
                                    
                            </select>
                            <input type="submit" value="Buscar">
                        </td>
                    </tr>
                </table>
            </form>
            <table id="tabla" class="display" cellspacing="0" cellpaddin="0" border="1">
                <thead>
                    <tr>
                        <th>Campa&ntilde;a:</th>
                        <th colspan="7"><b><?php echo $ObjCamp->nombre_campana('call_center', $_GET['cpn']) ; ?></b> </th>
                    </tr>
                    <tr>
                        <th>Telefono </th>
                        <th>Cantidad</th>
                        <th>Validos  </th>
                        <th>No Validos</th>
                        <th>Recorridos</th>
                        <th>Gestion Negativa</th>
                        <th>Gestion Positiva</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelcelu,u6telcelu) ",'Movil',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelcasa,dmphone) ",'Fono1',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelofic,dmbphone) ",'Fono2',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelcont,u6telconta) ",'Fono3',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelotr1,u6telotro1) ",'Fono4',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelotr2,u6telotro2) ",'Fono4',$_POST['ncampana'],$_POST['ncarga']);
                        echo $ObjCamp->traer_fonos("workflow_limpio_cobranzas","cartera","concat(u6catelotr3,u6telotro3) ",'Fono5',$_POST['ncampana'],$_POST['ncarga']);
                        
                  ?>
            </tbody>
            </table>
        </div>
        <footer>Creado por codigozeta.cl</footer>
    </body>
</html>



