<?php 
        //  Includes functions related to the db
    // include_once '../../../includes/loginCheck.php'; is not needed anymore
    // include_once 'includes/dbh.func/general/dbh.inc.php';
    // include_once 'includes/dbh.func/general/dbh.general.php';
    include_once('includes/dbh.func/forum/dbh.forum.php');

        //  Includes php elements
    include_once('includes/HTMLElements/general.elements.php');
    include_once('includes/HTMLElements/forum.elements.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/public/js/forum/forum.js"></script>

    <!-- Basic style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <!-- Page style links -->
    <link rel="stylesheet" href="/public/style/pages/forum/forumStyle.css">

    <title>Schoolhub Forum</title>
</head>

<body>
    <!-- Navigationbar  -->
    <nav>
        <a id='navLeft' href='/pages/index.php'>
            <p class='navText navTextLogo'>Schoolhub</p>
            <img class='navIcon' src='' alt=''>
        </a>

        <div id='navButCon'>
            <?php echo drawNavbar() ?>
        </div>

        <a id='navRight' href=''>
            <img id='navPfp' src='' alt=''>
        </a>
    </nav>

    <header>

        <div id="headerCon1">
                <!-- Searchbar  -->
            <form id="searchbar" action="">

                <input id="searchfield" placeholder="Search" type="text">

                <button id="searchButton">
                    <img src="/public/style/includes/icons/search_Icon_v3.svg" alt="">
                </button>

            </form>

                <!-- "Aks a question" button  -->
            <button class="callToAction" id="askQuestion">
                Ask a question
                <!-- <img src="" alt=""> -->
            </button>
        </div>




        <!-- "Ask a question" form -->
        <form id="addQuestionCard" style="display: none;">
            <input class="formInput formTitel" placeholder="Enter your question" name="title" id="title"></input>

            <!-- Input description -->
            <textarea class="formInput formDescription" placeholder="Enter a description" rows="5" name="content" id="content"></textarea>
            
            <div id="formFotter">
                <select class="optionsCon formOptionsCon" name="courseID" id="courseID">  
                    <option value="">Choose a "Course"</option>

                    <?php 
                        $courses = getCourses();
                            //  Loops as many choices as there are courses in the db
                        for($i = 0; $i < sizeof($courses); $i++){
                    ?>
                        <!-- course $courses[$i][1] is the name of the course currently looped-->
                        <option value="<?php echo $courses[$i][0] ?>"><?php echo $courses[$i][1] ?></option>
                    <?php 
                        }
                    ?>
                </select>

                <div class="devider"></div>

                <button id="postQuestionButton" type="submit">Post</button>
            </div>
        </form>




            <!-- Page options & information -->
        <div class="verticalWrap">

            <select class="optionsCon" name="" id="">

                <option value="">Latest</option>
                <option value="">Popular</option>
                <option value="">Bookmarked</option>
                <option value="">Your questions</option>

            </select>

            <div class="devider"></div>

            <select class="optionsCon" name="" id="">

                <option value="">Courses</option>
                <?php 
                    $courses = getCourses();
                        //  Loops as many choices as there are courses in the db
                    for($i = 0; $i < sizeof($courses); $i++){
                ?>
                    <!-- course $courses[$i][1] is the name of the course currently looped-->
                    <option value="<?php echo $courses[$i][0] ?>"><?php echo $courses[$i][1] ?></option>
                <?php 
                    }
                ?>

            </select>

            <div class="devider"></div>

            <p class="infoText">There are "amount" new questions today!</p>

        </div>

    </header>



    
    <!-- Content feed -->
    <section class="horizontalCon contentFeed" id="questionCardFeed">

        <?php 
           $questions = getQuestions();
        
               //  Amount of cards is the amount of cards that will be displayed
           for($current = sizeof($questions)-1; $current >= 0; $current--){
               echo questionCard($questions[$current]);
        
           }
        ?>

    </section>

    <footer></footer>
</body>
</html>