function htmlCargado(){
	var contrasenaScript = document.getElementById('contrasena').innerHTML;
	var primerBloque = document.getElementById('bloque1').innerHTML;
	var segundoBloque = document.getElementById('bloque2').innerHTML;
	segundoBloque += ")=(·";
	segundoBloque = segundoBloque.replace(segundoBloque.substr(0,4), "", segundoBloque);
	document.getElementById('blok').innerHTML = primerBloque;
	document.getElementById('blok2').innerHTML = segundoBloque;


	
	var contadorFacil= 4;
	var facil=  "[] ".repeat(contadorFacil);
	var inte = facil;
	document.getElementById('titulo').innerHTML += inte;


}

function comprovarContrasena(palabra){
		var contrasenaScript = document.getElementById('contrasena').innerHTML;
		if(palabra==contrasenaScript){
			document.getElementById('bloqueFijo3').innerHTML+=">"+palabra+"<br/>"+">Correct password.";
		}else{
			var contadorLetras=0;
			for (var i = 0; i < palabra.length; i++) {
				if (palabra[i]==contrasenaScript[i]) {
					contadorLetras+=1;
				}
			}
			document.getElementById('bloqueFijo3').innerHTML+=">"+palabra+"<br/>"+">Entry denied."+"<br/>";
			document.getElementById('bloqueFijo3').innerHTML+=">Likeness="+contadorLetras+"<br/>";

		}

		
	}
