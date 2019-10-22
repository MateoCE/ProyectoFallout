var contadorVidas= 4;

function enviarDatos() {
	var jsName = nombreJugador;
	var jsTime = puntuacionSegundos;
	var jsTries = contadorVidas;
	window.location.href = "menuPrincipal.php" + "?name=" + jsName + "&time=" + jsTime + "&tries=" + jsTries ;
}

function pedirNombre(){
	var nombre = prompt("Introduce tu nombre");
	if (nombre == null || nombre == ""){
		nombre = "Jugador";
		}
	return nombre;	
}

function irMenuPrincipal(){

	window.location.href = ("menuPrincipal.php")

}

function comprovarContrasena(palabra){
	//Comprobamos si el ID son puntos
	if (palabra[0]!=".") {
		//Comprobamos si es la contraseña
		var contrasenaScript = document.getElementById('contrasena').innerHTML;
		if(palabra==contrasenaScript){
			document.getElementById('contenedorPrincipal').innerHTML="";
			document.getElementById('mainPalabras').innerHTML="";
			document.getElementById('victoria').style.display="block";
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
				document.getElementById('derrota').style.display="block";
			}
		}	
	}
}




var anadirFinal = document.getElementById('bloquepalabras2').innerHTML.slice(0, 4);
document.getElementById('bloquepalabras2').innerHTML=document.getElementById('bloquepalabras2').innerHTML.slice(4, document.getElementById('bloquepalabras2').innerHTML.length);
document.getElementById('bloquepalabras2').innerHTML+=anadirFinal;


var segundos = 0;
var minutos = 0;
var puntuacionSegundos = 0;
var marcador = document.getElementById("tiempo");
window.setInterval(function(){
	puntuacionSegundos++;
 	segundos++;
 	if (segundos<10) {
 		if (minutos<10) {
 			marcador.innerHTML = "0"+minutos+":0"+segundos;
 		}else{
			marcador.innerHTML = minutos+":0"+segundos;
 		}
 	}else{
 		if (minutos<10) {
 			marcador.innerHTML = "0"+minutos+":"+segundos;
 		}else{
			marcador.innerHTML = minutos+":"+segundos;
 		}
 	}
 	if (segundos==59) {
 		minutos++;
 		segundos=-1;
 	}
},1000);