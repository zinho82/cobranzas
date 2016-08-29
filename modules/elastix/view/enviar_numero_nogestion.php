<?php
require_once '../../ppal/Config.php'; 
Predictivo::EnviarNumerosSinGestion($_GET['cmp'],$_GET['fono'],$_SESSION['bd'],$_SESSION['tabla'],$_SESSION['idcampana'],$_SESSION['numcarga']);
 