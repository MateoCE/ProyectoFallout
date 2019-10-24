# ProyectoFallout

proyecto realizado por: Oscar, Joel y Mateo

El proyecto consiste en la simulación del mini juego de hackeo de fallout.

Para poder ejecutar correctamente el programa debemos de tener un servidor web instalado, por ejemplo xampp en windows/apache en ubuntu.

Iniciamos el servidor web que tengamos instalado y escribimos en el navegador la siguiente ruta: http://localhost/ProyectoFallout/mainHTML.php

Para añadir/eliminar las palabras que se usaran en el juego, modificar el archivo listaPalabras.

Si cuando ganamos una partida y guardamos el nombre nos da un error de permiso denegado debemos ir a donde tenemos guardado el juego, abrir un terminal 

y darle permisos a ranking.txt (chmod 777 ranking.txt).

la distribución de las carpetas debe ser la siguiente:

WINDOWS:

 xampp
 
	└───htdocs
	
			└───ProyectoFallout
			
					├───listaPalabras.txt
					
					├───mainHTML.php
					
					├───mainPHP.php
					
					├───scriptFallout.js
					
					├───menuPrincipal.php
					
					├───ranking.php
					
					├───ranking.txt
					
					├───README.md
					
					│
					
					├───CSS
					
						├───cssmenuPrincipal.css
						
						├───cssRanking.css
						
					    └───cssfallout.css
						
					│
					
					└───terminales
					
						│
						
						├───error404.jpg
						
						├───girVictoria.gif
						
						├───perder.png
						
					    └───TerminalFallout.png
						


UBUNTU:

var

 └──www
 
 	  └──html
	  
		└───ProyectoFallout
		
				├───listaPalabras.txt
				
				├───mainHTML.php
				
				├───mainPHP.php
				
				├───scriptFallout.js
				
				├───menuPrincipal.php
				
				├───ranking.php
				
				├───ranking.txt
				
				├───README.md
				
				│
				
				├───CSS
				
					├───cssmenuPrincipal.css
					
					├───cssRanking.css
					
					└───cssfallout.css
					
				│
				
				└───terminales
				
						│
						
						├───error404.jpg
						
						├───girVictoria.gif
						
						├───perder.png
						
						└───TerminalFallout.png
						
