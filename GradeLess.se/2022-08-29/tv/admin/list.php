<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<link rel="stylesheet" href="style.css">
<title>TV Admin</title>
</head>
<body>
<table>
<?php
foreach (glob("../slides/*") as $filename) {
        $file=basename($filename);
	#$onoff=substr($file, 0, 4);
	$onoff=$file[0].$file[1].$file[2].$file[3];
	$picClass="picSlides";
	if ( $onoff == "OFF-" ) {
		$picClass="picSlidesOFF";
	}
	echo '<tr><td>';
        echo $file."<br>\n";
	echo '<img class="'.$picClass.'" src="'.$filename."\">\n";
	echo '</td><td><a href="delete.php?file='.$file."\">delete</a>&nbsp;&nbsp;&nbsp;\n";
	#echo "--- ".$onoff." ---";
	if ( $onoff == "OFF-" ) {
		echo '</td><td><a href="onoff.php?mode=ON&file='.$file."\">ON</a>\n";
	} else {
		echo '</td><td><a href="onoff.php?mode=OFF&file='.$file."\">OFF</a>\n";
	}
	echo "</td></tr>\n";
}
?>
</table>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<br>
<br>
</body>
</html>
