<?php
        //  Includes db functions
    // include_once '../../includes/dbh.func/dbh.all.php';
    // include_once '../includes/dbh.general.php';
    // include_once("../includes/dbh.general.php");
    // include_once("footer.php");


    function drawNavbar(){
        
        $navbuttons =   [
            ["Lunch",       "/lunch", "/public/style/inc/icons/light/lunch_icon_light.svg"],
            ["Schedule",    "/schedule", "/public/style/inc/icons/light/schedule_icon_light.svg"],
            ["Forum",       "/forum", "/public/style/inc/icons/light/forum_icon_light.svg"],
            // ["Memes",       "/memes", "/public/style/includes/icons/nav/satisfied_icon.svg"],
            ["Games",       "/games", "/public/style/inc/icons/light/games_icon_light.svg"]
        ];


            //  Logo
        $navbar =   "
                    <a id='navHomeBut' href='/'>
                        <p id='logo'>Gradeless</p>
                    </a>
                    ";

            //  Start navButCon
        $navbar .= "<div id='navCon'>";
        
        
        for($b = 0; $b < sizeof($navbuttons); $b++){
            $content = $navbuttons[$b][0];
            $url = $navbuttons[$b][1];
            $icon = $navbuttons[$b][2];

            $navbar .= "
                        <a class='navBut' href='$url'>
                            <img class='navIcon' src='$icon'>
                            <p class='navText'>$content</p>
                        </a>
                        ";
        }
        
        if (loginCheck()) {
            // array_push($navbuttons, ["Account", "/account"]);
            // array_push($navbuttons, ["Logout", "/logout"]);

            $usr = getUserFromId($_SESSION['userID']);
            $usrMail = $usr->Email;

            $navbar .= "
                        <a id='navPfpBut' href='/account'>
                            <img id='navPfp' src='/public/img/pfp/$usrMail.png' alt='Profile picture'>
                        </a>
                        ";
        }
        else {
            $navbar .=  "
                        <a class='navBut' href='/google'>
                            <img class='navIcon' src='/public/style/inc/icons/google_icon.svg'>
                            <p class='navText loginBut'>Login</p>
                        </a>
                        ";
        }

        //  End navButCon
        $navbar .= "</div>";

        return $navbar;
    }


    function drawFooter(){

        $html = "   <div class='container'>
                        <footer>
                            <div class='footerSection'>
                                <p class='footerTitle'>Gradeless</p>
                                <a class='footerSubject' href='/contact'>Contact admin</a>
                                <a class='footerSubject' href=''>Help Gradeless</a>
                            </div>

                            <p id='footerHero'>2023・www.gradeless.se・Alpha-test</p>
                        </footer>
                    </div>";

        return $html;
    }

?>