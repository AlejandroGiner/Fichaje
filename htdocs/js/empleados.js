$(document).ready(function(){
$('#departamento').change(function(){
    var depto_id = $(this).val(); //obtener el id seleccionado
    var categorias = $('#categoria1');

    if(depto_id !== '') { //verificar haber seleccionado una opcion valida

      $.ajax({
        data: {depto_id:depto_id}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
        dataType: 'html', //tipo de datos que esperamos de regreso
        type: 'POST', //mandar variables como post o get
        url: '/scripts/turnos_publicados/get_categorias.php' //url que recibe las variables
      }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             
        categorias.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax             
        categorias.prop('disabled', false); //habilitar el select
      });
      /*fin de llamada ajax*/

    }else{ //en caso de seleccionar una opcion no valida
        categorias.val(''); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
        categorias.prop('disabled', true); //deshabilitar el select
    }     
  });
});