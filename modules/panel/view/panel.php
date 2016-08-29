<?php require_once '../../ppal/superior.php';?>
<meta http-equiv="Refresh" content="30">
<div class="container"> 
    <div class="panel panel-primary">
        <div class="panel-heading"><i class="fa fa-dashboard"> Dashboard</i></div>
        <div class="panel-body">
                <div class="col-lg-3 col-md-3 row">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation"><a href="<?php BASE_URL.MODULO_PANEL ?>panel.php"><i class="fa fa-dashboard"> Dashboard</i></a></li>
                     </ul>
                </div> 
            <div class="col-lg-9">
                <div class="panel panel-info">
                    <div class="panel-heading"> Estado Campañas</div>
                    <div class="panel-body">
                        <table class="table">
                            
                       <?php  
                            Panel::ListaCampanas(3);
                       ?>
                        </tbody>
                        </table>
                             
                        <div id="grafica"></div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading"> Ventas o Compromiso de pago</div>
                    <div class="panel-body">
                       <?php  Panel::ListaCampanas(2);?>
                             
                        <div id="grafica"></div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading"> Contacto Positivo</div>
                    <div class="panel-body">
                       <?php  Panel::ListaCampanas(1);?>
                             
                        <div id="grafica"></div> 
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>
<?php require_once '../../ppal/footer.php';?>
