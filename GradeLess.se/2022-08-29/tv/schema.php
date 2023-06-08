<center><?php
$files = glob("schema/*-today.png");
foreach($files as $png){
    echo "<img src=\"$png\"><br>\n";
}
?></center>
