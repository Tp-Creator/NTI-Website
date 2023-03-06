<?php

    include_once('includes\dbh.func\general\dbh.general.php');

    function questionCard($question){

        if(!isset($question)){
            echo "no question sent as an argument to the function!";
            return false;
        }

        
        $id = $question[0];                         //  0
        
        $course = getCourseByID($question[1]);      //  1
            $courseColor = $course[2];
            $courseName = $course[1];

        $user = getUserFromId($question[2]);        //  2
            $username = $user->Username;

        $title = $question[3];                      //  3
        $date = $question[5];                       //  5
        $vote = $question[6];                       //  6


        //  hämtar id:t på frågan och lägger till den i url:en
        $card = "<a href='/forum/question?question=$id'>
                    <div class='horizontalCon forumCard'>
                        <div class='verticalCon'>
                            <div class='verticalWrapReverse'>
                                <p class='fcUsername'>$username</p>

                                <div class='meta $courseColor'><p>$courseName</p></div>
                            </div>

                            <p class='fcInfoText'>$date</p>
                        </div>

                        <p class='fcTitleText'>$title</p>
                    </div>
                </a>";


        return $card;
    }

?>