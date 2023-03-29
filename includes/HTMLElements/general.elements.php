<?php
        //  Includes db functions
    // include_once '../../includes/dbh.func/dbh.all.php';
    // include_once '../includes/dbh.general.php';
    // include_once("../includes/dbh.general.php");
    // include_once("footer.php");


    function drawNavbar(){

        $navbuttons =   [
            ["Lounge",      "/news", "public/style/includes/icons/nav/couch_icon.svg"],
            ["Forum",       "/forum", "public/style/includes/icons/nav/question_icon.svg"],
            ["Schedule",    "/schedule", "public/style/includes/icons/nav/event_icon.svg"],
            ["Memes",       "/memes", "public/style/includes/icons/nav/satisfied_icon.svg"],
            ["Games",       "/games", "public/style/includes/icons/nav/gamepad_icon.svg"]
        ];


            //  Logo
        $navbar =   "    
                    <a class='navBut' href='/'>
                        <img class='navIcon' src='public/style/includes/icons/nav/home_icon.svg' alt=''>

                        <p class='navText logoText'>Gradeless</p>
                    </a>
                    ";

            //  Start navButCon
        $navbar .= "<div class='navCon'>";
        
        
        for($b = 0; $b < sizeof($navbuttons); $b++){
            $content = $navbuttons[$b][0];
            $url = $navbuttons[$b][1];
            $icon = $navbuttons[$b][2];

            $navbar .= "
                        <a class='navBut' href='$url'>
                            <img class='navIcon' src='$icon' alt=''>

                            <p class='navText'>$content</p>
                        </a>
                        ";
        }

            //  End navButCon
        $navbar .= "</div>";

        
        if (loginCheck()) {
            // array_push($navbuttons, ["Account", "/account"]);
            // array_push($navbuttons, ["Logout", "/logout"]);

            $usr = getUserFromId($_SESSION['userID']);
            $usrMail = $usr->Email;

            $navbar .= "
                        <a id='navPfpBut' href='/account'>
                            <img id='navPfp' src='public/img/pfp/$usrMail.png' alt=''>
                        </a>
                        ";
        }
        else {
            $navbar .=  "
                        <a class='navBut loginBut' href='/google'>
                            <img class='navIcon' src='public/style/includes/icons/nav/login_‭icon.svg' alt=''>

                            <p class='navText'>Login</p>
                        </a>
                        ";
        }


        return $navbar;
    }

?>