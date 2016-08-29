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
            <table id="tabla" class="display">
                <thead>
                    <tr>
                        <th>ID Campa&ntilde;a</th>
                        <th>Nombre campa&ntilde;a</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha Termino</th>
                        <th>Intentos</th>
                        <th>Cola</th>
                        <th>Completadas</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $ObjCamp=new Predictivo();
                        $ObjCamp->traer_campanas('call_center'); 
                        
                    ?>
                </tbody>
            </table> 
        </div>
        <footer>Creado por codigozeta.cl</footer>
    </body>
</html>

