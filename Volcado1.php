<!DOCTYPE html>
<html>
<head>
	<title>Volcado</title>
</head>
<body>

	<?php

		$aLineas = file("datos.txt");
	    print_r($aLineas);
	    
	    echo "<p>CONTENIDO DEL ARCHIVO</p>";
	    echo "<p>=====================</p>";

		if (copy('users/jose.txt', 'users/pedro.txt')) {

   			echo 'Se ha copiado el archivo corretamente';
		} else {
   			echo 'Se produjo un error al copiar el fichero';
		}

	?>


</body>
</html>