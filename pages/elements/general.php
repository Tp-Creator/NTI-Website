<?php
        //  Includes db functions
    include_once '../../includes/dbh.func/dbh.all.php';


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
            console_log($b);

?>
            
            <!-- Navbar button -->
            <a class="navButton buttonText" href="<?php echo $navbuttons[$b][1]; ?>">
                <p class="navText"><?php echo $navbuttons[$b][0]; ?></p>
                <img class="navIcon" src="../../style/includes/icons/searchIcon.svg" alt="">
            </a>
            
<?php
        }
    }

?>