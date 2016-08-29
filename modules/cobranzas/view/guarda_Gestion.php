<?php
require_once '../../ppal/Config.php';
require_once '../core/Cobranzas.php';
$gg=new Cobranzas();
$gg->guarda_historico($_SESSION['bd'], $_POST['idcliente'], $_POST['comentario'], date('Y-m-d G:i:s'), $_POST['agente'],$_POST['grabacion'], $_POST['rrs'], $_POST['rrr'], $_POST['segundo_select'],$_POST['fc']);
$gg->actualiza_cliente($_SESSION['bd'], $_SESSION['tabla'],$_POST['comentario'],$_POST['fec_com_pago'],$_POST['rrr'],$_POST['segundo_select'],$_POST['idcliente']);