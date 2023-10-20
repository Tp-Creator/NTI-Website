<?php
        //  Includes db functions
    // include_once '../../includes/dbh.func/dbh.all.php';
    // include_once '../includes/dbh.general.php';
    // include_once("../includes/dbh.general.php");
    // include_once("footer.php");


    function drawNavbar(){
        
        $navbuttons =   [
            ["Lunch",       "/lunch", "/public/style/inc/icons/light/lunch_icon_light.svg"],
            // ["Schedule",    "/schedule", "/public/style/inc/icons/light/schedule_icon_light.svg"],
            ["Forum",       "/forum", "/public/style/inc/icons/light/forum_icon_light.svg"],
            // ["Memes",       "/memes", "/public/style/includes/icons/nav/satisfied_icon.svg"],
            // ["Games",       "/games", "/public/style/inc/icons/light/games_icon_light.svg"]
        ];


            //  Logo
        $navbar =   "
                    <a class='navBtn' href='/'>Home</a>
                    <div class='navLine'></div>
                    ";
        
        
        for($b = 0; $b < sizeof($navbuttons); $b++){
            $content = $navbuttons[$b][0];
            $url = $navbuttons[$b][1];
            $icon = $navbuttons[$b][2];

            $navbar .= "
                        <a class='navBtn' href='$url'>$content</a>
                        ";
        }
        
        if (getUserRank() != 0) {
            // array_push($navbuttons, ["Account", "/account"]);
            // array_push($navbuttons, ["Logout", "/logout"]);

            $usr = getUserFromId($_SESSION['userID']);
            $usrMail = $usr->Email;

            $navbar .= "
                        <div class='navLine'></div>
                        <a class='navBtn' href=''>Account</a>
                        ";
        }
        else {
            $navbar .=  "
                        <div class='navLine'></div>
                        <a class='navBtn' href='/google'>Login</a>
                        ";
        }
        

        return $navbar;
    }


    function drawFooter(){

        $html = "   <div class='container'>
                        <footer>
                            <div class='footerSection'>
                                <p class='footerTitle'>Gradeless</p>
                                <a class='footerSubject' href='/contact'>Contact admin</a>
                                <a class='footerSubject' href='https://docs.google.com/forms/d/e/1FAIpQLSdqJ4KhR1785fesUoEO9veC98mggTP_vEsrqRanFgXtFRTIDQ/viewform?usp=sf_link'>Give Feedback</a>
                            </div>

                            <p id='footerHero'>2023・www.gradeless.se・Alpha-test</p>
                        </footer>
                    </div>";

        return $html;
    }

?>