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
		  
			$ranking = "resources/ranking/rankingEasy.txt";

			if (!empty($_POST["name"]) || !empty($_POST["time"]) || !empty($_POST["tries"]) || !empty($_POST["gameMode" ]) {
				$phpName = $_POST["name"];
				$phpTime = $_POST["time"];
				$phpTries = $_POST["tries"];
				$phpGameMode = $_POST["gameMode"];
 
				$variables = $phpName . ";" . $phpTime . ";" . $phpTries . "\n";
				
				if($phpGameMode == "Easy"){
					
					//file_put_contents("resources/ranking/rankingEasy.txt", $variables, FILE_APPEND | LOCK_EX);
					$ranking = "resources/ranking/rankingEasy.txt";
					
				}elseif($phpGameMode == "Normal"){
					
					//file_put_contents("resources/ranking/rankingNormal.txt", $variables, FILE_APPEND | LOCK_EX);
					$ranking = "resources/ranking/rankingNormal.txt";
					
				}elseif($phpGameMode == "Hard"){
				
					//file_put_contents("resources/ranking/rankingHard.txt", $variables, FILE_APPEND | LOCK_EX);
					$ranking = "resources/ranking/rankingHard.txt";
					
				}
}

			$arrayJugadores=[];
			$file = fopen($ranking, "r") or exit("Unable to open file!");
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
				if($contador<=10){
					$contador++;
					if($row[0]==$phpName && $row[1]==$phpTime && row[2]==$phpTries){
						echo "<tr>";
							echo "<td>$contador</td>";
							echo "<td><span style='color:red'>$row[0]</span></td>";
							echo "<td><span style='color:red'>$row[2]</span></td>";
							echo "<td><span style='color:red'>$row[1]s</span></td>";
						echo "<tr/>";
					}else{	
						echo "<tr>";
							echo "<td>$contador</td>";
							echo "<td>$row[0]</td>";
							echo "<td>$row[2]</td>";
							echo "<td>$row[1]s</td>";
						echo "<tr/>";
					}
				}
			}
		?>

		</table>
		<div id="botones">
			<button onclick="location.href='menuPrincipal.php'" class="letra boton">Menú principal</button>
		</div>
	</div>
</body>
</html>