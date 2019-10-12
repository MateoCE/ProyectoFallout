<!DOCTYPE html>
<html>
<head>
<title>Proyecto Fallout</title>
<link rel="stylesheet" type="text/css" href="style.css">
<!-- <script type="text/javascript" src="scriptFallout.js"></script> -->
</head>

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

  //Seleccionamos la contrasena
  $contrasena=$palabrasRandom[rand(0,count($palabrasRandom)-1)];
  //echo "<p id='contrasena'>$contrasena</p>";

  //Seleccionamos 6 posiciones aleatorias sin solapar entre ellas con diferencia de un caracteres.
  $contador=0;
  $listaPosiciones=[];
  while ($contador<6) {
    $numAleatorio=rand(1,353);
    if (!in_array($numAleatorio, $listaPosiciones) and !in_array($numAleatorio-1, $listaPosiciones) and !in_array($numAleatorio+1, $listaPosiciones)) {
    array_push($listaPosiciones, $numAleatorio);
    $contador++;
    }
  }

  $simbolos = ["!", "@", "$", "%", "&", "¬", "/", "(", ")", "=", "?", "¿", "¡", "[", "]", "{", "}", "-", "*", "+"];

  //Creamos el string añadiendo 360 caracteres aleatorios + las 6 palabras aleatorias.
  $contador=0;
  $stringPrincipal="";
  for ($i=0; $i < 360 ; $i++) {
    if (in_array($i, $listaPosiciones)) {
      $stringPrincipal .= "<span id='palabra'style='color: red;'>".$palabrasRandom[$contador]."</span>";
      $contador++;
    }else{
      $stringPrincipal .= $simbolos[rand(0,count($simbolos)-1)];
    }
  }
  ?>


<body onload="htmlCargado()" background="terminales/TermFall.jpg"> 
<div class="pantallaTerminal">
  <div class="tituloTerminal">
    <p>ROBO INDSTRUIES (TM) TERMLINK PROTOCOL</p>
  </div>
  <div class="textoTerminal">
    <p class="passwordRequired">PASSWORD REQUIRED</p>
    <p class="PasswordAttemps"> ATTEMPS REMAINING: [] [] [] []</p>
  </div>
  <div class="prompt"></div>
  <div class="tabla">
    <table >
  <tr>
    <td class="hexaNumber">0x9430</td>
    <td class="String" id="casilla1">1</td>
    <td class="hexaNumber">0x94F0</td>
    <td class="String" id="casilla17">17</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x943C</td>
    <td class="String" id="casilla2">2</td>
    <td class="hexaNumber">0x94FC</td>
    <td class="String" id="casilla18">18</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x9440</td>
    <td class="String" id="casilla3">3</td>
    <td class="hexaNumber">0x9508</td>
    <td class="String" id="casilla19">19</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x9454</td>
    <td class="String" id="casilla4">4</td>
    <td class="hexaNumber">0x9514</td>
    <td class="String" id="casilla20">20</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x9460</td>
    <td class="String" id="casilla5" align="justify">5</td>
    <td class="hexaNumber">0x9520</td>
    <td class="String" id="casilla21">21</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x946C</td>
    <td class="String" id="casilla6">6</td>
    <td class="hexaNumber">0x952C</td>
    <td class="String" id="casilla22">22</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x9478</td>
    <td class="String" id="casilla7">7</td>
    <td class="hexaNumber">0x9538</td>
    <td class="String" id="casilla23">23</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x9484</td>
    <td class="String" id="casilla8">8</td>
    <td class="hexaNumber">0x9544</td>
    <td class="String" id="casilla24">24</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x9490</td>
    <td class="String" id="casilla9">9</td>
    <td class="hexaNumber">0x9550</td>
    <td class="String" id="casilla25">25</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x949C</td>
    <td class="String" id="casilla10">10</td>
    <td class="hexaNumber">0x955C</td>
    <td class="String" id="casilla26">26</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x94AB</td>
    <td class="String" id="casilla11">11</td>
    <td class="hexaNumber">0x9568</td>
    <td class="String" id="casilla27">27</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x94B4</td>
    <td class="String" id="casilla12">12</td>
    <td class="hexaNumber">0x9574</td>
    <td class="String" id="casilla28">28</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x94C0</td>
    <td class="String" id="casilla13">13</td>
    <td class="hexaNumber">0x9580</td>
    <td class="String" id="casilla29">29</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x94CC</td>
    <td class="String" id="casilla14">14</td>
    <td class="hexaNumber">0x958C</td>
    <td class="String" id="casilla30">30</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x94DB</td>
    <td class="String" id="casilla15">15</td>
    <td class="hexaNumber">0x9598</td>
    <td class="String" id="casilla31">31</td>
  </tr>
  <tr>
    <td class="hexaNumber">0x94E4</td>
    <td class="String" id="casilla16">16</td>
    <td class="hexaNumber">0x95A4</td>
    <td class="String" id="casilla32">32</td>
  </tr>
</table>
  </div>
  
</div>	
	

	<p id="prueba"></p>

  <script type="text/javascript">
    
    var string ="/&¬&+(?}/{/+$}-$-@!¬[&)?[+!*$@/++&(]@=@=%(+{&@!-]&-][(}(=¿¡[¡¿¬!%¿¡@(+(+%]=¬{]=?[-$+!}?&[+¿}$=/{¿-¿?+TUKER¿-&-&][}=¿/)?/*¬$¿TIRES%+%/*¡{@/¬&!}}-¬TRIBE?$?{SEVEN$(+)=¬?]¿%+¡(*&/=&%¬}¬-]=&¿[)![¬¿%]+)-¡)?]?]¿¿¿-!¬/{}¿TRIED*%)[$={[)]=}{!{{&}/@=}+///(¡¡&{@/]&***!!{(=]$*}}*{]=(¬-*%+([@%)(@%¬*+%¡]]]/{¡¡¡$}!}]THIRD!%*-*))@]/¬=-/&¬&?¬*[-/@!¡]!?!!{/!$*!%&})!]/[!¡*%%&@&!{)*¡{!]{%/*+%[(++}@?&]¡";
    var resultado = string.slice(0,12);
    var contador =0;
    var casilla="";
    var contadorCasilla = 1;

    //document.getElementById('prueba').innerHTML= string;
    document.getElementById('casilla1').innerHTML = resultado;

    for (var i = 12; i <= string.length;) {
        resultado = string.slice(contador,i);
        contador +=12;
        casilla = "casilla"+contadorCasilla;
        document.getElementById(casilla).innerHTML=resultado;

        contadorCasilla +=1;
        i+=12;
    }

  </script>

</body>
</html>