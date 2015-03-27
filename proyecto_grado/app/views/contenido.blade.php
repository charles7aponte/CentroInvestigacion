@extends('panel_cuerpo')

	@section('css-nuevos')
    	{{-- datepicker --}}
    	<link rel="stylesheet" href="{{URL::to('css/')}}/datepicker.css">
	@stop


@section('contenido-principal')
	    				
	<div id="slider1">
		<div class="wrap">
		    <div id="slide-holder">
		        <div id="slide-img">
			        <a href=""><img id="slide-img-1" src="images/slider-fotos/2.png" class="slide" alt="" /></a>
			        <a href=""><img id="slide-img-2" src="images/slider-fotos/2.png" class="slide" alt="" /></a>
			        <a href=""><img id="slide-img-3" src="images/slider-fotos/2.png" class="slide" alt="" /></a>
			        <a href=""><img id="slide-img-4" src="images/slider-fotos/2.png" class="slide" alt="" /></a>
			        <a href=""><img id="slide-img-5" src="images/slider-fotos/1.jpg" class="slide" alt="" /></a>
			        <a href=""><img id="slide-img-6" src="images/slider-fotos/2.png" class="slide" alt="" /></a>
			        <a href=""><img id="slide-img-7" src="images/slider-fotos/1.jpg" class="slide" alt="" /></a> 
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

	<div id="sidebar1" class="row1">
		<div class="col-md-4">
		    <ul>
			<li>
				<h2>Convocatorias</h2>
				<ul>
					<li><a href="#">Aliquam libero</a></li>
					<li><a href="#">Consectetuer adipiscing elit</a></li>
					<li><a href="#">Metus aliquam pellentesque</a></li>
					<li><a href="#">Suspendisse iaculis mauris</a></li>
					<li><a href="#">Proin gravida orci porttitor</a></li>
					<li><a href="#">Aliquam libero</a></li>
					<li><a href="#">Consectetuer adipiscing elit</a></li>
					<li><a href="#">Metus aliquam pellentesque</a></li>
					<li><a href="#">Suspendisse iaculis mauris</a></li>
					<li><a href="#">Proin gravida orci porttitor</a></li>
				</ul>
					<p class="links"><a href="#" class="more">&laquo;&laquo;&nbsp;&nbsp;ver todas&nbsp;&nbsp;&raquo;&raquo;</a></p>
		|	</li> 
		</div>				
	</div>

	<div class="row2">
		
		<div class="col-md-3 col-md-offset-3">
					
			<h3>Bulleted List:</h3>
				<ul>
					<li><a href="#">Telecomunicaciones</a></li>
					<li><a href="#">Software</a></li>
					<li><a href="#">Desarrollo web</a></li>
				</ul>
					<p class="links"><a href="#" class="more">&laquo;&laquo;&nbsp;&nbsp;Read More&nbsp;&nbsp;&raquo;&raquo;</a></p>
			<h3>Noticias:</h3>
				<ol>
					<li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
					<li>Phasellus nec erat sit amet nibh pellentesque congue.</li>
					<li>Cras vitae metus aliquam risus pellentesque pharetra.</li>
				</ol>
					<p class="links"><a href="#" class="more">&laquo;&laquo;&nbsp;&nbsp;Read More&nbsp;&nbsp;&raquo;&raquo;</a></p>
		</div>
	</div>

	<div class="row">
		<div>
			<li id="calendar">
				<h2>Calendar</h2>
				<div id="calendar_wrap">
					<table id="wp-calendar" summary="Calendar">
						<caption>
							August 2007
						</caption>
						<thead>
							<tr>
								<th abbr="Monday" scope="col" title="Monday">M</th>
								<th abbr="Tuesday" scope="col" title="Tuesday">T</th>
								<th abbr="Wednesday" scope="col" title="Wednesday">W</th>
								<th abbr="Thursday" scope="col" title="Thursday">T</th>
								<th abbr="Friday" scope="col" title="Friday">F</th>
								<th abbr="Saturday" scope="col" title="Saturday">S</th>
								<th abbr="Sunday" scope="col" title="Sunday">S</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td abbr="July" colspan="3" id="prev"><a href="#">&laquo; Jul</a></td>
								<td class="pad">&nbsp;</td>
								<td abbr="September" colspan="3" id="next" class="pad"><a href="#">Sep &raquo;</a></td>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td colspan="2" class="pad">&nbsp;</td>
								<td>1</td>
								<td>2</td>
								<td>3</td>
								<td>4</td>
								<td>5</td>
							</tr>
							<tr>
								<td>6</td>
								<td>7</td>
								<td>8</td>
								<td>9</td>
								<td>10</td>
								<td>11</td>
								<td>12</td>
							</tr>
							<tr>
								<td>13</td>
								<td>14</td>
								<td>15</td>
								<td>16</td>
								<td>17</td>
								<td>18</td>
								<td>19</td>
							</tr>
							<tr>
								<td>20</td>
								<td id="today">21</td>
								<td>22</td>
								<td>23</td>
								<td>24</td>
								<td>25</td>
								<td>26</td>
							</tr>
							<tr>
								<td>27</td>
								<td>28</td>
								<td>29</td>
								<td>30</td>
								<td>31</td>
								<td class="pad" colspan="2">&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
			</li>
		<div>
	</div>		
@stop
			