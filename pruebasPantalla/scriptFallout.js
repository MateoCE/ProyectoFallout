function htmlCargado(){
	var contrasenaScript = document.getElementById('contrasena').innerHTML;
	var primerBloque = document.getElementById('bloque1').innerHTML;
	var segundoBloque = document.getElementById('bloque2').innerHTML;
	segundoBloque += ")=(·";
	segundoBloque = segundoBloque.replace(segundoBloque.substr(0,4), "", segundoBloque);
	document.getElementById('blok').innerHTML = primerBloque;
	document.getElementById('blok2').innerHTML = segundoBloque;
	
	var contadorVidas= 4;
	var Vidas=  "[] ".repeat(contadorVidas);
	document.getElementById('intentos').innerHTML ="Attempts Remaining: "+ Vidas;
}


var contadorVidas= 4;
function comprovarContrasena(palabra){
		var primerBloque = document.getElementById('bloque1').innerHTML;
		var segundoBloque = document.getElementById('bloque2').innerHTML;
		var contrasenaScript = document.getElementById('contrasena').innerHTML;
		if(palabra==contrasenaScript){
			document.getElementById('bloqueFijo3').innerHTML+=">"+palabra+"<br/>"+">Correct password.";
		}else{
			console.log("asasas")
			var contadorLetras=0;
			for (var i = 0; i < palabra.length; i++) {
				if (palabra[i]==contrasenaScript[i]) {
					contadorLetras+=1;
				}
			}
			document.getElementById('bloqueFijo3').innerHTML+=">"+palabra+"<br/>"+">Entry denied."+"<br/>"+">Likeness="+contadorLetras+"<br/>";
			contadorVidas=contadorVidas-1;
			var Vidas=  "[] ".repeat(contadorVidas);
			document.getElementById('intentos').innerHTML = "Attempts Remaining: "+ Vidas;

			//Puntos
			var stringHTMLcompleto = document.getElementById(palabra);
			var strSoloConBr = stringHTMLcompleto.innerHTML;
			var strPuntos = "";
			for (var i = 0; i < strSoloConBr.length; i++) {
				if (strSoloConBr[i]=="<") {
					strPuntos+="<br/>";
					i+=3;
				}else{
					strPuntos+=".";
				}

			}
			console.log(strPuntos)
			stringHTMLcompleto.innerHTML = strPuntos;
		}
	}
