<script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script> 
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo BASE_URL.MODULO_ACCESORIOS;?>DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL.MODULO_ACCESORIOS;?>DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL.MODULO_ACCESORIOS;?>DataTables/extensions/TableTools/js/dataTables.tableTools.js"></script> 
<script type="text/javascript" src="<?php echo BASE_URL.MODULO_ELASTIX;?>js/funciones.js"></script> 


<?php
echo '<script type="text/javascript">';?>

$(document).ready(function() {
 $('#tabla').DataTable( {
        dom: 'T<"clear">lfrtip',
        tableTools:{
            "sSwfPath":"<?php echo BASE_URL.MODULO_ACCESORIOS?>DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
        }
    });});
<?php            
echo "</script>";
?>