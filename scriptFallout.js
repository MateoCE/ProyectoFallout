var contadorVidas= 4;
function pedirNombre(){
	var nombre = prompt("Introduce tu nombre");
	if (nombre == null || nombre == ""){
		nombre = "Jugador";
		}
	return nombre;	
}
function comprovarContrasena(palabra){
	//Comprobamos si el ID son puntos
	if (palabra[0]!=".") {
		//Comprobamos si es la contraseña
		var contrasenaScript = document.getElementById('contrasena').innerHTML;
		if(palabra==contrasenaScript){
			document.getElementById('contenedorPrincipal').innerHTML="";
			document.getElementById('mainPalabras').innerHTML="";
			document.getElementById('victoria').innerHTML=">Correct password.";
			nombreJugador=pedirNombre();


		//Si no es la contraseña entramos
		}else{
			//Restamos vida
			contadorVidas=contadorVidas-1;
			if (contadorVidas>0) {
				var Vidas=  "&squf; ".repeat(contadorVidas);
				document.getElementById('intentos').innerHTML = "Attempts Remaining: "+ Vidas;
				
				//Contador coincidencias comparando con la contraseña
				var contadorLetras=0;
				for (var i = 0; i < palabra.length; i++) {
					if (palabra[i]==contrasenaScript[i]) {
						contadorLetras+=1;
					}
				}

				//Actualizamos prompt con nombre de palabra clickada y coincidencias
				document.getElementById('bloqueFijo3').innerHTML+=">"+palabra+"<br/>"+">Entry denied."+"<br/>"+">Likeness="+contadorLetras+"<br/>";
					
				//Creamos string con puntos y <br> si es necesario
				var strSoloConBr = document.getElementById(palabra).innerHTML;
				var strPuntos = "";
				for (var i = 0; i < strSoloConBr.length; i++) {
					if (strSoloConBr[i]=="<") {
						strPuntos+="<br/>";
						i+=3;
					}else{
						strPuntos+=".";
					}
				}

				//Cambiamos la palabra clickada por puntos
				document.getElementById(palabra).innerHTML=strPuntos;
				//Cambiamos clase de la palabra
				document.getElementById(palabra).className="puntos";
				//Cambiamos id de la plabra
				document.getElementById(palabra).id=strPuntos;
			}else{
				document.getElementById('contenedorPrincipal').innerHTML="";
				document.getElementById('mainPalabras').innerHTML="";
				document.getElementById('derrota').innerHTML="Terminal closed"
			}
		}	
	}
}




var anadirFinal = document.getElementById('bloquepalabras2').innerHTML.slice(0, 4);
document.getElementById('bloquepalabras2').innerHTML=document.getElementById('bloquepalabras2').innerHTML.slice(4, document.getElementById('bloquepalabras2').innerHTML.length);
document.getElementById('bloquepalabras2').innerHTML+=anadirFinal;