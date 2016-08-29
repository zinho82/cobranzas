    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>   
    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
    <script src="<?php echo BASE_URL ?>assets/js/moment.js"></script>
    <script src="<?php echo BASE_URL ?>assets/js/transition.js"></script>
    <script src="<?php echo BASE_URL ?>assets/js/collapse.js"></script>-
    <script src="<?php echo BASE_URL ?>assets/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="<?php  echo BASE_URL.MODULO_ACCESORIOS;?>DataTables/media/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL.MODULO_COBRANZA;?>/js/funcion.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL.MODULO_CAMPANA;?>js/campanas.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL.MODULO_ARCHIVOS ?>/js/archivos.js"></script>                 
    <script type="text/javascript" src="<?php echo BASE_URL.MODULO_ELASTIX ?>js/predictivo.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="<?php  echo BASE_URL.MODULO_PANEL?>js/dashboard.js"></script>
 
    <script src="<?php echo BASE_URL.MODULO_ppal ?>ppaljs.js"></script>
  <?php  echo '<script type="text/javascript">';?>

$(document).ready(function() {
 $j('#tabla').DataTable( {
        dom: 'T<"clear">lfrtip',
        tableTools:{
            "sSwfPath":"<?php echo BASE_URL.MODULO_ACCESORIOS?>DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
        }
    });});
<?php            
echo "</script>";
?>
<footer>Creado por Codigozeta</footer>
</body>
</html> 