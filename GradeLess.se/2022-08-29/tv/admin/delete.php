<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
#phpinfo();
$file = $_GET['file'];
$target_file = "../slides/".$file;
if (file_exists($target_file)) {
  echo "File ".$target_file." exists. <br>";
  echo "Trying to delete ".$target_file."<br>";
  unlink($target_file);
  echo "DONE<br>";
}
?>

<br><a href="list.php">Back</a>
</body>
</html>
