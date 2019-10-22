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
		<div id="bloqueP" class="letra">
			Terminal Fallout
		</div>
		<div id="botones">
			<button onclick="location.href='mainHTML.php'" class="letra boton">Jugar</button>
			<button onclick="location.href='ranking.php'" class="letra boton">Ranking</button>
		</div>
	</div>
</body>
</html>