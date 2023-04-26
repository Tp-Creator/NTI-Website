<?php 

// include_once 'includes/dbh.func/forum/dbh.forum.php';
// include_once 'includes/HTMLElements/forum/forum.elements.php';

set_include_path($_SERVER['DOCUMENT_ROOT']);

// require_once('includes/dbh.func/dbh.schedule.php');
require_once('includes/dbh.func/schedule/dbh.schedule.php');
require_once('includes/HTMLElements/schedule.elements.php');




function getNewSchedule()
{
    $classID = $_POST["class"];

    echo schedule($classID);

}



switch($_POST["function"]){
    case 1:
        getNewSchedule();
    break;
}

?>