<?php 

    //Includes user functions related to the db
    include_once 'dbh.inc.php';

    //  Function that gets all questions and their data
    function getQuestions(){

        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM forum_question;");
        $stmt->execute();
        $result = $stmt->get_result();
        
        $result = $result->fetch_all();
    
        //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;

    }

    function getCourses(){

        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM course;");
        $stmt->execute();
        $result = $stmt->get_result();
        
        $result = $result->fetch_all();
    
        //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;

    }


    //function to get the course by id
    function getCourseByID($id){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM course WHERE CourseID = ?;");
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $result = $result->fetch_all();

            //  Because we dont want an array in an array we just take out the info before we return it
        $result = $result[0];

            //  Returns the specific course and all it's content
        return $result;

    }

    function getQuestionByID($id){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM forum_question WHERE QuestionID = ?;");
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $stmt = $stmt->get_result();
        $result = $stmt->fetch_object();

            //  Because we dont want an array in an array we just take out the info before we return it
        // $result = $result[0];

            //  Returns the specific course and all it's content
        return $result;

    }


        //
        //  function to post a question to the forum
        //
    function postQuestion($courseID, $userID, $title, $content, $datetime, $upvote){
        global $conn;

        // creates a call to the database in a safe way so that sql injections should not be able to take place
        $stmt = $conn->prepare("INSERT INTO forum_question (CourseID, userID, Title, Content, dt, Upvote) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisssi", $courseID, $userID, $title, $content, $datetime, $upvote);

        $stmt->execute();
        //Felhantering behövs (om det inte gick att skapa)
    }


    function fetchAnswersWithQuestionID($ID){
        global $conn;

        // creates a call to the database in a safe way so that sql injections should not be able to take place
        $stmt = $conn->prepare("SELECT * FROM forum_answer WHERE QuestionID = ?;");
        $stmt->bind_param("i", $ID);
        $stmt->execute();

        $stmt = $stmt->get_result();
        $result = [];
        while ($finfo = $stmt->fetch_object()) {
            array_push($result, $finfo);
        }

        console_log($result);

        return $result;

    }


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

        console_log($result);

        return $result;


    }

?>