function eliminar(id,tabla,base,accion){
    var ced = "id="+id+"|"+tabla+"|"+base+"|"+accion; 
   // alert(ced);
    $j.ajax({
		url:"http://192.168.205.129/callcenter2/view/acciones.php",
		data: ced,
		type: "POST",
		success:
                    function(){
                      
                        window.alert("Se ha eliminado el registro");
                        location.reload();
                        
                    },
                error:
                        function(){
                            window.alert("Error no se pudo eliminar el registro");
                        }
                                          
            });
}
var $j = jQuery.noConflict();
$j(document).ready(function() {
     
    $j('#Enviar').click(function(){
        var dataString = $('#form_empresa').serialize();
        $.ajax({
            type: "POST",
            url: "add_empresa.php",
            data: dataString,
            success: function() {
                alert(" Empresa Creada");
                location.reload();
            },
            error: function(){
                alert("No se pudo Crear la Empresa");
            }
        });
    });
    $j('#buscar').click(function(){
        var dataString = $('#buscar_form').serialize();
        document.getElementById('cargando').style.display='block';
        $j.ajax({
            type: "POST",
            url: "buscar.php",
            data: dataString,
            success: function(respuesta) {
             
             $("#resultado").html(respuesta);
            
            },
            error: function(){
                alert("Error al buscar la informacion");
            }
        });
         document.getElementById('cargando').style.display='none';
    });
    $j('#campanas').change(function(){
        var dataString = $('#buscar_form').serialize();
        $j.ajax({
            type: "POST",
            url: "http://192.168.235.128/callcenter2/view/plantilla/cargar_campana.php",
            data: dataString,
            success: function() {
               // location.reload();
            },
            error: function(){
                alert("Error buscando Numeros de carga");
            }
        });
    });
    $j('#campanas_venta').change(function(){
        var dataString = $('#buscar_form').serialize();
        $j.ajax({
            type: "POST",
            url: "../plantilla/cargar_campana.php",
            data: dataString,
            success: function() {
                location.reload();
            },
            error: function(){
                alert("Error buscando Numeros de carga");
            }
        });
    });
    $j('#tablas').DataTable( {
        dom: 'T<"clear">lfrtip',
        tableTools:{
            "sSwfPath":"<?php echo BASE_URL;?>fx/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
        }
    });
    $("#desde").datepicker({
                dateFormat: "yy/mm/dd",
                dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
                dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
                firstDay: 1,
                gotoCurrent: true,
                monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Deciembre" ]
            });
    $("#hasta").datepicker({
                dateFormat: "yy/mm/dd",
                dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
                dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
                firstDay: 1,
                gotoCurrent: true,
                monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Deciembre" ]
            });
    $('#buscar_mes').click(function(){
        var dataString = $('#buscar_form').serialize();
        //document.getElementById('cargando').style.display='block';
        $j.ajax({
            type: "POST",
            url: "llenar_pc.php",
            data: dataString,
            success: function(respuesta) {
             location.reload()
             $("#resultado").html(respuesta);
             
            },
            error: function(){
                alert("Error al buscar la informacion");
            }
        });
         document.getElementById('cargando').style.display='none';
    });
    $('#buscar_ventas').click(function(){
        var dataString = $('#buscar_form').serialize();
        //document.getElementById('cargando').style.display='block';
        $j.ajax({
            type: "POST",
            url: "llenar_ventas.php",
            data: dataString,
            success: function(respuesta) {
             $("#resultado").html(respuesta);
             
            },
            error: function(){
                alert("Error al buscar la informacion");
            }
        });
         document.getElementById('cargando').style.display='none';
    });
    $('#excel_pc').click(function(){
        var dataString = $('#buscar_form').serialize();
        //document.getElementById('cargando').style.display='block';
        $j.ajax({
            type: "POST",
            url: "excelpc.php",
            data: dataString,
            success: function(respuesta) {
            
             $("#resultado").html(respuesta);
             // location.reload();
            },
            error: function(){
                alert("Error al buscar la informacion");
            }
        });
         document.getElementById('cargando').style.display='none';
    });
 
alert('jQuery is working');
});
