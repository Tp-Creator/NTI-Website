<?php
        //  Includes db functions
    // include_once '../../includes/dbh.func/dbh.all.php';
    // include_once '../includes/dbh.general.php';
    // include_once("../includes/dbh.general.php");
    // include_once("footer.php");


    function drawNavbar(){

        $navbuttons =   [
            ["Lounge",      "/news"],
            ["Forum",       "/forum"],
            ["Schedule",    "/schedule"],
            ["Memes",       "/memes"],
            ["Games",       "/games"]
        ];


            //  Logo
        $navbar =   "    
                    <a class='navBut' href=''>
                        <img class='navIcon' src='inc/icons/nav/home_icon.svg' alt=''>

                        <p class='navText logoText'>Gradeless</p>
                    </a>
                    ";

            //  Start navButCon
        $navbar .= "<div class='navCon'>";
        
        
        for($b = 0; $b < sizeof($navbuttons); $b++){
            $content = $navbuttons[$b][0];
            $url = $navbuttons[$b][1];

            $navbar .= "
                        <a class='navBut' href=''>
                            <img class='navIcon' src='inc/icons/nav/couch_icon.svg' alt=''>

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
                        <a id='navPfpBut' href=''>
                            <img id='navPfp' src='inc/img/ejpfpf.png' alt=''>
                        </a>
                        ";
        }
        else {
            $navbar .=  "
                        <a class='navBut loginBut' href=''>
                            <img class='navIcon' src='inc/icons/nav/login_‭icon.svg' alt=''>

                            <p class='navText'>Login</p>
                        </a>
                        ";
        }


        return $navbar;
    }

?>