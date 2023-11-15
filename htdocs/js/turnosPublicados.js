$(document).ready(function(){
    var categorias = $('#categoria');
    var disco_sel = $('#categoria_sel');
    
    //Ejecutar accion al cambiar de opcion en el select de las bandas
    $('#departamento').change(function(){
      var depto_id = $(this).val(); //obtener el id seleccionado

      if(depto_id !== '') { //verificar haber seleccionado una opcion valida
        //alert('Cambio de grupo detectado... llamamos al programa get_discos.php pasandole la banda seleccionada');

        /*Inicio de llamada ajax*/
        $.ajax({
          data: {depto_id:depto_id}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
          dataType: 'html', //tipo de datos que esperamos de regreso
          type: 'POST', //mandar variables como post o get
          url: 'get_categorias.php' //url que recibe las variables
        }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             
          //alert('el pgm get_discos.php nos devuelve los discos asociados al grupo seleccionado y con ello rehacemos el contenido del elemento discos de tipo select'+data);
          /* alert(data); */
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