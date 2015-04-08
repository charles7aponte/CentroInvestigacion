
  		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
  		function getColor(numero){

    	numero=numero%11;

	    switch(numero){
	      case 0:
	          return "#D0E20E";
	        break;
	      case 1:
	          return "#E25F0E";
	        break;
	      case 2:
	          return "#0EE2C6";
	        break;
	      case 3:
	          return "#660EE2";
	        break;
	      case 4:
	          return "#4DF400";
	        break;
	      case 5:
	          return "#0E3FE2";
	        break;
	      case 6:
	          return "#E20E0E";
	        break;
	      case 7:
	          return "#E20E6A";
	        break;
	      case 8:
	          return "#0B9A44";
	        break;   
	      case 9:
	          return "#F5C30C";
	        break; 
	      case 10:
	          return "#794222";
	        break;    
	      case 11:
	          return "#FF0051";
	        break;                                                
	    }
	  }
 