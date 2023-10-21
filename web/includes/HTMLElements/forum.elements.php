<?php

    require_once('includes/dbh.func/general/dbh.general.php');

    function questionCard($question){

        if(!isset($question)){
            console_log("no question sent as an argument to the function!");
            return false;
        }

        
        $id = $question->QuestionID;                         //  0
        
        $course = getCourseByID($question->CourseID);      //  1
            $courseCode = $course->CourseCode;
            $courseName = $course->CourseName;

        $user = getUserFromId($question->UserID);        //  2
            $username = $user->Username;

        $title = $question->Title;                      //  3
        $vote = $question->Upvote;                       //  6
        
        $millis = $question->dt;                     //  5
        $date = timestampToRead($millis);                    

        $usrMail = $user->Email;

        //  hämtar id:t på frågan och lägger till den i url:en
        $card = "
                <a class='card' href='/forum/question?question=$id'>
                    <div class='cardHeader'>
                        <img class='publisherPfp' src='public/img/pfp/$usrMail.png' alt=''>

                        <div class='publisherMeta'>
                            <p class='publisher'>$username</p>
                            <p class='publishDate'>$date</p>
                        </div>
                    </div>

                    <p class='cardContent'>$title</p>
                </a>
                ";

        return $card;
    }



    function answerCard($answer, $comment=false){

        if(!isset($answer)){
            console_log("no answer sent as an argument to the function!");
            return false;
        }

         

        // if($answers->CommentID != NULL){
        //     continue;
        // }

        // console_log($answer);
        $ansUser = getUserFromId($answer->UserID);
        $ansDate = timestampToRead($answer->dt);
        $ansContent = $answer->Content;

        $comments = getCommentsByAnswerID($answer->AnswerID);

        
        $card = "
                <div class='card'>
                    <div class='cardHeader'>
                        <img class='publisherPfp' src='public/img/pfp/$usrMail.png' alt=''>

                        <div class='publisherMeta'>
                            <p class='publisher'>$ansUser->Username</p>
                            <p class='publishDate'>$ansDate</p>
                        </div>
                    </div>

                    <p class='cardContent'>$ansContent</p>
                </div>
                ";


            if($comment){
                // console_log("vi skriver kommentarer");
                for($com = 0; $com < sizeof($comments); $com++){
                    $comUser = getUserFromId($comments[$com]->UserID);
                    $comDate = $comments[$com]->dt;
                    $comContent = $comments[$com]->Content;
                
                    $card   .="
                                <div class='forumCard'>
                                    <div class='pill QCP1'>
                                        <p class='infoText'>$comUser->Username</p>
                                        <p class='infoText'>$comDate</p>
                                    </div>
                                    <button class='pill'>Reply</button>
                                    <p class='regularText QCP4'>$comContent</p>
                                </div>
                            ";   
                }
            }

        return $card;

    }


    function filterMenu(){
     
        $courses = getCourses();
        // console_log($courses);
        
        $menu = "";

        for($i = 0; $i < sizeof($courses); $i++){
            $name = $courses[$i]->CourseName;
            $code = $courses[$i]->CourseCode;
        
            $menu .= "<button id='$code' class='filterBut'>$name</button>";
        }

        return $menu;

    }



?>