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
            ["Games",       "/games"]
        ];


            //  Logo
        $navbar =   "    
                        <a id='navLeft' href='/'>
                            <p class='navText navTextLogo'>Schoolhub</p>
                            <img class='navIcon' src='' alt=''>
                        </a>
                    ";

            //  Start navButCon
        $navbar .= "<div id='navButCon'>";
        
        
        for($b = 0; $b < sizeof($navbuttons); $b++){
            $content = $navbuttons[$b][0];
            $url = $navbuttons[$b][1];

            $navbar .= "<a href='$url'>
                            <p class='navText'>$content</p>
                            <img class='navIcon' src='' alt=''>
                        </a>";
        }

            //  End navButCon
        $navbar .= "</div>";

        if (loginCheck()) {
            // array_push($navbuttons, ["Account", "/account"]);
            // array_push($navbuttons, ["Logout", "/logout"]);

            $usr = getUserFromId($_SESSION['userID']);
            $usrMail = $usr->Email;

            $navbar .= "
                            <a id='navRight' href='/account'>
                                <img id='navPfp' src='public/img/pfp/$usrMail.png' alt=''>
                            </a>
                         ";
        }
        else {
            $navbar .=  "<a id='navRight' href='/google'>login</a>";
        }


        return $navbar;
    }

?>