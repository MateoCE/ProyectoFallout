<!DOCTYPE html>
<html>
<head>
<title>Proyecto Fallout</title>
<LINK REL=StyleSheet HREF="CSS/cssfallout.css" TYPE="text/css">
<script type="text/javascript" src="scriptFallout.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body onload="htmlCargado()"> 
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

$simbolos=[",","`","!","?","\\","|","/",":","+","[","]", "=", "{", "}","@","#","$","%","^","*","(",")"];
//6 posiciones aleatorias sin solapar
$contador=0;
$listaPosiciones=[];
 while (count($listaPosiciones) < 6) {
    $randomNum = rand(0,(360));
    //hay q mejorar if
    if($randomNum < 186 or $randomNum>197){
        if (!in_array($randomNum, $listaPosiciones) and !in_array($randomNum+5, $listaPosiciones) and !in_array($randomNum-5, $listaPosiciones) and !in_array($randomNum-4, $listaPosiciones) and  !in_array($randomNum+4, $listaPosiciones) and !in_array($randomNum-3, $listaPosiciones) and !in_array($randomNum+3, $listaPosiciones) and  !in_array($randomNum+2, $listaPosiciones) and !in_array($randomNum-2, $listaPosiciones) and !in_array($randomNum+1, $listaPosiciones) and  !in_array($randomNum-1, $listaPosiciones)) {
          array_push($listaPosiciones,$randomNum);
        }
    }
}
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
      $stringPrincipal = substr($stringPrincipal, 0, $pos)."</div><div id='bloque2'>".substr($stringPrincipal, $pos);
      $pos += strlen("</div><div class ='bloque2'>")-1;
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
//Anadimos spans a las palabras
$palabrasCortadas=[];
foreach($palabrasRandom as $palabra){
  if(!strpos($stringPrincipal,$palabra)){
    for ($i = 1; $i < strlen($palabra); $i++){
      $stringDiv = substr($palabra,0,$i)."<br>".substr($palabra,$i);
      $stringPrincipal = str_replace($stringDiv, "<span id='$palabra' onclick='comprovarContrasena(this.id)' class='palabra'>$stringDiv</span>", $stringPrincipal);
    }
  }else{
    $stringPrincipal = str_replace($palabra, "<span id='$palabra' onclick='comprovarContrasena(this.id)' class='palabra'>$palabra</span>", $stringPrincipal);
  }
}
echo "<div id='main'><div id='bloque1'>".$stringPrincipal."</div></div>";
?>

<pre id="titulo">
Welcome to ROBCO Industries (TM) Termlink

Password Required </pre>

<p id="intentos"></p>
<p id="blok"></p>
<p id="blok2"></p>
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
</div>
</body>
</html>