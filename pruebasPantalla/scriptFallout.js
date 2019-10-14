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