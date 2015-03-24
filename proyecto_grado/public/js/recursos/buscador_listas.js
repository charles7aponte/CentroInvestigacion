
function buscar_listas(){

  var buscar=$("#titulo_buscar").val();// tenemos titulo para buscar ..
  var direccion= $("#bton_buscar_titulo").attr("href")+""+buscar;
  $("#bton_buscar_titulo").attr("href",direccion);

  location.href= direccion;
  return false;

}
