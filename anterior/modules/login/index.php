

    <body>
        <div id="form_login_espacio">
            <div id="form_login_div">
                <img src="<?php echo BASE_URL.MODULO_LOGIN?>img/logo.png" width="500">
                <form id="form_login" method="post" action="">
                <input type="text" placeholder="Usuario" name="usuario">
                <input type="password" placeholder="Clave" name="pass">
                <input type="submit" id="ingresar" name="ingresar" value="Ingresar">
                
            </form>
            </div>
        </div>
    </body>
</html> 
<?php
if(($_POST['usuario'])&&$_POST['pass']){
    
    $ObjLogin=new login();
    $ObjLogin->login_verificar($_POST['usuario'], $_POST['pass'],BASE_BBDD);
    var_dump( $_SESSION);
//header('Location: '.BASE_URL);
}
?>

