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
		<div id="botones">
			<button onclick="location.href='mainHTML.php'" class="letra boton">Fácil</button>
			<button onclick="location.href='mainHTML.php'" class="letra boton">Medio</button>
			<button onclick="location.href='mainHTML.php'" class="letra boton">Dificil</button>
		</div>
		<div id="extremo">
			<label><input type="checkbox" id="cbox1" value="first_checkbox"> Activar modo extremo</label>
		</div>
	</div>
</body>
</html>