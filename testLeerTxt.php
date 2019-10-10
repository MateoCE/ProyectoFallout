<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$file = fopen("listaPalabras", "r");
		$diccionario = [];
		while(!feof($file)){
			array_push($diccionario, fgets($file));
		}
		fclose($file);
		
		//384 caracteres en total, 354 solo especiales (30 de las palabras)
		//for de 360
		$palabrasRandom = [];
		$contador=0;
		while ($contador<6) {
			$numAleatorio = rand(0,count($diccionario)-2);
			if (!in_array($diccionario[$numAleatorio], $palabrasRandom)) {
				array_push($palabrasRandom, $diccionario[$numAleatorio]);
				$contador++;
			}
		}
		print_r($palabrasRandom);
		print_r(count($palabrasRandom));
		
		$simbolos = ["|", "º", "!", "ª", "@", "·", "$", "%", "&", "¬", "/", "(", ")", "=", "?", "'", "¿", "¡", "[", "]", "{", "}", "-", "<",">", "*", "+"];

		$stringPrincipal="";
	?>
</body>
</html>