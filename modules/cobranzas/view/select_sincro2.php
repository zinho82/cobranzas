<?php
require_once '../../ppal/Config.php';
require_once '../core/Cobranzas.php';

$ObjCamp=new Cobranzas();
$ObjCamp->traer_codigos('callcenter','resp_rapida_subrespuesta','where id_resp_rapida_resultado='.$_POST['segundo_select'],'subrespuesta','id_resp_rapida_subrespuesta');