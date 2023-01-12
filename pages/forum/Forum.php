<?php 

    //Includes functions related to the db
    include_once '../../includes/dbh.func/dbh.all.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ( "Links to style files" ) -->
        
            <!-- Includes elements such as ( "Font" ) , ( "Navbar" ) , ( "Default settings" ) -->
            <link rel="stylesheet" href="../../style/main.css">

            <!-- Includes elements that apear often such as ( "Buttons" ) , ( "Searchbar" ) , ( "Ask a question - Button" ) , ( "Pills" ) , ( "Icons" ) -->
            <link rel="stylesheet" href="../../style/common.css">

            <!-- Includes the layout and elements for the "forum" page such as ( "forumCard.css" ) -->
            <link rel="stylesheet" href="../../style/forum/forum.css">

        <!-- ( "Links to style files" ) -->

    <title>NTI Website Forum 2.2</title>
</head>
<body>
    



    <!-- ( "Navbar" ) -->

        <nav>

            <!-- ( "Navbar Button" ) -->
                <a href=""> <!-- ( "Path user is sent to" ) -->
                    <button class="navButton"> 
                        <p class="navButtonText"> Forum </p> <!-- ( "Text that is visible on the button" ) -->
                    </button>
                </a>
            <!-- ( "Navbar Button" ) -->

        </nav>

    <!-- ( "Navbar" ) -->




    <!-- ( "Searchbar" ) -->

        <form class="searchbarCon" action=""> <!-- ( "Container for searchbar" ) -->

            <!-- <label for=""> Search . . . </label> ( "Pre written text for searchfield" ) -->

            <input class="searchfield" type="text"> <!-- ( "Searchfield where user are able to type" ) -->

            <!-- ( "Search Button (Displayed as an icon)" ) -->

                <button class="searchButton">
                    <img class="searchButtonIcon" src="" alt="">
                </button>

            <!-- ( "Search Button" ) -->

        </form>

    <!-- ( "Searchbar" ) -->




    <!-- ( "Ask a question Button" ) , ( "Style files found in (style/common.css)" ) -->

        <a class="blueButtonCon" href=""> <!-- ( "Takes user to (path)" ) -->

            <Button class="blueButton"> <!-- ( "Special button style" ) -->
                <p class="blueButtonText"> Ask a question </p> <!-- ( "Special text style" ) -->
            </Button>

        </a>

    <!-- ( "Ask a question Button" ) -->




    <!-- ( "Question Card" ) -->

        <?php 

            $questions = getQuestions();
        
                //  Amount of cards is the amount of cards that will be displayed
            for($currentCard = 0; $currentCard < sizeof($questions); $currentCard++){

                    //  Gets the course we are in
                $course = getCourseByID($questions[$currentCard][1]);
            
        ?>

            <Section class="forumCard">

                <!-- ( "Category pill" ) , ( "Style files found in (style/common.css)" -->

                    <div class="P1"> <!-- ( "Pill Shape" ) -->
                            <!-- the name of the course ex. Programering 1 -->
                        <p> <?php echo $course[1] ?> </p> <!-- ( "Pill Text (Category Name)" ) -->
                    </div>

                <!-- ( "Category pill" ) -->


                <h1 class="P2"> Title </h1> <!-- ( "Card Title (The question user is asking)" ) -->


                <!-- ( "Vote up - Button" ) , ( "Style files found in (style/common.css)" ) -->

                <button class="P3">

                    <p> 123 </p> <!-- ( "Displays how many have voted up the question" ) -->

                    <div></div> <!-- ( "Section devider (Is seen as a dot, used to more easily distinguish between elements)" ) , ( "Style files found in (style/common.css)" ) -->

                    <img src="" alt=""> <!-- ( "Arrow icon" ) -->

                </button>

                <!-- ( "Vote up - Button" ) -->


                <!-- ( "Card Information Pill" ) -->

                <div class="P4">

                    <p> Username_12345 </p> <!-- ( "Displays the username" ) -->

                    <div></div> <!-- ( "Section devider (Is seen as a dot, used to more easily distinguish between elements)" ) , ( "Style files found in (style/common.css)" ) -->

                    <p> YYYY - MM - DD </p> <!-- ( "Displays the date" ) -->

                </div>
                <!-- ( "Card Information Pill" ) -->


                <!-- ( "Options" ) , ( "Style files found in (style/common.css)" ) -->

                <button class="P5">
                    <img src="" alt=""> <!-- ( "3 dots icon" ) -->
                </button>

                <!-- ( "Options" ) -->

                
                <p class="P6"> Description </p> <!-- ( "Description (User describes their question)" ) -->


                <img class="P7" src="" alt=""> <!-- ( "Image added by the user" ) -->

            </Section>

        <?php

            }

        ?>

    <!-- ( "Question Card" ) -->


</body>
</html>