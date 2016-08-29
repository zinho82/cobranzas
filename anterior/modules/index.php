<?php require_once 'ppal/config.php';?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        require_once 'ppal/includes.php';
        require_once 'ppal/css.php';
        require_once 'ppal/js.php';
        
        ?>
    </head>
    <?php 
        if(!isset($_SESSION['usuario']['id_usuario'])){
            var_dump($_SESSION);
            require_once __ROOT__.'/'.MODULO_LOGIN.'index.php';
        }
        else{
            var_dump($_SESSION);
        }
    ?> 
   