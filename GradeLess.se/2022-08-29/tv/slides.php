<?php

?>
<div class="imgbox">

<?php
foreach (glob("slides/*") as $filename) {
	#echo "$filename size " . filesize($filename) . "\n";
	$file=basename($filename);
	$onoff=$file[0].$file[1].$file[2].$file[3];
	if ($onoff!="OFF-") {
		echo '<img class="picSlides" src="'.$filename."\">\n";
	}
}
?>
</div>

<script>
var picIndex = 0;
carouselPic();

function carouselPic() {
  var i;
  var x = document.getElementsByClassName("picSlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  picIndex++;
  if (picIndex > x.length) {picIndex = 1}
  x[picIndex-1].style.display = "block";
  setTimeout(carouselPic, 15000); // Change image every 15 seconds
}
</script>
