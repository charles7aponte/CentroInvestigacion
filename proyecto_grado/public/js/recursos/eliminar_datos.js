

  var ID=null;
  var URL;
  var fila_info;

//eliminacion 
function eliminartipo(id){
  
  ID=id;
  $("#eliminar-confirmar").modal('show');

return false;

}




//eliminacion de los registros sub-tablas
function eliminacionremota(){
  $.ajax({
  url:URL+ID,
  type:'GET',
  dataType:"json",

  success: function (data){
    if(data.respuesta)
      {

        
        $(fila_info+ID).remove();
        if (actualizar_total) {
          actualizar_total();
        };
        



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

function verinfo(){
  
}

//ver descripcion en los mdoal
  function cargarmodal_descripcion(elemento){
  var $fila = $(elemento);
  var desc= $fila.attr("data-info"); 
  $('#contenido_modal').html(desc);
}



//ver descripcion en los mdoal
function cargarmodal_descripcion_lineas_sublineas(elemento){
  var $fila = $(elemento);
  var desc= $fila.attr("data-infodescripcionsublinea"); 
  $('#descripcion-sublinea').html(desc);


  var estado= $fila.attr("data-infoestado"); 
  $('#estado-sublinea').html(estado);


   var nombre= $fila.attr("data-infonombre"); 
  $('#myModalLabel').html(nombre);
  
}
