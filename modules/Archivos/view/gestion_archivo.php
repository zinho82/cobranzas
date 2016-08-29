<?php
@session_start();
define("__ROOT__", "/var/www/html/cobranzas/"); 
define("MODULO_ARCHIVOS","modules/Archivos");  
define("MODULO_ARCHIVOS_req","modules/Archivos");  
//$ObjArchivos =new Archivos();
require_once __ROOT__.MODULO_ARCHIVOS_req ."/core/Archivos.php" ;
$ObjArchivos=new Archivos;
//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{

    //obtenemos el archivo a subir
echo     $file =  date('ymdGis').'_'.str_replace(' ','_',$_FILES['archivo']['name']);
echo "ruta ".$_POST['ruta'];
    //comprobamos si existe un directorio para subir el archivo 
    //si no es así, lo creamos
    if(!is_dir($_POST['ruta']."/archivos")) {
        mkdir($_POST['ruta']."/archivos/", 0777);
     echo " creando carpeta archivo ";
    }
echo "antes del si ";
echo  $_POST['ruta']."/archivos/";
    //comprobamos si el archivo ha subido
    if ( move_uploaded_file($_FILES['archivo']['tmp_name'],$_POST['ruta']."/archivos/". $file))  
    {
        echo "dentro del si";
        echo " guardando archivo ";
       sleep(3);//retrasamos la petición 3 segundos
       $ObjArchivos->guardar_archivo($file,$_POST['campana'],$_POST['proceso'],'1',$_FILES['archivo']['name']);
       echo " archivo guardado ";
       $_SESSION['resp']='ok';
       echo $file;//devolvemos el nombre del archivo para pintar la imagen
    }
    else{
        echo " archivo no cargado ";
    }
}else{
    throw new Exception("Error Processing Request", 1);   
}

