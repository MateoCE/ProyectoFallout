var contadorVidas=4;
var dalt=0;
var palabraAnterior = 30;
var modoHardcore= false;
var dificultad = document.getElementById("difficulty").value;

if(document.getElementById("hardcore") != null){

	modoHardcore = true;

}

function daltonico() {
    if (dalt==0) {
    	document.getElementById('documento').style.color = "white";
    	document.getElementById('tiempo').style.color = "white";
    	document.getElementById('daltonico').innerHTML = "Colorblind: ON";
    	dalt+=1;
    }else{
    	document.getElementById('documento').style.color = "green";
    	document.getElementById('tiempo').style.color = "green";
    	document.getElementById('daltonico').innerHTML = "Colorblind: OFF";
    	dalt-=1;
    }
}


function irMenuPrincipal(){

	window.location.href = ("menuPrincipal.php")

}

function vidasRestantes(simbolo){
	if(simbolo=="-"){
		contadorVidas=contadorVidas-1;
			if (contadorVidas>0) {
				var Vidas=  "&block; ".repeat(contadorVidas);
				document.getElementById('intentos').innerHTML = "Attempts Remaining: "+ Vidas;
			}else{
				document.getElementById('contenedorPrincipal').innerHTML="";
				document.getElementById('mainPalabras').innerHTML="";
				document.getElementById('derrota').style.display="block";
			}
	}else if(simbolo=="+"){
		var Vidas=  "&block; ".repeat(contadorVidas);
				document.getElementById('intentos').innerHTML = "Attempts Remaining: "+ Vidas;
	}
}

function borrarPalabra(){
	var palabrasAyuda = document.getElementsByClassName('palabras');
	var arrayPalabras = [];
	for (var i = 0; i < palabrasAyuda.length; i++) {
		var contrasenaScript = document.getElementById('contrasena').innerHTML;
		if(palabrasAyuda[i].innerHTML!=contrasenaScript){
			arrayPalabras.push(palabrasAyuda[i].innerHTML);
		}
	}

	var numAleatorio=Math.floor(Math.random()*arrayPalabras.length-1);

	var palabraEliminar=arrayPalabras[numAleatorio];
	arrayPalabras.splice(numAleatorio,1);

	//Creamos string con puntos y <br> si es necesario
	var strSoloConBr = document.getElementById(palabraEliminar).innerHTML;
	var strPuntos = "";
	for (var i = 0; i < strSoloConBr.length; i++) {
		if (strSoloConBr[i]=="<") {
			strPuntos+="<br/>";
			i+=3;
		}else{
			strPuntos+=".";
		}
	}
	document.getElementById('prompt5').innerHTML=document.getElementById('prompt4').innerHTML;
	document.getElementById('prompt4').innerHTML=document.getElementById('prompt3').innerHTML;
	document.getElementById('prompt3').innerHTML=document.getElementById('prompt2').innerHTML;
	document.getElementById('prompt2').innerHTML=document.getElementById('prompt1').innerHTML;
	document.getElementById('prompt1').innerHTML=">Help Level 2<br/>"+">Activaded"+"<br/>"+">"+palabraEliminar+" removed<br/>";

				//Cambiamos la palabra clickada por puntos
	document.getElementById(palabraEliminar).innerHTML=strPuntos;
				//Cambiamos clase de la palabra
	document.getElementById(palabraEliminar).className="puntos";
				//Cambiamos id de la plabra
	document.getElementById(palabraEliminar).id=strPuntos;

}

function comprovarContrasena(palabra){
	//Comprobamos si el ID son puntos
	if (palabra[0]!=".") {
		//Comprobamos si es la contraseña
		var contrasenaScript = document.getElementById('contrasena').innerHTML;
		if(palabra==contrasenaScript){
			victoria();
			//Paramos interval(marcador)
			window.clearInterval(interval);

			document.getElementById('contenedorPrincipal').innerHTML="";
			document.getElementById('mainPalabras').innerHTML="";
			document.getElementById('victoria').style.display="block";

			document.getElementById("tries").value = contadorVidas;
			document.getElementById("time").value=puntuacionSegundos;
			document.getElementById("gameMode").value= dificultad;
			//nombreJugador=pedirNombre();

		//Si no es la contraseña entramos
		}else{
			//Restamos vida
			derrota();
			vidasRestantes("-");

				//Contador coincidencias comparando con la contraseña
				var contadorLetras=0;
				for (var i = 0; i < palabra.length; i++) {
					if (palabra[i]==contrasenaScript[i]) {
						contadorLetras+=1;
					}
				}

				if(modoHardcore != null && modoHardcore != false){

					if(palabraAnterior<contadorLetras){

						document.getElementById('contenedorPrincipal').innerHTML="";
						document.getElementById('mainPalabras').innerHTML="";
						document.getElementById('derrota').style.display="block";


					}
					palabraAnterior=contadorLetras;

				}

				//Actualizamos prompt con nombre de palabra clickada y coincidencias
				document.getElementById('prompt5').innerHTML=document.getElementById('prompt4').innerHTML;
				document.getElementById('prompt4').innerHTML=document.getElementById('prompt3').innerHTML;
				document.getElementById('prompt3').innerHTML=document.getElementById('prompt2').innerHTML;
				document.getElementById('prompt2').innerHTML=document.getElementById('prompt1').innerHTML;
				document.getElementById('prompt1').innerHTML=">"+palabra+"<br/>"+">Entry denied."+"<br/>"+">Likeness="+contadorLetras+"<br/>";

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
		}
	}
}


var contadorAyudaIntentos = 0;
var contadorAyudaPalabras = 0;

function ayudas(ayuda){
	sonidoAyuda();
	if (ayuda[0]!=".") {
		if(Math.random()<0.5 && contadorAyudaIntentos == 0){

			contadorAyudaIntentos +=1;
			restablecerIntentos();
		}else if(contadorAyudaPalabras == 0){

			contadorAyudaPalabras +=1;
			console.log("eeeeeeeeeeee");
			borrarPalabra();

		}else{

			if(Math.random()<0.5){
				restablecerIntentos();
			}else{
				console.log("eeeeeeeeeeee");
				borrarPalabra();
			}
		}

		var strAyuda = document.getElementById(ayuda).innerHTML;
		var strPuntos = "";
		for (var i = 0; i < strAyuda.length; i++) {
			strPuntos+=".";
		}

		document.getElementById(ayuda).innerHTML=strPuntos;
		document.getElementById(ayuda).className="puntos";
		document.getElementById(ayuda).id=strPuntos;
	}
}

var anadirFinal = document.getElementById('bloquepalabras2').innerHTML.slice(0, 4);
document.getElementById('bloquepalabras2').innerHTML=document.getElementById('bloquepalabras2').innerHTML.slice(4, document.getElementById('bloquepalabras2').innerHTML.length);
document.getElementById('bloquepalabras2').innerHTML+=anadirFinal;


//Marcador empieza a contar desde el segundo 6
window.setTimeout(timeGame, 6000);
var puntuacionSegundos= 0;
var interval;
function timeGame () {
	var segundos = 0;
	var minutos = 0;
	var marcador = document.getElementById("tiempo");
	//Variable interval que al acertar la contraseña paramos
	interval = window.setInterval(function(){
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
}
function restablecerIntentos() {
        contadorVidas = 4;
        vidasRestantes("+");
		document.getElementById('prompt5').innerHTML=document.getElementById('prompt4').innerHTML;
		document.getElementById('prompt4').innerHTML=document.getElementById('prompt3').innerHTML;
		document.getElementById('prompt3').innerHTML=document.getElementById('prompt2').innerHTML;
		document.getElementById('prompt2').innerHTML=document.getElementById('prompt1').innerHTML;
		document.getElementById('prompt1').innerHTML=">Help Level 1<br/>"+">Activaded"+"<br/>"+">Restored lives<br/>";

}
var audio = document.getElementById("audio");
var  audioAyuda= document.getElementById("help");
var victory = document.getElementById("win");
var  perder= document.getElementById("lose");
var  audioAyuda= document.getElementById("help");

function play(){
    audio.play();
}
function victoria(){
    victory.play();
}
function derrota(){

    perder.play();
}
function sonidoAyuda(){
    audioAyuda.play();
}
var Sonido = false;
function disableMute(){
    if(Sonido==false){
        audio.muted = true;
        audioAyuda.muted = true;
        perder.muted = true;
        victory.muted = true;
        Sonido=true;
        document.getElementById("btn").innerHTML="Sound: OFF";
    }else if(Sonido==true){
        audio.muted = false;
        audioAyuda.muted = false;
        perder.muted = false;
        victory.muted = false;
        Sonido=false;
        document.getElementById("btn").innerHTML="Sound: ON";
    }
}
