<!DOCTYPE html>
<html>
<head>
	<title>Ranking</title>
	<LINK REL=StyleSheet HREF="CSS/cssRanking.css" TYPE="text/css">
</head>
<body>
	<div id="ranking" class="screen">
		<div id="bloqueP" class="letra">
				Ranking Fallout
		</div>
		<table id="players">
		  <tr>
		  	<th id="position">Rank</th>
		    <th>Name</th>
		    <th>Lives</th>
		    <th>Time</th>
		  </tr>

		  <?php

			$arrayJugadores=[];
			$file = fopen("ranking.txt", "r") or exit("Unable to open file!");
			while(!feof($file))
			{
				$jugador = trim(fgets($file));
				$listaJugador = explode(';', $jugador);
				if (count($listaJugador)>1) {
					array_push($arrayJugadores, $listaJugador);
				}	
			}

			uasort($arrayJugadores, 'sort_by_attempts');

				function sort_by_attempts ($a, $b) {
					if ($a[2]==$b[2]) {
						return $a[1] - $b[1];
					}else{
						return $b[2] - $a[2];
					}
				}

			$contador = 0;
			foreach ($arrayJugadores as $row) {
				$contador++;
				echo "<tr>";
					echo "<td>$contador</td>";
					echo "<td>$row[0]</td>";
					echo "<td>$row[2]</td>";
					echo "<td>$row[1]</td>";
			    echo "<tr/>";
			}
		?>
		</table>
		<div id="botones">
			<button onclick="location.href='menuPrincipal.php'" class="letra boton">Menú principal</button>
		</div>
	</div>
</body>
</html>