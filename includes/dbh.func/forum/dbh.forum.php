<?php 

    //Includes user functions related to the db
    // include_once 'includes\dbh.func\general\dbh.inc.php';
    

    //  Function that gets all questions and their data
    function getQuestions(){

        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM forum_question;");
        $stmt->execute();
        $result = $stmt->get_result();
        
        $result = $result->fetch_all();

            //  Loops over the data and makes sure javascript injections can not be done by converting the vales so that no html "code" is in there
        foreach ($result as &$row) {
            foreach ($row as &$value) {
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
        }

        // console_log($result[sizeof($result)-1][5]);

        // global $questionTime;
        // $questionTime['last_Question_Update'] = floor(microtime(true) * 1000);
        // $questionTime['lastest_Question_post'] = $result[sizeof($result)-1][5];

        //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;

    }

    function getQuestionsFromTime($clientTime){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM forum_question WHERE dt > ?;");
        $stmt->bind_param("i", $clientTime);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $result = $result->fetch_all();

            //  Loops over the data and makes sure javascript injections can not be done by converting the values so that no html "code" is in there
        foreach ($result as &$row) {
            foreach ($row as &$value) {
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
        }

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

            //  Loops over the data and makes sure javascript injections can not be done
        foreach ($result as $key => &$value) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

            //  Because we dont want an array in an array we just take out the info before we return it
        // $result = $result[0];

            //  Returns the specific course and all it's content
        return $result;

    }


        //
        //  function to post a question to the forum
        //
    function postQuestion($courseID, $userID, $title, $content, $datetime){
        global $conn;

        // creates a call to the database in a safe way so that sql injections should not be able to take place
        $stmt = $conn->prepare("INSERT INTO forum_question (CourseID, userID, Title, Content, dt, Upvote) VALUES (?, ?, ?, ?, ?, 0)");
        $stmt->bind_param("iisss", $courseID, $userID, $title, $content, $datetime);

        $stmt->execute();
        //Felhantering behövs (om det inte gick att skapa)
    }


    function postAnswer($QuestionID, $userID, $Content, $datetime){
        global $conn;

        // creates a call to the database in a safe way so that sql injections should not be able to take place
        $stmt = $conn->prepare("INSERT INTO forum_answer (QuestionID, UserID, Content, dt, Upvote) VALUES (?, ?, ?, ?, 0)");
        $stmt->bind_param("iiss", $QuestionID, $userID, $Content, $datetime);

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

?>