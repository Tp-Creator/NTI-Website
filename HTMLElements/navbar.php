<?php
        //  Includes db functions
    // include_once '../../includes/dbh.func/dbh.all.php';
    include_once '../includes/dbh.general.php';


    function drawNavbar(){

        $navbuttons =   [
            ["Home",        "urladress.php"],
            ["News",        "urladress.php"],
            ["Forum",       "forum.php"],
            ["Schedule",    "urladress.php"],
            ["Memes",       "urladress.php"],
            ["Games",       "urladress.php"]
        ];

        if (loginCheck()) {
            $navbuttons .= ["Account", "../../account/login/login.php"];
        }
        else {
            $navbuttons .= ["login", "pages/account/login/login.php"];
        }

        $navbar = "";

        for($b = 0; $b < sizeof($navbuttons); $b++){
            $content = $navbuttons[$b][0];
            $url = $navbuttons[$b][1];

                // <!-- Navbar button -->
            $navbar .= "<a class='navButton buttonText' href='$url'>";
                $navbar .= "<p class='navText'>$content</p>";
                $navbar .= "<img class='navIcon' src='/style/includes/icons/searchIcon.svg' alt=''>";
            $navbar .= "</a>";
        }

        return $navbar;
    }

?>