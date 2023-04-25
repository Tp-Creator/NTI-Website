<?php
        //  Includes db functions
    // include_once '../../includes/dbh.func/dbh.all.php';
    // include_once '../includes/dbh.general.php';
    // include_once("../includes/dbh.general.php");
    // include_once("footer.php");


    function drawNavbar(){
        
        $navbuttons =   [
            ["Lunch",       "/lunch", "/public/style/includes/icons/foodIcon.svg"],
            ["Forum",       "/forum", "/public/style/includes/icons/nav/question_icon.svg"],
            ["Schedule",    "/schedule", "/public/style/includes/icons/nav/event_icon.svg"],
            // ["Memes",       "/memes", "/public/style/includes/icons/nav/satisfied_icon.svg"],
            ["Games",       "/games", "/public/style/includes/icons/nav/gamepad_icon.svg"]
        ];


            //  Logo
        $navbar =   "
                    <a id='navHomeBut' href='/'>
                        <p>Gradeless</p>
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
                            <img class='navIcon' src='public\style\includes\icons\google-icon.svg'>
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
                                <a class='footerSubject' href=''>Legacy</a>
                                <a class='footerSubject' href=''>About us</a>
                            </div>
                            <div class='footerSection'>
                                <p class='footerTitle'>Support</p>
                                <a class='footerSubject' href=''>Contact admin</a>
                                <a class='footerSubject' href='/helpGL'>Help Gradeless</a>
                            </div>

                            <p id='footerHero'>2023・www.gradeless.se・V1</p>
                        </footer>
                    </div>";

        return $html;

    }

?>