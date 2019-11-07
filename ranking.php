<!DOCTYPE html>
<html>
<head>
	<title>Ranking</title>
	<LINK REL=StyleSheet HREF="CSS/cssRanking.css" TYPE="text/css">
</head>
<body>
	<audio id="Rocky" src="resources/songs/Rocky.mp3"></audio>
	<audio id="Skyfall" src="resources/songs/Skyfall.mp3"></audio>
	<audio id="Avengers" src="resources/songs/Avengers.mp3"></audio>
	<audio id="Interstellar" src="resources/songs/Interstellar.mp3"></audio>
	<audio id="Game of thrones" src="resources/songs/Game of thrones.mp3"></audio>
	<audio id="Batman" src="resources/songs/Batman.mp3"></audio>
	<audio id="Jaws" src="resources/songs/Jaws.mp3"></audio>
	<audio id="Star wars" src="resources/songs/Star wars.mp3"></audio>
	<audio id="Rosalia" src="resources/songs/Rosalia.mp3"></audio>
	<?php

		session_start();

		if (isset($_SESSION["game"])) {
   			unset($_SESSION["game"]);
		}



		if (isset($_POST['Hard'])) {
			$ranking = "resources/ranking/rankingHard.txt";
			$titulo = "Hard";
		}
		elseif (isset($_POST['Normal'])) {
			$ranking = "resources/ranking/rankingNormal.txt";
			$titulo = "Normal";
		}
		elseif (isset($_POST['Easy'])) {
			$ranking = "resources/ranking/rankingEasy.txt";
			$titulo = "Easy";
		}else{
			if(isset($_POST["gameMode"])){
				$dificultadTitulo = $_POST["gameMode"];
				$titulo = ucfirst($dificultadTitulo);
			}else{
				$ranking = "resources/ranking/rankingEasy.txt";
				$titulo = "Easy";
			}

		}

		$phpName = "";

		if (isset($_POST["name"]) && isset($_POST["time"]) && isset($_POST["tries"]) && isset($_POST["gameMode"])) {
			$phpName = $_POST["name"];
			$phpTime = $_POST["time"];
			$phpTries = $_POST["tries"];
			$phpGameMode = $_POST["gameMode"];

			echo "<input id='nombre' type='hidden' value='".$phpName."'>";

			$_SESSION["nombre"]= $phpName;

			$variables = $phpName . ";" . $phpTime . ";" . $phpTries . "\n";

			if($phpGameMode == "easy"){
				file_put_contents("resources/ranking/rankingEasy.txt", $variables, FILE_APPEND | LOCK_EX);
				$ranking = "resources/ranking/rankingEasy.txt";
			}elseif($phpGameMode == "normal"){
				file_put_contents("resources/ranking/rankingNormal.txt", $variables, FILE_APPEND | LOCK_EX);
				$ranking = "resources/ranking/rankingNormal.txt";
			}elseif($phpGameMode == "hard"){
				file_put_contents("resources/ranking/rankingHard.txt", $variables, FILE_APPEND | LOCK_EX);
				$ranking = "resources/ranking/rankingHard.txt";
			}
		}

		echo "<input id='nombre' type='hidden' value='".$phpName."'>";

		$arrayJugadores=[];
		$file = fopen($ranking, "r") or exit("Unable to open file!");
		while(!feof($file)){
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
		echo '<div id="ranking" class="screen">';
		echo '<div id="bloqueP" class="letra">';
			echo 'Ranking Fallout '.$titulo;
		echo '</div>';
		echo '<div id="botones">';
		echo '<form method="post">';
			if ($titulo=='Hard') {
				echo '<input type="submit" class="boton" name="Easy" value="Easy" />';
				echo '<input type="submit" class="boton" name="Normal" value="Normal" />';
				echo '<input type="submit" class="boton selected" name="Hard" value="Hard" />';
			}elseif ($titulo=='Normal') {
				echo '<input type="submit" class="boton" name="Easy" value="Easy" />';
				echo '<input type="submit" class="boton selected" name="Normal" value="Normal" />';
				echo '<input type="submit" class="boton" name="Hard" value="Hard" />';
			}elseif ($titulo=='Easy') {
				echo '<input type="submit" class="boton selected" name="Easy" value="Easy" />';
				echo '<input type="submit" class="boton" name="Normal" value="Normal" />';
				echo '<input type="submit" class="boton" name="Hard" value="Hard" />';
			}
		echo '</form>';
		echo '</div>';
		echo '<table id="players">';
			echo '<tr>';
			  	echo '<th id="position">Rank</th>';
			    echo '<th>Name</th>';
			    echo '<th>Lives</th>';
			    echo '<th>Time</th>';
			echo '</tr>';

			$contador = 0;
			foreach ($arrayJugadores as $row) {
				if($contador<=9){
					$contador++;
					if (isset($_POST["name"]) && isset($_POST["time"]) && isset($_POST["tries"]) && isset($_POST["gameMode" ])){
						if($row[0]==$phpName && $row[1]==$phpTime && $row[2]==$phpTries){
							echo "<tr>";
								echo "<td><span style='color:red'>$contador</span></td>";
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
<script>
var name = document.getElementById('nombre').value;
var songs = ["Interstellar", "Game of thrones", "Jaws", "Batman", "Avengers", "Skyfall", "Rocky", "Star wars", "Rosalia"];

if (songs.includes(name)) {
	var audio= document.getElementById(name);
	audio.play();
}

function play(){
    audio.play();
}

</script>

</html>
