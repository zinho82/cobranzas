<!DOCTYPE html>
<?php 
    require_once '../../ppal/Config.php';
     
?> 
<?php
if($_SESSION['on']!=TRUE){
    session_start(); 
    $_SESSION['on']=TRUE;
}
ini_set('max_execution_time', 900);
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>InsideGroup V2</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo  BASE_URL.MODULO_ACCESORIOS?>DataTables/extensions/TableTools/css/dataTables.tableTools.css" />
    <link rel="stylesheet" href="<?php echo  BASE_URL.MODULO_ACCESORIOS?>DataTables/media/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/bootstrap_datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/estilo.css"> 
  </head>
  <body>
  	<?php    require_once (__ROOT__.'/modules/menu/view/menu.php');?>