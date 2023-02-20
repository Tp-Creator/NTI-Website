<?php
        //  Includes db functions
    // include_once '../../includes/dbh.func/dbh.all.php';
    // include_once '../includes/dbh.general.php';
    // include_once("../includes/dbh.general.php");
    // include_once("footer.php");


    function drawNavbar(){

        $navbuttons =   [
            ["News",        "/news"],
            ["Forum",       "/forum"],
            ["Schedule",    "/schedule"],
            ["Memes",       "/memes"],
            ["Games",       "/games"],
        ];

        // if (loginCheck()) {
        //     array_push($navbuttons, ["Account", "/account"]);
        // }
        // else {
        //     array_push($navbuttons, ["Login", "/login"]);
        // }

        $navbar = "";

        for($b = 0; $b < sizeof($navbuttons); $b++){
            $content = $navbuttons[$b][0];
            $url = $navbuttons[$b][1];

                // <!-- Navbar button -->
            $navbar .= "<a class='navButton buttonText' href='$url'>
                            <p class='navText'>$content</p>
                            <img class='navIcon' src='/public/style/includes/icons/searchIcon.svg' alt=''>
                        </a>";
        }

        return $navbar;
    }

?>