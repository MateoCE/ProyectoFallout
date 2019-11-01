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
	<audio id="audio" src="resources/sonidos/boton_1.mp3"></audio>
	<div class="screen">
		<div id="volver">
			<button onclick="play(); setTimeout(function(){location.href='menuPrincipal.php'},200);" class="botonVolver">Volver</button>
		</div>
		<div id="bloqueP" class="letra">
			Dificultad
		</div>
		<form id= formulario action="mainHTML.php" method="_GET">
		<div id="botones">
				<button name="dificultad" value="Easy" class="letra boton">Easy</button>
				<button name="dificultad" value="Normal" class="letra boton">Normal</button>
				<button name="dificultad" value="Hard" class="letra boton">Hard</button>
		</div>
		<div id="extremo">
			<label><input type="checkbox" name="hardcore" >Activar modo extremo</label>
		</div>
		</form>
	</div>
</body>
<script type="text/javascript">
		var botones = document.getElementsByClassName("boton");
		for (var i = 0; i < botones.length-1; i++) {
			botones[i].addEventListener("click", function(event){
				event.preventDefault();
				var audio = document.getElementById("audio");
    			audio.play();
    			setTimeout(function(){
    				document.getElementById("formulario").submit();
    			},200)
			})
		}
		function play(){
   		 var audio = document.getElementById("audio");
    	audio.play();
		}
	</script>
</html>
