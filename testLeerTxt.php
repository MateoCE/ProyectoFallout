<!DOCTYPE html>
<html>
<head>
<title>Proyecto Fallout</title>
<LINK REL=StyleSheet HREF="CSS/cssfallout.css" TYPE="text/css">
<script type="text/javascript" src="scriptFallout.js"></script>
</head>
<body onload="htmlCargado()"> 
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
	echo "$stringPrincipal";
	?>

	<table class="tg">
  <tr>
    <th class="tg-0lax">0x9430</th>
    <th class="tg-0lax"></th>
    <th class="tg-0lax">0x94F0</th>
    <th class="tg-0lax"></th>
  </tr>
  <tr>
    <td class="tg-0lax">0x943C</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x94FC</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x9440</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x9508</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x9454</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x9514</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x9460</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x9520</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x946C</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x952C</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x9478</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x9538</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x9484</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x9544</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x9490</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x9550</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x949C</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x955C</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x94AB</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x9568</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x94B4</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x9574</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x94C0</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x9580</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x94CC</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x958C</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x94DB</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x9598</td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax">0x94E4</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">0x95A4</td>
    <td class="tg-0lax"></td>
  </tr>
</table>

	<p id="prueba"></p>

</body>
</html>