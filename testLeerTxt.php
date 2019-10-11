<!DOCTYPE html>
<html>
<head>
<title>Proyecto Fallout</title>
<LINK REL=StyleSheet HREF="CSS/cssfallout.css" TYPE="text/css">
</head>

<body>
	<?php
	//Leer archivo txt y guardar palabras en array.
	$file = fopen("listaPalabras", "r");
	$diccionario = [];
	$contador=0;
	while(!feof($file)){
		array_push($diccionario, fgets($file));
		$diccionario[$contador]= trim($diccionario[$contador]);
		$contador++;
	}
	fclose($file);

	//Seleccionamos 6 palabras aleatorias.
	$palabrasRandom = [];
	$contador=0;
	while ($contador<6) {
		$numAleatorio = rand(0,count($diccionario)-2);
		if (!in_array($diccionario[$numAleatorio], $palabrasRandom)) {
			array_push($palabrasRandom, $diccionario[$numAleatorio]);
		$contador++;
		}
	}

	//Seleccionamos la contrasena
	$contrasena=$palabrasRandom[rand(0,count($palabrasRandom)-1)];
	echo "<p id='contrasena'>$contrasena</p>";

	//Seleccionamos 6 posiciones aleatorias sin solapar entre ellas con diferencia de un caracteres.
	$contador=0;
	$listaPosiciones=[];
	while ($contador<6) {
		$numAleatorio=rand(1,353);
		if (!in_array($numAleatorio, $listaPosiciones) and !in_array($numAleatorio-1, $listaPosiciones) and !in_array($numAleatorio+1, $listaPosiciones)) {
		array_push($listaPosiciones, $numAleatorio);
		$contador++;
		}
	}

	$simbolos = ["|", "º", "!", "ª", "@", "·", "$", "%", "&", "¬", "/", "(", ")", "=", "?", "'", "¿", "¡", "[", "]", "{", "}", "-", "*", "+"];

	//Creamos el string añadiendo 360 caracteres aleatorios + las 6 palabras aleatorias.
	$contador=0;
	$stringPrincipal="";
	for ($i=0; $i < 360 ; $i++) {
		if (in_array($i, $listaPosiciones)) {
			$stringPrincipal .= "<span id='palabra'style='color: red;'>".$palabrasRandom[$contador]."</span>";
			$contador++;
		}else{
			$stringPrincipal .= $simbolos[rand(0,count($simbolos)-1)];
		}
	}
	?>
</body>
</html>