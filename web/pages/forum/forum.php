<?php 
    //  Includes functions related to the db
    // include_once '../../../includes/loginCheck.php'; is not needed anymore
    // include_once 'includes/dbh.func/general/dbh.inc.php';
    // include_once 'includes/dbh.func/general/dbh.general.php';
    require_once('includes/dbh.func/forum/dbh.forum.php');

    //  Includes php elements
    require_once('includes/HTMLElements/general.elements.php');
    require_once('includes/HTMLElements/forum.elements.php');

    $courses = getCourses();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/public/js/forum/forum.js"></script>

    <!-- Basic style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <!-- Page style links -->
    <link rel="stylesheet" href="/public/style/pages/forumStyle.css">

    <link rel="icon" href="/public/style/inc/icons/gl_logo.svg">
    <title>Forum</title>
</head>

<body>

    <h1>Gradeless</h1>


    <form id="addQuestionCard" action="">
        <div class="formHeader">
            <h2>Forum</h2>
            <p>Welcome to the forum! Here you'll find questinos by other students and you can ask something yourself.<br>Give it a try, remember to be kind!</p>
        </div>

        <div class="formSection">
            <h4 class="formSectionTitle">Title</h4>
            <p class="formSectionDescription">Try to keep your title as short as possible</p>
            <input
                class="formInput"
                placeholder="What's your question?"
                type="text" 
                name="title" 
                id="title">
        </div>

        <div class="formSection">
            <h4 class="formSectionTitle">Description</h4>
            <p class="formSectionDescription">Tell the others the details they need to understand your situation.</p>
            <textarea 
                class="formInput"
                placeholder="Give your question a description"
                type="text"
                name="content"
                id="content"
                ></textarea>
        </div>

        <div class="formFooter">
            <button class="readyToPublishBtn" type="submit">Publish</button>
        </div>
    </form>


    <section id="forumFeed">
        <?php 
            $questions = getQuestions();
                    
            //  Amount of cards is the amount of cards that will be displayed
            for($current = sizeof($questions)-1; $current >= 0; $current--){
                echo questionCard($questions[$current]);

            }
        ?>
    </section>


    <nav>
        <?php echo drawNavbar() ?>
    </nav>
    
</body>
</html>