<!DOCTYPE html>
<html>
<head>
<title>Proyecto Fallout</title>
<LINK REL=StyleSheet HREF="CSS/cssfallout.css" TYPE="text/css">
</head>
<body>
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
	<div id="victoria" style="display: none"><img class= "ocultar" src="terminales/gifVictoria.gif"><button class= "botonContinuar ocultar" onclick="enviarDatos()">Continue</button></div>
	<div id="derrota" style="display: none"><img class= "ocultar" src="terminales/derrota.gif"><button class= "botonContinuar ocultar" onclick="irMenuPrincipal()">Continue</button></div>
</div>
<div id="formularioculto">
	<form action="mainPHP.php" method="POST">
	<input type="hidden" name="variablesRanking" id="variablesRanking" value="">
</div>
<script type="text/javascript" src="scriptFallout.js"></script>
</body>
</html>