<?php 

    //Includes user functions related to the db
    require_once('includes/dbh.func/general/dbh.inc.php');
    
////////////////////
//  QUESTIONS
////////////////////

    //  Fetches all questions
    function getQuestions(){

        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM forum_question;");
        $stmt->execute();

        $stmt = $stmt->get_result();
        $result = [];

            //  Fetches each answer individually and then adds them to an array that is then returned.
        while ($finfo = $stmt->fetch_object()) {

                //  Loops over the data and makes sure javascript injections can not be done
            foreach ($finfo as $key => &$value) {
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
                //  Pushes the secured object to an array
            array_push($result, $finfo);
        }

        //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;

    }


    //  Fetches all questions sent after a certain time
    function getQuestionsByTime($clientTime){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM forum_question WHERE dt > ?;");
        $stmt->bind_param("i", $clientTime);
        $stmt->execute();
        
        $stmt = $stmt->get_result();
        $result = [];

            //  Fetches each answer individually and then adds them to an array that is then returned.
        while ($finfo = $stmt->fetch_object()) {

                //  Loops over the data and makes sure javascript injections can not be done
            foreach ($finfo as $key => &$value) {
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
                //  Pushes the secured object to an array
            array_push($result, $finfo);
        }

        return $result; 

    }


    //  Fetch the question with the specific id
    function getQuestionByID($id){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM forum_question WHERE QuestionID = ?;");
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $stmt = $stmt->get_result();
        $result = $stmt->fetch_object();            //  does only fetch the first line (which is the only line)

            //  Loops over the data and makes sure javascript injections can not be done
        foreach ($result as $key => &$value) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

            //  Returns the specific course and all it's content
        return $result;

    }


    /*  Is not yet done!
    function getQuestionsByCode($CourseCodes){
        global $conn;
    
        for($i = 0; $i < sizeof($CourseCodes); $i++)

        $stmt = $conn->prepare("SELECT * FROM forum_question WHERE ;");
        $stmt->bind_param("i", $clientTime);
        $stmt->execute();
        $stmt = $stmt->get_result();
        
        $result = [];

            //  Fetches each answer individually and then adds them to an array that is then returned.
        while ($finfo = $stmt->fetch_object()) {

                //  Loops over the data and makes sure javascript injections can not be done
            foreach ($finfo as $key => &$value) {
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
                //  Pushes the secured object to an array
            array_push($result, $finfo);
        }

        //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;

    }*/


        //  function to post a question to the forum
        //  $datetime should be in unix millis
    function postQuestion($courseID, $userID, $title, $content, $datetime){
        global $conn;

        // creates a call to the database in a safe way so that sql injections should not be able to take place
        $stmt = $conn->prepare("INSERT INTO forum_question (CourseID, userID, Title, Content, dt, Upvote) VALUES (?, ?, ?, ?, ?, 0)");
        $stmt->bind_param("iisss", $courseID, $userID, $title, $content, $datetime);

        $stmt->execute();
        //Felhantering behövs (om det inte gick att skapa)
    }



////////////////////
//  Answers
////////////////////


    //  Fetches all answers related to a specific question
    function fetchAnswersWithQuestionID($ID){
        global $conn;

        // creates a call to the database in a safe way so that sql injections should not be able to take place
        $stmt = $conn->prepare("SELECT * FROM forum_answer WHERE QuestionID = ?;");
        $stmt->bind_param("i", $ID);
        $stmt->execute();

        $stmt = $stmt->get_result();
        $result = [];

            //  Fetches each answer individually and then adds them to an array that is then returned.
        while ($finfo = $stmt->fetch_object()) {

                //  Loops over the data and makes sure javascript injections can not be done
            foreach ($finfo as $key => &$value) {
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }

                //  Pushes the secured object to an array
            array_push($result, $finfo);
        }


        return $result;

    }

    //  Fetches all answers after a certain time
    function getAnswersFromTime($clientTime){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM forum_answer WHERE dt > ?;");
        $stmt->bind_param("i", $clientTime);
        $stmt->execute();
        // $result = $stmt->get_result();
        
        $stmt = $stmt->get_result();
        $result = [];

            //  Fetches each answer individually and then adds them to an array that is then returned.
        while ($finfo = $stmt->fetch_object()) {

                //  Loops over the data and makes sure javascript injections can not be done
            foreach ($finfo as $key => &$value) {
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }

                //  Pushes the secured object to an array. Each object is a row that was returned from the sql call
            array_push($result, $finfo);
        }


        // $result = $result->fetch_all();

        //     //  Loops over the data and makes sure javascript injections can not be done by converting the values so that no html "code" is in there
        // foreach ($result as &$row) {
        //     foreach ($row as &$value) {
        //         $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        //     }
        // }

        // console_log($result);

        return $result; 

    }

    //  Posts an answer
    function postAnswer($QuestionID, $userID, $Content, $datetime){
        global $conn;

        // creates a call to the database in a safe way so that sql injections should not be able to take place
        $stmt = $conn->prepare("INSERT INTO forum_answer (QuestionID, UserID, Content, dt, Upvote) VALUES (?, ?, ?, ?, 0)");
        $stmt->bind_param("iiss", $QuestionID, $userID, $Content, $datetime);

        $stmt->execute();
        //Felhantering behövs (om det inte gick att skapa)
        
    }

    //  Fetches all comments related to an specific answer
    function getCommentsByAnswerID($id){
        global $conn;

        // creates a call to the database in a safe way so that sql injections should not be able to take place
        $stmt = $conn->prepare("SELECT * FROM forum_answer WHERE CommentID = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt = $stmt->get_result();
        $result = [];
        while ($finfo = $stmt->fetch_object()) {
            array_push($result, $finfo);
        }

        return $result;


    }


////////////////////
//  Courses
////////////////////

    //  Fetches all courses
    function getCourses(){

        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM course;");
        $stmt->execute();
        
        $stmt = $stmt->get_result();
        $result = [];
        while ($finfo = $stmt->fetch_object()) {
            array_push($result, $finfo);
        }

    
        //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;

    }


    //  Fetches a course by id
    function getCourseByID($id){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM course WHERE CourseID = ?;");
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $result = $result->fetch_object();

            //  Because we dont want an array in an array we just take out the info before we return it
        // $result = $result[0];

            //  Returns the specific course and all it's content
        return $result;

    }




   
////////////////////
//  Others
////////////////////

    //  This function converts a message timestamp in millis to a text that tells the user how long ago the message was sent
    //  Takes one argument ($millis)
    function timestampToRead($millis){

            //  Creates a date object for the millis timestamp and for the time right now
        $date = date_create(date("Y-m-d H:i:s", $millis/1000));
        $curr = date_create();
        
            //  $diff is the diffrence in time between $date and $curr as an object
        $diff = date_diff($date, $curr);
            //  $diffNum is the diffrens as a number "%a" = day, "%H" = hours, "%I" = minutes, "%S" = seconds
        $diffNum = $diff->format("%a%H%I%S");

            //  An if to determain what should be written

        if($diffNum < 60){                      //  If there has gone less than 60 seconds
            $time = "Right now";
        }
        elseif($diffNum < 6000){                        //  If there has gone less than 60 minutes
            $time = $diff->format("%i minutes ago");
            if($diffNum < 0100) {
                $time = $diff->format("%h hours ago");
            }
            else{
                $time = $diff->format("%h hour ago");
            }
        }
        elseif($diffNum < 240000){                      //  If there has gone less than 24 hours
            if($diffNum < 010000) {
                $time = $diff->format("%h hours ago");
            }
            else{
                $time = $diff->format("%h hour ago");
            }
        }
        elseif($diffNum < 7000000){                     //  If there has gone less than 7 days
            $time = $diff->format("%a days ago");
            if($diffNum < 1000000) {
                $time = $diff->format("%h hours ago");
            }
            else{
                $time = $diff->format("%h hour ago");
            }
        }
        else{                                           //  Other wise it just shows the data in year-month-day (Ex. 2023-03-11)
            $time = date("Y-m-d", $millis/1000);        
        }

        return $time;

    }

?>