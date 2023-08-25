<?php

set_include_path($_SERVER['DOCUMENT_ROOT']);


// Imports:
include_once('includes/dbh.func/general/dbh.inc.php');
include_once('includes/dbh.func/dbh.foodmenu.php');

switch($_POST["function"]){
    case 1:
        addFoodToMenu($_POST["date"], $_POST["food"], $_POST["vegfood"]);
    break;
    case 2:
        deleteFoodItem($_POST["id"]);
    break;
}

?>