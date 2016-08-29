
var $j = jQuery.noConflict();
$j(document).ready(function() {
     $j('#numcarga').prop('disabled',true);
     $j('#campana').change(function(){
        var dataString = $('#formularios').serialize();
        $j.ajax({
            type: "POST",
            url: "../view/select_sincro.php",
            data: dataString,
            success: function(respuesta) {
             $j('#numcarga').prop('disabled',false);
             $j("#numcarga").html(respuesta);
            },
            error: function(){
                alert("Error al buscar la informacion");
            }
        });
    });
    $j('#todoslosnumeros').change(function(){
        var dataString = $('#formularios').serialize();
        $j.ajax({
            type: "GET",
            url: "../view/enviar_numeros.php",
            data: dataString,
            success: function(respuesta) {
            alert("datos enviados");
            },
            error: function(){
                alert("Error al buscar la informacion");
            }
        });
    });
    //alert('trabaja jquery');
    });