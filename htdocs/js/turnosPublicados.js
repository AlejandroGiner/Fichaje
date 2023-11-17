$(document).ready(function(){
    var categorias = $('#categoria');
    
  //Ejecutar accion al cambiar de opcion en el select de los departamentos
  $('#departamento').change(function(){
    var depto_id = $(this).val(); //obtener el id seleccionado

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

  $('.modal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
  });

  $('.btn-modificar-modal').click(function() {
    var id_categoria = $(this).attr('data-id-categoria');
    $.ajax({
      data: {id_categoria:id_categoria},
      dataType: 'html',
      type: 'POST',
      url: '/scripts/turnos_publicados/get_empleados.php'
    }).done(function(data){
      console.log(data);
      $('#empleado').html(data);
    });

    $('#id_turno_publicado').val($(this).attr('data-id-turno-publicado'));

  });

  $('.btn-eliminar-modal').click(function(){
    // poner id turno publicado en modal hidden input
  });

});
