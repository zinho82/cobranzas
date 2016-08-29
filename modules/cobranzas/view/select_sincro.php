<?php
require_once '../../ppal/Config.php';
require_once '../core/Cobranzas.php';

$ObjCamp=new Cobranzas();
$ObjCamp->traer_codigos('callcenter','resp_rapida_resultado','where id_resp_rapida_accion='.$_POST['rrr'],'resultado','id_resp_rapida_resultado');