
  var ID_principal=null;
  var URL='formulariotipogrupo/eliminar/';
  var fila_info="#dato_tipogrupo_";


  function eliminartipogrupo(id){
    
    ID=id;
    $("#eliminar-confirmar").modal('show');

  return false;

  }

  function eliminacionremota(){
    $.ajax({
    url:URL+ID,
    type:'GET',
    dataType:"json",

    success: function (data){
      if(data.respuesta)
        {

          $(fila_info+ID).remove();

        }
      else{
        alert("No se pudo eliminar.");
      }

    }
    ,
    error: function(j,t,e){
      alert("");
    }
  });
    
    $("#eliminar-confirmar").modal('hide');    
  }
