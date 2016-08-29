<?php
    require_once '../ppal/config.php';
?>
<html>
    <head>
        <?php
        require_once (__ROOT__.'/'.MODULO_ELASTIX.'includes.php');
        require_once (__ROOT__.'/'.MODULO_ELASTIX.'css.php');
        require_once (__ROOT__.'/'.MODULO_ELASTIX.'js.php');
        //require_once (__ROOT__.'/'.MODULO_LOGIN.'css.php');
        //require_once (__ROOT__.'/'.MODULO_ACCESORIOS.'DataTables/extensions/TableTools/css/dataTables.tableTools.css');
        ?>
    </head>
    <body>
        <header>
            
        </header>     
        <div id="menu">
            <ul class="nav">
                <li><a href="#">Elastix</a>
                    <ul>
                        <li><a href="<?php echo BASE_URL.MODULO_ELASTIX.'view/campana.php' ?>">Crear Campaña</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="contenedor">
             <img src="<?php echo BASE_URL.MODULO_LOGIN.'img/'.LOGO_EMPRESA ?>"
        </div>
        <footer>Creado por codigozeta.cl</footer>
    </body>
</html>
