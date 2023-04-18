<?php

// require_once('includes/dbh.func/general/dbh.general.php');
require_once('includes/dbh.func/schedule/dbh.schedule.php');

function lessonCard($rawStart, $rawEnd, $courseID, $roomID, $classID){

        //  The course data
    $course = getCourseByID($courseID);
        $courseCode = $course->CourseCode;
        $CourseName = $course->CourseName;

        //  begining and end
    // $start = date("H:i", $mStart/1000);
    $yes = new DateTime($rawStart);
    $no = new DateTime($rawEnd);

    $start = $yes->format('H:i');
    $end = $no->format('H:i');
    // $end = date("H:i", $mEnd/1000);

        //  class name
    $class = getClassByID($classID);
        $className = $class->className;

        //  Room name
    $room = getRoomById($roomID);
        $roomName = $room->name;


        //  HTML
    $HTML =    "<div class='subject $courseCode'>
                    <p class='name'>$CourseName</p>
                    <p class='start'>$start</p>
                    <p class='end'>$end</p>
                    <p class='class'>$className</p>
                    <p class='room'>$roomName</p>
                </div>";

    return $HTML;

}

function schedule($classID){


    $lessons = getLessons($classID, /*$day*/);
    
    // Get all lessons for user or class 

    $HTML = "<div class='mainTopContainer'>";



    for($i = 0; $i < 6; $i++){
        continue;
    }

    foreach($lessons as $lesson){
        continue;
    }

    //  for all lessons
        //  Get day and repeat, check when the lesson is repeated and how often

        //  get the day of the week
        
        //  Sorting the lessons for each day
        //  create html for each day...

        $mStart = $lessons[0]->start;
        $mEnd = $lessons[0]->end;
        $courseID = $lessons[0]-> courseID;
        $roomID = $lessons[0]->roomID;

    return lessonCard($mStart, $mEnd, $courseID, $roomID, $classID);

    // $room = $lesson->room;
    // $course = getCourseByID($lesson->courseID);
    // $start = $lesson->starts;
    // $end = $lesson->ends;
    // $class = $lesson->classID;




}

?>