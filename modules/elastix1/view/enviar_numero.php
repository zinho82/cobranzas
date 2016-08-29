<?php
require_once '../../ppal/Config.php'; 
Predictivo::EnviarNumeros($_GET['cmp'],$_GET['fono'],$_SESSION['bd'],$_SESSION['tabla'],$_SESSION['idcampana']);
 