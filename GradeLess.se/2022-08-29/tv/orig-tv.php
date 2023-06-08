<?php include "scrsaver.php" ?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>TV - NTIG Sollentuna</title>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="refresh" content="3600">
<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
</head>
<body>

<table class="ram">
<tr class="ram">
<td>

<table class="INFO"><tr><td class="INFO">
<h2>
<?php
setlocale(LC_TIME, "sv_SE.UTF-8");
setlocale(LC_ALL, 'sv_SE.UTF-8');

echo "Vecka ".date("W")."&nbsp;&nbsp;";

echo strftime('%A');
?>
</h2>
</td><td class="INFO">
<iframe class="time" src="time.php"  width="200px" height="40px"
 frameborder="0" scrolling="no" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true">
</iframe>
</td><td class="INFO">
NTI Matsal<br>
<?php
$vdag = strftime('%A');
switch ($vdag) {
	case "måndag":
		echo "10:45 - 12:00";
		break;
	case "tisdag":
		echo "12:00 - 13:00";
		break;
	case "onsdag":
		echo "10:45 - 12:00";
		break;
	case "torsdag":
		echo "12:00 - 13:00";
		break;
	case "fredag":
		echo "10:45 - 12:00";
		break;
}
?>
</td></tr></table>

<!--
<div class="googleslidesframe">
<iframe 
 class="googleslides"
 src="https://docs.google.com/presentation/d/e/2PACX-1vRrnLXP92qLEDG9OMKLH8HoiU1HSE1_LK2aq_bx7kEN19Te0gaQTa1x4yTdzs4x1wG-6jmHuFqXLY7t/embed?start=true&loop=true&delayms=15000"
 allow="autoplay"  
 frameborder="0" width="630" height="350" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true">
</iframe>
</div>
-->

<?php
include "slides.php";
?>

</td><td class="IT">

<div class="imgbox">
    <img class="itSlides" src="schema/schema-IT19-today.png">
    <img class="itSlides" src="schema/schema-IT20-today.png">
    <img class="itSlides" src="schema/schema-IT21-today.png">
</div>

<script>
var itIndex = 0;
carouselIT();

function carouselIT() {
  var i;
  var x = document.getElementsByClassName("itSlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  itIndex++;
  if (itIndex > x.length) {itIndex = 1}
  x[itIndex-1].style.display = "block";
  setTimeout(carouselIT, 15000); // Change image every 15 seconds
}
</script>


</td></tr>
<tr><td class="HA">

<div class="imgbox">
    <img class="haSlides" src="schema/schema-HA19-today.png">
</div>

<script>
var haIndex = 0;
carouselHA();

function carouselHA() {
  var i;
  var x = document.getElementsByClassName("haSlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  haIndex++;
  if (haIndex > x.length) {haIndex = 1}
  x[haIndex-1].style.display = "block";
  setTimeout(carouselHA, 15000); // Change image every 15 seconds
}
</script>

<br>

</td>
<td class="TE">

<div class="imgbox">
    <img class="teSlides" src="schema/schema-TE19-today.png">
    <img class="teSlides" src="schema/schema-TE20-today.png">
    <img class="teSlides" src="schema/schema-TE21-today.png">
</div>

<script>
var teIndex = 0;
carouselTE();

function carouselTE() {
  var i;
  var x = document.getElementsByClassName("teSlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  teIndex++;
  if (teIndex > x.length) {teIndex = 1}
  x[teIndex-1].style.display = "block";
  setTimeout(carouselTE, 15000); // Change image every 15 seconds
}
</script>

<br>

</td></tr>
</table>

</body>
</html>
