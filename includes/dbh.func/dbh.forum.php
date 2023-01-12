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
    
            //  Returnerar en array med alla rader där man kan nå datan genom att ta $result[i]
        return $result;

    }

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

?>