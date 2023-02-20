<?php

    include_once 'includes\dbh.func\general\dbh.general.php';

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


        $card = "";

        //  <!-- hämtar id:t på frågan och lägger till den i url:en -->
        $card .= "<a href='/forum/question?question=$id'>";
            $card .= '<div class="forumCard">';
                //  <!-- Corse pill -->
                $card .= "<div class='pill QCP1 $courseColor'>";
                    $card .= "<p>$courseName</p>";
                $card .= "</div>";

                //  <!-- Vote -->
                $card .= "<button class='pill QCP2'>";
                    $card .= $vote;
                    $card .= "<img class='icon' src='/public/style/includes/icons/voteUpIcon.svg' alt='Vote up icon'>";
                $card .= "</button>";

                //  <!-- Card information -->
                $card .= "<div class='pill QCP3'>";
                    //  <!-- Username -->
                    $card .= "<p>$username</p>";

                    //  <!-- Date -->
                    $card .= "<p class='questionDate'>$date</p>";
                $card .= "</div>";

                //  <!-- Card title/question -->
                $card .= "<p class='RegularText QCP4'>$title</p>";
            $card .= "</div>";
        $card .= "</a>";


        // //  <!-- hämtar id:t på frågan och lägger till den i url:en -->
        // echo "<a href='../question/forumQuestion.php?question=$id'>";
        //     echo '<div class="forumCard">';
        //         //  <!-- Corse pill -->
        //         echo "<div class='pill QCP1 $courseColor'>";
        //             echo "<p>$courseName</p>";
        //         echo "</div>";

        //         //  <!-- Vote -->
        //         echo "<button class='pill QCP2'>";
        //             echo $vote;
        //             echo "<img class='icon' src='/style/includes/icons/voteUpIcon.svg' alt='Vote up icon'>";
        //         echo "</button>";

        //         //  <!-- Card information -->
        //         echo "<div class='pill QCP3'>";
        //             //  <!-- Username -->
        //             echo "<p>$username</p>";

        //             //  <!-- Date -->
        //             echo "<p class='questionDate'>$date</p>";
        //         echo "</div>";

        //         //  <!-- Card title/question -->
        //         echo "<p class='RegularText QCP4'>$title</p>";
        //     echo "</div>";
        // echo "</a>";


        return $card;
        // return true;

    }

?>