var $j = jQuery.noConflict();
$j(document).ready(function() {
     
    $j('#ncampana').change(function(){
        var dataString = $('#campanas').serialize();
        $j.ajax({
            type: "POST",
            url: "cargar_campana.php",
            data: dataString,
            success: function(respuesta) {
             
             $("#ncarga").html(respuesta);
            },
            error: function(){
                alert("Error al buscar la informacion");
            }
        });
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
    $('#excel_rsa').click(function(){
        var dataString = $('#buscar_form').serialize();
        //document.getElementById('cargando').style.display='block';
        $j.ajax({
            type: "POST",
            url: "excelrsa.php",
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
//alert('jQuery is working');
});