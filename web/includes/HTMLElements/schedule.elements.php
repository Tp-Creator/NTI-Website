<?php

// require_once('includes/dbh.func/general/dbh.general.php');
require_once('includes/dbh.func/schedule/dbh.schedule.php');
require_once('includes/dbh.func/forum/dbh.forum.php');

function lessonCard($rawStart, $rawEnd, $courseID, $roomID, $classID){

        //  The course data
    $course = getCourseByID($courseID);
        $courseCode = $course->CourseCode;
        $courseName = $course->CourseName;

        //  begining and end
    $start = date("H:i", strtotime($rawStart));
    $end = date("H:i", strtotime($rawEnd));

        //  class name
    $class = getClassByID($classID);
        $className = $class->className;

        //  Room name
    $room = getRoomById($roomID);
        $roomName = $room->name;


        //  HTML
    // $HTML =    "<div class='subject $courseCode'>
    //                 <p class='name'>$CourseName</p>
    //                 <p class='start'>$start</p>
    //                 <p class='end'>$end</p>
    //                 <p class='class'>$className</p>
    //                 <p class='room'>$roomName</p>
    //             </div>";

    $HTML =    "<div class='dayCard $courseCode'>
                    <p class='metaData'>$roomName</p>
                    <p class='metaData'>$start - $end</p>
                    <p class='metaData'>$courseName</p>
                </div>";

    return $HTML;

}

function schedule($classID){


    $lessons = getLessons($classID, /*$day*/);
    // console_log($lessons);
    
    // Get all lessons for user or class 

    $HTML = "";


    for($d = 0; $d < sizeof($lessons); $d++){
        $day = $lessons[$d];
        $dayName = $day[0];

        $HTML .= "<div class='day'>
                    <p class='title'>$dayName</p>";

        for($l = 1; $l < sizeof($day); $l++){
            $lesson = $day[$l];

            $start = $lesson->start;
            $end = $lesson->end;
            $courseID = $lesson-> courseID;
            $roomID = $lesson->roomID;
    
            $HTML .= lessonCard($start, $end, $courseID, $roomID, $classID);
        }

        $HTML .= "</div>";

    }


    // foreach($lessons as $lesson){
    //     continue;
    // }

    //  for all lessons
        //  Get day and repeat, check when the lesson is repeated and how often

        //  get the day of the week
        
        //  Sorting the lessons for each day
        //  create html for each day...

    //     $mStart = $lessons[0]->start;
    //     $mEnd = $lessons[0]->end;
    //     $courseID = $lessons[0]-> courseID;
    //     $roomID = $lessons[0]->roomID;

    // return lessonCard($mStart, $mEnd, $courseID, $roomID, $classID);

    // $room = $lesson->room;
    // $course = getCourseByID($lesson->courseID);
    // $start = $lesson->starts;
    // $end = $lesson->ends;
    // $class = $lesson->classID;


    return $HTML;




}

?>