<?php

//Leer archivo txt y guardar palabras en array.
$file = fopen("listaPalabras", "r");
$diccionario = [];
$contador=0;
while(!feof($file)){
  array_push($diccionario, fgets($file));
  $diccionario[$contador]= trim($diccionario[$contador]);
  $contador++;
}
fclose($file);

//Seleccionamos 6 palabras aleatorias.
$palabrasRandom = [];
$contador=0;
while ($contador<6) {
    $numAleatorio = rand(0,count($diccionario)-2);
  if (!in_array($diccionario[$numAleatorio], $palabrasRandom)) {
      array_push($palabrasRandom, $diccionario[$numAleatorio]);
    $contador++;
  }
}

$simbolos=[",","`","!","?","\\","|","/",":","+", "=", "@","#","$","%","^","*"];
$simbolosOpertura = ["(", "[", "{"];
$simbolosCierre = [")", "]", "}"];

//6 posiciones aleatorias sin solapar
$contador=0;
$listaPosiciones=[];
 while (count($listaPosiciones) < 6) {
    $randomNum = rand(1,(360));
    //hay q mejorar if
    if($randomNum < 186 or $randomNum>197){
        if (!in_array($randomNum, $listaPosiciones) and !in_array($randomNum+5, $listaPosiciones) and !in_array($randomNum-5, $listaPosiciones) and !in_array($randomNum-4, $listaPosiciones) and  !in_array($randomNum+4, $listaPosiciones) and !in_array($randomNum-3, $listaPosiciones) and !in_array($randomNum+3, $listaPosiciones) and  !in_array($randomNum+2, $listaPosiciones) and !in_array($randomNum-2, $listaPosiciones) and !in_array($randomNum+1, $listaPosiciones) and  !in_array($randomNum-1, $listaPosiciones)) {
          array_push($listaPosiciones,$randomNum);
        }
    }
}

$arrayAyudas = [];
while (count($arrayAyudas) < 3) {
    $randomLength = rand(1, 10);
    $eleccionSimbolo = rand(0, count($simbolosOpertura) - 1);
    $ayuda = "";
    while (strlen($ayuda) < $randomLength) {
        $ayuda .= $simbolos[rand(0, count($simbolos) - 1)];
    }
    $ayuda = $simbolosOpertura[$eleccionSimbolo] . $ayuda. $simbolosCierre[$eleccionSimbolo];
    array_push($arrayAyudas, $ayuda);
}

echo $arrayAyudas[0];
echo $arrayAyudas[1];
echo $arrayAyudas[2];


//Creamos string con palabras y simbolos
$stringPrincipal="";
$contador=0;
while (strlen($stringPrincipal) < 384) {
    $posicionString = strlen($stringPrincipal);
    if (!in_array($posicionString,$listaPosiciones)){
      $stringPrincipal .= $simbolos[rand(0,count($simbolos)-1)];
    }else{
      $palabraAnadida = $palabrasRandom[$contador];
      $stringPrincipal .= $palabraAnadida;
      $contador++;
    }
}

//Seleccionamos la contraseña
$contrasena=$palabrasRandom[rand(0,count($palabrasRandom)-1)];
echo "<p id='contrasena'>$contrasena</p>";

//Cada 12ch br y dos div's
$carac=0;
$filas=0;
for ($pos=0; $pos <strlen($stringPrincipal); $pos++){
  if($carac==12){
    if($filas==15){
      $carac=0;
      $stringPrincipal = substr($stringPrincipal, 0, $pos)."</div><div id='bloquepalabras2'>".substr($stringPrincipal, $pos);
      $pos += strlen("</div><div class ='bloquepalabras2'>")-1;
      $filas++;
    }else{
      $carac = 0;
      $filas++;
      $stringPrincipal = substr($stringPrincipal, 0, $pos)."<br>".substr($stringPrincipal, $pos);
      $pos+=strlen("<br>")-1;
    }
  }else{
    $carac++;
  }
}


//Anadimos spans a las ayudas
$stringPrincipal.=$arrayAyudas[0];

foreach ($arrayAyudas as $ayuda) {
  $stringPrincipal=str_replace($ayuda, "<span id='$ayuda' onclick='ayudas(this.id)' class='ayudas'>$ayuda</span>", $stringPrincipal);
}

//Anadimos spans a las palabras
$palabrasCortadas=[];
foreach($palabrasRandom as $palabra){
  if(!strpos($stringPrincipal,$palabra)){
    for ($i = 1; $i < strlen($palabra); $i++){
      $stringDiv = substr($palabra,0,$i)."<br>".substr($palabra,$i);
      $stringPrincipal = str_replace($stringDiv, "<span id='$palabra' onclick='comprovarContrasena(this.id)' class='palabras'>$stringDiv</span>", $stringPrincipal);
    }
  }else{
    $stringPrincipal = str_replace($palabra, "<span id='$palabra' onclick='comprovarContrasena(this.id)' class='palabras'>$palabra</span>", $stringPrincipal);
  }
}



echo "<div id='mainPalabras'><div id='bloquepalabras1'>".$stringPrincipal."</div></div>";

?>