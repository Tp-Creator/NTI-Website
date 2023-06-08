<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="refresh" content="2;list.php">
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
#phpinfo();
$file = $_GET['file'];
$mode = $_GET['mode'];
$target_file = "../slides/".$file;
$target_file_off = "../slides/OFF-".$file;
$target_file_on = str_replace("/OFF-", "/", $target_file);
if (file_exists($target_file)) {
  echo "File ".$target_file." exists. <br>";
  echo "Trying to rename ".$target_file."<br>";
  if ($mode == "OFF") {
	  rename($target_file, $target_file_off);
  } elseif ($mode == "ON") {
	  rename($target_file, $target_file_on);
  }
  echo "DONE<br>";
}
?>

<br><a href="list.php">Back</a>
</body>
</html>
