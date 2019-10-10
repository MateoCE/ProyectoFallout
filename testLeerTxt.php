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
		print_r($diccionario);
	?>
</body>
</html>