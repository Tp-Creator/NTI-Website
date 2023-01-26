<?php
        //  Includes db functions
    // include_once '../../includes/dbh.func/dbh.all.php';


    function drawNavbar(){

        $navbuttons =   [
                            ["Home",        "urladress.php"],
                            ["News",        "urladress.php"],
                            ["Forum",       "forum.php"],
                            ["Schedule",    "urladress.php"],
                            ["Memes",       "urladress.php"],
                            ["Games",       "urladress.php"],
                            ["Account",     "urladress.php"]
                        ];
        
        for($b = 0; $b < sizeof($navbuttons); $b++){
            $content = $navbuttons[$b][0];
            $url = $navbuttons[$b][1];

                // <!-- Navbar button -->
            echo "<a class='navButton buttonText' href='$url'>";
                echo "<p class='navText'>$content</p>";
                echo "<img class='navIcon' src='/style/includes/icons/searchIcon.svg' alt=''>";
            echo "</a>";
        }
    }

?>