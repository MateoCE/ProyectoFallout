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

		$simbolos = ["|", "º", "!", "ª", "@", "·", "$", "%", "&", "¬", "/", "(", ")", "=", "?", "'", "¿", "¡", "[", "]", "{", "}", "-", "<",">", "*", "+"];

		






	?>
</body>
</html>