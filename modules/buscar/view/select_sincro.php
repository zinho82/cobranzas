<?php
require_once '../../ppal/Config.php';
Campanas::getCampana($_POST['campana']);
Campanas::MostrarNumeroCarga($_SESSION['bd'],$_SESSION['tabla']);