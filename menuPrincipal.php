<!DOCTYPE html>
<html>
<head>
	<title>Proyecto Fallout</title>
	<LINK REL=StyleSheet HREF="CSS/cssmenuPrincipal.css" TYPE="text/css">
	<meta charset="utf-8"/>
	<?php

		session_start();

		if (isset($_SESSION["game"])) {
		unset($_SESSION["game"]);
		}

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
			<button value="PLAY" onclick='play(); setTimeout(function(){location.href="dificultadHTML.php"},200);' class="letra boton">Play</button>
			<audio id="audio" src="resources/sonidos/boton_1.mp3"></audio>
			<button onclick="location.href='ranking.php'" class="letra boton">Ranking</button>
		</div>
	</div>

</body>
<script type="text/javascript">
		function play(){
   		 var audio = document.getElementById("audio");
    	audio.play();
		}
	</script>
</html>
