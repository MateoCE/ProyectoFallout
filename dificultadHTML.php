<!DOCTYPE html>
<html>
<head>
	<title>Proyecto Fallout</title>
	<LINK REL=StyleSheet HREF="CSS/cssmenuPrincipal.css" TYPE="text/css">
	<meta charset="utf-8"/>
	<?php

		if (isset($_GET["name"]) && isset($_GET["time"]) && isset($_GET["tries"])) {
	    $phpName = $_GET["name"];
	    $phpTime = $_GET["time"];
	    $phpTries = $_GET["tries"];
	 
	    $variables = $phpName . ";" . $phpTime . ";" . $phpTries . "\n";

	    file_put_contents("ranking.txt", $variables, FILE_APPEND | LOCK_EX);

  	}
	?>
</head>
<body>
	<div class="screen">
		<div id="volver">
			<button onclick="location.href='menuPrincipal.php'" class="botonVolver">Volver</button>
		</div>
		<div id="bloqueP" class="letra">
			Dificultad
		</div>
		<form action="mainHTML.php" method="_GET">
		<div id="botones">
				<input type="submit" name="dificultad" value="Easy" class="letra boton"></input>
				<input type="submit" name="dificultad" value="Normal" class="letra boton"></input>
				<input type="submit" name="dificultad" value="Hard" class="letra boton"></input>		
		</div>
		<div id="extremo">
			<label><input type="checkbox" name="hardcore" >Activar modo extremo</label>
		</div>
		</form>
	</div>
</body>
</html>