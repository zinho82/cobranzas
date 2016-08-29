
var $j = jQuery.noConflict();
$j(document).ready(function() {
     $j('#numcarga').prop('disabled',true);
    $j('#archivo').change(function(){
        var dataString = $('#formulario').serialize();
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
    });