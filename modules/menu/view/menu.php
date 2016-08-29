<?php// if($_SESSION['usuario']['login']==true):?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button> 
      <a class="navbar-brand" href="#">InsideGroup</a>
    </div> 
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav"> 
        <li><a href="<?php echo BASE_URL.MODULO_COBRANZA."/view/panelAgente.php" ?> ">Cobranzas <span class="sr-only"></span></a></li> 
        <li><a href="<?php echo BASE_URL.MODULO_BUSCAR ?>view/buscar.php">Buscar <span class="sr-only"></span></a></li> 
        <li><a href="<?php echo BASE_URL.MODULO_PANEL ?>view/panel.php">Panel <span class="sr-only"></span></a></li>
       <!-- <li><a href="<?php echo BASE_URL.MODULO_AUDITORIA ?>view/auditoria.php">Auditoria <span class="sr-only"></span></a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Supervisor <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL.MODULO_ARCHIVOS ?>/view/formulario.php">Subir Archivos</a></li>
            <li><a href="<?php echo BASE_URL.MODULO_CAMPANA ?>view/act_cartas.php?proc=carta">Actualizar Cartas</a></li>
            <li><a href="<?php echo BASE_URL.MODULO_CAMPANA ?>view/cargarbd.php?proc=bd">Cargar Base de Datos</a></li>
            <li><a href="<?php echo BASE_URL.MODULO_CAMPANA ?>view/actualizarbd.php?proc=abd">Actualizar Base de Datos</a></li>
            <li><a href="<?php echo BASE_URL.MODULO_CAMPANA ?>view/pie0.php?proc=pie">Actualizar Pie 0</a></li>
            <li><a href="<?php echo BASE_URL.MODULO_CAMPANA ?>view/actfonos.php?proc=fono">Cargar Fonos Nuevos</a></li>
            <li><a href="<?php echo BASE_URL.MODULO_CAMPANA ?>view/especiales.php?proc=esp">Crear Campañas Llamados</a></li>          
            <li><a href="<?php echo BASE_URL.MODULO_CAMPANA ?>view/reparar_fonos.php">Reparar Telefonos</a></li>
</ul>
        </li>
        <li class="dropdown">  
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL.MODULO_INFORMES ?>/view/informe200.php">Gestion (200)</a></li>
            <li><a href="<?php echo BASE_URL.MODULO_INFORMES ?>/view/informe200mes.php">Gestion (200) por Mes</a></li>
            <li><a href="<?php echo BASE_URL.MODULO_INFORMES ?>/view/informe600.php">Promesa de Pago (600)</a></li>
            <li><a href="<?php echo BASE_URL.MODULO_INFORMES ?>/view/gestiones.php">Gestiones</a></li>
          </ul> 
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Predictivo <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL.MODULO_ELASTIX ?>view/gestion_campana.php">Gestion Telefonos</a></li>
          </ul>
        </li>
      </ul>
        
     <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        
      </ul>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->  
</nav><?php //endif;?>
