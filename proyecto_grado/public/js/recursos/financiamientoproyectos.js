
$("#verfinanciamiento").click(function(){


var idP= $("#nombre_proyecto1").val();

        $.ajax(
            {
                type:"GET" 
                ,url: "servicios/financiamientoPorProyecto/"+idP+"/", 
                success: function(result){
                     
                     var mihtml=""; 
                     var total=0;


                     for(var i=0; i< result.length; i++ )
                     {

                      total+=parseFloat(result[i].valor_financiado);
                      console.log(total);
                      mihtml+= crearfilafinanciamientoproyecto(result[i]);
                      
                     }
                     mihtml+= mostrartotal(total);

                     if(result.length==0)
                     {
                        $("#mensaje_de_vacio").show();

                     }
                     else{
                        $("#mensaje_de_vacio").hide();
                                            
                     }

                     $("#cuerpo_tabla_finaciamiento").html(mihtml); 
                     $("#nombre-proyecto").html(nombreproyecto);
                     $("#nombre_proyecto").val("");

                }
              ,error:function(){

              }
              ,dataType:'json'
            });

});


//cargar info en el modal
function pasarContenidoAModa(miBoton){

  var $bton= $(miBoton);
  var $fila = $bton.parent().parent();


  var info= $bton.attr("data-descripcion");

$("#descripcion-financimiento").html(info);



}


function crearfilafinanciamientoproyecto(proyecto){

    var html ="<tr id='principal"+proyecto.id_financiacion+"'> "

      +"  <td style='width:90px;'>"+proyecto.fecha+"</td> "
      +"  <td style='width:300px; margin-right:5px;'>"+proyecto.nombre_empresa+" </td> "
      +"  <td style='width:100px; margin-rigth:5px;'>"+proyecto.modo_financiamiento+" </td>"
      +"  <td style='width:90px; margin-left:5px;'>"+"$"+proyecto.valor_financiado+" </td>"
      +"  <td style='width:120px;'> "


      //MODAL
      +"    <button type='button' class='btn btn-primary btn-lg' data-toggle='modal' onclick='pasarContenidoAModa(this)' "
      +" data-descripcion='"+proyecto.descripcion_financiamiento+"' "  
      +" data-target='#myModal'  style='height:30px; width:120px; background:#E3E7E5;border-color:#E3E7E5; margin-right:15px; font-size:12px; color:#333;'> "
      +"     Ver descripción "
      +"    </button> "

          //MODAL
      +"    <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>"
      +"      <div class='modal-dialog'>"
      +"        <div class='modal-content'>"
      +"          <div class='modal-header'>"
      +"            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>"
      +"           <h4 class='modal-title' id='myModalLabel' style='background:none;'><b>Descripción</b></h4>"
      +"         </div>"
      +"         <div class='modal-body'>"

      +"          </div>"
      +"          <div class='modal-footer'>"
      +"            <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>"
      +"          </div>"
      +"        </div>"
      +"      </div>"
      +"    </div>"
      +"  </td>"
      +"  <td style='width:100px;'>"
      +"  <b onclick=\"eliminartipo('"+proyecto.id_financiacion+"')\">"
      +"    <a href='#' onclick=\"return false\" class='button'><span class='glyphicon glyphicon-trash'></span>Eliminar</a>"
      +"   </b>"
      +"  </td>"
      +"</tr>"

return html;
}


function mostrartotal(total){
   var html1 ="<tr>"

      +"  <td style='width:90px;'></td> "
      +"  <td style='width:300px; margin-right:5px;'></td> "
      +"  <td style='width:100px; margin-rigth:5px; font-weight:bold;'>Total</td>"
      +"  <td style='width:90px; margin-left:5px; font-weight:bold;'>"+"$"+total+" </td>"
      +"  <td style='width:120px;'> </td>"
      +"  <td style='width:100px;'> </td>"
      +"  </tr>"

      return html1;
}