@extends('panel_cuerpo')

	@section('css-nuevos')
    	{{-- datepicker --}}
    	<link rel="stylesheet" href="{{URL::to('css/')}}/datepicker.css">
    	<link rel="stylesheet" type="text/css" href="{{URL::to('css/core.css')}}">
	@stop


	@section('javascript-nuevos')
		<script src="{{URL::to('js/jquery-1.3.min.js')}}" type="text/javascript"></script>
    	<script src="{{URL::to('js/jMonthCalendar.min.js')}}" type="text/javascript"></script>
		<script src="{{URL::to('js/jMonthCalendar.js')}}" type="text/javascript"></script>
    @stop	

	@section('contenido-principal') 


	<div id="slider1" style="width:800px;">
		<div class="wrap">
		    <div id="slide-holder">
		        <div id="slide-img" >
			        <a href=""><img id="slide-img-1" src="images/slider-fotos/2.png" class="slide" alt="" /></a>
			        <a href=""><img id="slide-img-2" src="images/slider-fotos/2.png" class="slide" alt="" /></a>
			       
			        <a href=""><img id="slide-img-4" src="images/slider-fotos/2.png" class="slide" alt="" /></a>
			        <a href=""><img id="slide-img-5" src="images/slider-fotos/2.png" class="slide" alt="" /></a>
			        <a href=""><img id="slide-img-6" src="images/slider-fotos/2.png" class="slide" alt="" /></a>
			        <a href=""><img id="slide-img-7" src="images/slider-fotos/2.png" class="slide" alt="" /></a> 
		        </div>
	            <!--contenido del slider -->
	            <div class="botones-slider">
		            <div id="slide-controls">
		            	<p id="slide-nav"></p>
		            </div>
	            </div>
            	<div id="slide-controls1">
        			<div id="cuadro">
        				<p id="slide-client" class="text"><span></span></p>
        			</div>
		        </div> 
		    </div>
		</div>
	</div>

	<!--Parte de abajo del slider-->
	<div id="contenedor-cuerpo-principal">
		<div class="row">
			<div class="col-md-8" >
				<aside id="eventos-principal">
					<div id="enunciado"><p>Calendario de Eventos</p></div> 
					<div class="calendario">
						<div id="jMonthCalendar"></div> 
					</div>
					<a href="{{URL::to('/')}}/listadeeventosinv/evento">
					<div class="ver-todo">
						  ver todos los eventos <span class="glyphicon glyphicon-plus-sign"></span>
					</div>
					</a>
				</aside>
			</div>

		  <div class="col-md-4">	
			<aside class="noticias" >
				<div id="enunciado"><p>Noticias</p></div> 
				<div id="cargar-noticias">
					@foreach($lista_noticias as $lista_noticia)
						<div class="noticias-principal">
						   <h4>{{$lista_noticia['titulo_evento']}}</h4>
					   		<span>{{InvEventosNoticias::formato_fecha($lista_noticia['fecha'],"mes")}}
						   		  {{InvEventosNoticias::formato_fecha($lista_noticia['fecha'],"dia")}} de
			          			  {{InvEventosNoticias::formato_fecha($lista_noticia['fecha'],"a")}}
			          		</span>
			            </div>  		
					   	<p align="justify">{{substr($lista_noticia['descripcion'],0,200)}} 	
					   	<span class="readmore"><a href="#">Leer mas..</a></span></p>
				   	@endforeach
	   				<div class="ver-todo-otros">ver todas las noticias <span class="glyphicon glyphicon-plus-sign"></span></div>
				</div>
			</aside>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
		   <div id="enunciado1"><p>Convocatorias</p></div>
				<div class="container-fluid" id="mycarouselBase">
					<div class="row-fluid">
						<div class="span12">        
							<div class="carousel slide" id="myCarousel">
				    			<div class="carousel-inner">
								@for($i=0; $i<count($lista_convocatorias);$i=$i+3)

							        <div class="item {{$i==0? 'active' :'' ;}}">
							                <ul class="thumbnails">
							                	@if(isset($lista_convocatorias[$i]))
								                    <li class="span3">
								                        <div class="caption" id="convocatoria">
								            				<p align="center">{{$lista_convocatorias[$i]['titulo_convocatoria']}}</p>
								            				<span> Apertura: {{InvConvocatorias::formato_fecha($lista_convocatorias[$i]['fecha_apertura'],"mes")}}
													   		  {{InvConvocatorias::formato_fecha($lista_convocatorias[$i]['fecha_apertura'],"dia")}} de
							                      			  {{InvConvocatorias::formato_fecha($lista_convocatorias[$i]['fecha_apertura'],"a")}}
							                      			</span>
								                            <div class="readmore"><a href="#">Leer mas..</a></p> 
								                        </div>
								                    </li>
							                    @endif

							                	@if(isset($lista_convocatorias[$i+1]))
								                    <li class="span3">
								                        <div class="caption" id="convocatoria">
								            				<p align="center">{{$lista_convocatorias[$i+1]['titulo_convocatoria']}}</p>
								            				<span> Apertura: {{InvConvocatorias::formato_fecha($lista_convocatorias[$i]['fecha_apertura'],"mes")}}
													   		  {{InvConvocatorias::formato_fecha($lista_convocatorias[$i+1]['fecha_apertura'],"dia")}} de
							                      			  {{InvConvocatorias::formato_fecha($lista_convocatorias[$i+1]['fecha_apertura'],"a")}}
							                      			</span>
								                            <div class="readmore"><a href="#">Leer mas..</a></p> 
								                        </div>
								                    </li>
							                    @endif

							                    @if(isset($lista_convocatorias[$i+2]))
								                    <li class="span3">
								                        <div class="caption" id="convocatoria">
								            				<p align="center">{{$lista_convocatorias[$i+2]['titulo_convocatoria']}}</p>
								            				<span> Apertura: {{InvConvocatorias::formato_fecha($lista_convocatorias[$i]['fecha_apertura'],"mes")}}
													   		  {{InvConvocatorias::formato_fecha($lista_convocatorias[$i+2]['fecha_apertura'],"dia")}} de
							                      			  {{InvConvocatorias::formato_fecha($lista_convocatorias[$i+2]['fecha_apertura'],"a")}}
							                      			</span> 
								                        </div>
								                        <div class="readmore"><a href="#">Leer mas..</a></p>
								                    </li>
							                    @endif
							                </ul>
							          </div><!-- /Slide1 --> 
							    @endfor      
				    		</div>
						    <div class="control-box">                            
						        <a data-slide="prev" href="#myCarousel" class="carousel-control left">‹</a>
						        <a data-slide="next" href="#myCarousel" class="carousel-control right">›</a>
						    </div><!-- /.control-box -->  
						    						    <div class="ver-todo-otros">
						  		ver todos las convocatorias <span class="glyphicon glyphicon-plus-sign"></span>
							</div>  
						</div><!-- /#myCarousel -->    
					</div><!-- /.span12 -->          
				</div><!-- /.row --> 
			</div><!-- /.container -->
		</div>    
	</div>	
</div>

 <!--fin holder-->	
@stop

@section('javascript-nuevos2') 
	<script type="text/javascript">
		       // $().ready(function() {
				
					var options = {
						height: 300,
						width: 550,
						navHeight: 25,
						labelHeight: 25,
						onMonthChanging: function(dateIn) {

							return true;
						},
						onEventLinkClick: function(event) { 
							return true; 
						},
						onEventBlockClick: function(event) { 
							
							location.href=""+event.URL;
							

							return true; 
						},
						onEventBlockOver: function(event) {
							//alert(event.Title + " - " + event.Description);
							return true;
						},
						onEventBlockOut: function(event) {
							return true;
						},
						onDayLinkClick: function(date) { 
							alert(date.toLocaleDateString());
							return true; 
						},
						onDayCellClick: function(date) { 
							alert(date.toLocaleDateString());
							return true; 
						}
					};
					

					var events = [ 	
					
					@foreach ($info_eventos as $eventico)
						{ 
						"EventID": {{$eventico["id_evento"]}}, 
						"StartDateTime": new Date({{InvEventosNoticias::formato_fecha2($eventico["fecha"],"y")}}, {{(InvEventosNoticias::formato_fecha2($eventico["fecha"],"m")-1)}}, {{InvEventosNoticias::formato_fecha2($eventico["fecha"],"d")}}), 
						"Title": "Evento",
						 "URL": "{{URL::to('/')}}/listade/evento/{{$eventico['fecha']}}", 
						 "Description": "", 
						 "CssClass": "Event" 
						},
					@endforeach
						
					];

					
					var newoptions = { };
					var newevents = [ ];
					//$.jMonthCalendar.Initialize(newoptions, newevents);
					
					$.jMonthCalendar.Initialize(options, events);
					
					var extraEvents = [	{   "EventID": 5, 
											"StartDateTime": new Date(1992, 3, 11), 
											"Title": "10:00 pm - EventTitle1", 
											"URL": "#", "Description": 
											"evento", 
											"CssClass": "Event" 
									},
										{ 	"EventID": 6, 
											"StartDateTime": new Date(1992, 3, 20), 
											"Title": "EVENTO", 
											"URL": "#", 
											"Description": " ", 
											"CssClass": "Event" 
									}
					];



  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 6000
    })
  });

		
	</script>
@stop

			