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
                <div class='fcCon'>
                    <div class='fcElementCon'>
                        <p class='fcMeta $courseCode'>$courseName</p>

                        <p class='fcStatus'>Status</p>
                    </div>

                    <a class='fcContentTitle' href='/forum/question?question=$id'>$title</a>

                    <div class='fcElementCon'>
                        <a class='fcUserCon' href=''>
                            <img class='fcUserPFP' src='public/img/pfp/$usrMail.png'>
                            <p class='fcUserName'>$username</p>
                        </a>

                        <p class='fcContentDatetime'>$date</p>
                    </div>
                </div>
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

        

        $card   =" 
                    <div class='card'>
                        <div class='verticalWrap'>
                            <p class='cardUsername'>$ansUser->Username</p>
                            <!-- <button class='meta replyButton'>Reply</button> -->
                            <p class='cardInfoText'>$ansDate</p>
                        </div>

                        <!-- Card title/answer -->
                        <p class='cardContentText'>$ansContent</p>
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




?>