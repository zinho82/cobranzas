
var $j = jQuery.noConflict();
$j(document).ready(function() {
    
     $j('#segundo_select').prop('disabled',true);
     $j('#tercero_select').prop('disabled',true);
     $j('#btn_guardar').prop('disabled',true);
      $j('#datetimepicker2').datetimepicker({
          format:'YYYY/MM/DD'
            });
     $("#btn_guardar").click(function(){
      var url = "guarda_Gestion.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#gestiones").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               alert(data);
               $("#respuesta").html(data); // Mostrar la respuestas del script PHP.
           },
            error: function(){
                alert("Error al Guardar");
            }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
    $j('#primer_select').change(function(){
        var dataString = $('#gestiones').serialize();
        $j.ajax({
            type: "POST",
            url: "../view/select_sincro.php",
            data: dataString,
            success: function(respuesta) {
             $j('#segundo_select').prop('disabled',false);
             $j("#segundo_select").html(respuesta);
            },
            error: function(){
                alert("Error al buscar la informacion");
            }
        });
    });
    $j('#segundo_select').change(function(){
        var dataString = $('#gestiones').serialize();
        $j.ajax({
            type: "POST",
            url: "../view/select_sincro2.php",
            data: dataString,
            success: function(respuesta) {
             $j('#tercero_select').prop('disabled',false);
             $j("#tercero_select").html(respuesta);
             $j('#btn_guardar').prop('disabled',false);
            },
            error: function(){
                alert("Error al buscar la informacion");
            }
        });
    });
     $("#llamar").click(function(){
      var url = "../view/llamar.php"; // El script a dónde se realizará la petición.
    $.ajax({ 
           type: "POST",
           url: url,
           data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               //alert(data);
               $("#llamados").html(data); // Mostrar la respuestas del script PHP.
           },
            error: function(){
                alert("Error al Llamar");
            }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
   
    //alert('jQuery is working');
});
function telefonos(idcliente){
     user=document.getElementById("idcliente"); 
window.open("EditarFono.php?usuario="+idcliente); 
}
