<!DOCTYPE html>
<html>
<head>
<title>Proyecto Fallout</title>
<LINK REL=StyleSheet HREF="CSS/cssfallout.css" TYPE="text/css">
</head>
<body>
<audio id="audio" src="resources/sonidos/boton_1.mp3"></audio>
<audio id="win" src="resources/sonidos/kirby-victory.mp3"></audio>
<audio id="lose" src="resources/sonidos/error-fallo-1.mp3"></audio>
<audio id="help" src="resources/sonidos/mario-bros vida.mp3"></audio>
<button onclick="play(); setTimeout(function(){daltonico()},200);" id="daltonico">Colorblind: OFF</button>
<button onclick="disableMute()" type="button" id="btn">Sound: ON</button>
<div id="documento">
	<div id="cascada" class="screen"></div>
	<?php
		require 'mainPHP.php';
	?>
	<div id="contenedorPrincipal">
		<pre id="titulo" class="typing">
		Welcome to ROBCO Industries (TM) Termlink</pre>
		<pre id="titulo2" class="typing2">Password Required</pre>

		<pre id="intentos" class="typing3">Attempts Remaining: &block; &block; &block; &block; </pre>

		<div id="bloqueFijo1">
			0x0012<br/>
			0x0024<br/>
			0x0036<br/>
			0x0048<br/>
			0xF060<br/>
			0xX082<br/>
			0xX094<br/>
			0x0106<br/>
			0x0118<br/>
			0x0130<br/>
			0x0142<br/>
			0x0154<br/>
			0x0166<br/>
			0x0178<br/>
			0xF190<br/>
			0xX202
		</div>
		<!-- REQUIRE HERE -->
		<div id="bloqueFijo2">
			0x0214<br/>
			0xF226<br/>
			0xF238<br/>
			0x0250<br/>
			0xD262<br/>
			0xD274<br/>
			0x0286<br/>
			0x0298<br/>
			0xP310<br/>
			0x5322<br/>
			0x0334<br/>
			0x0346<br/>
			0xF358<br/>
			0x5370<br/>
			0x0382<br/>
			0xD394
		</div>
		<div id="bloqueFijo3">
			<div id="prompt5" class="prompt"></div>
			<div id="prompt4" class="prompt"></div>
			<div id="prompt3" class="prompt"></div>
			<div id="prompt2" class="prompt"></div>
			<div id="prompt1" class="prompt"></div>
			<div>> <span class="blink">&block;</span></div>
		</div>
		<div id="tiempo">00:00</div>
		<div id="bloqueNegro" class="typing4"></div>
	</div>
	<div id="victoria" style="display: none">
		<img class= "ocultar" src="resources/imagenes/gifVictoria.gif">
		<form action="ranking.php" method="post">
			<h3 class="ocultar">Introduce your name</h3>
			<?php 
			if(isset($_SESSION["nombre"])){
				$name = $_SESSION["nombre"];
				echo "<input type='text' name='name' placeholder=\"$name\" required autofocus style='background-color: green;color: yellow;border: none;'>";
			}else{
				echo "<input type='text' name='name' required autofocus style='background-color: green;color: yellow;border: none;'>";
			}
			?>
			<input type="hidden"  name="tries" id="tries">
			<input type="hidden" name="time" id="time">
			<input type="hidden" name="gameMode" id="gameMode">
			<input type="submit" class="ocultar" width="25%" style="background-color: green;color: black;border: none;">
</div>
<div id="derrota" style="display: none"><img class= "ocultar" src="resources/imagenes/derrota.gif" style="width: 600px; height: 400px"><button class= "ocultar" onclick="irMenuPrincipal()" id="continue">Continue</button></div>
<script type="text/javascript" src="scriptFallout.js"></script>
</body>
</html>
