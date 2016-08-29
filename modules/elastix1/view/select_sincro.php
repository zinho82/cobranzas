<?php
require_once '../../ppal/Config.php';
require_once __ROOT__.MODULO_CAMPANA.'core/Campanas.php';
Campanas::getCampana($_POST['campana']);
Campanas::MostrarNumeroCarga($_SESSION['bd'],$_SESSION['tabla']);