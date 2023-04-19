<?php
require_once('includes/dbh.func/general/dbh.inc.php');
require_once('includes/dbh.func/general/dbh.general.php');
session_start();


/* The permissions in route are are the lowest rank needed to be in a file (negatives are exceptions and does in this file count as logged in), here are all rank levels
rank = [
    0,   // not logged in
    1,   // Logged in
    2,   // Moderators
    3,   // Teachers
    4,   // Admins
    -1,  // muted
]
*/


// Det här istället för magiska path's i run functionen
$errorPages = [
 //Error code      Path
    "403" => "/pages/error/503.html",
    "404" => "/pages/error/404.html",
    "503" => "/pages/error/503.html",
];



// Negativa permission level i $routes fär 503
$routes = [
    // Fake path                     Real path               Permission level
    ""                 =>    [ "/pages/index.php",                   0 ],

    "/login"            =>    [ "/pages/account/login.php",          0 ],
    "/logout"           =>    [ "/pages/account/logout.php",         0 ],
    "/sign-up"          =>    [ "/pages/account/sign-up.php",        0 ],
    "/account"          =>    [ "/pages/account/account.php",        1 ],

    "/news"             =>    [ "/pages/news/news.php",             -1 ],
    
    "/forum"            =>    [ "/pages/forum/forum.php",            0 ],
    "/forum/question"   =>    [ "/pages/forum/forumQuestion.php",    0 ],

    "/games"            =>    [ "/pages/games/games.php",           -1 ],
    "/games/2Tetris"    =>    [ "/pages/games/allGames/2Tetris.html",0 ],

    "/schedule"         =>    [ "/pages/schedule/schedule.php",     -1 ],

    "/memes"            =>    [ "/pages/memes/memes.php",           -1 ],
    

    "/google"           =>    [ "/pages/account/googleLogin.php",    0 ],
    "/gooIn"            =>    [ "/pages/account/googleIndex.php",    0 ],


    "/403"              =>    [ "/pages/eastereggs/403.php",         0 ],
    "/404"              =>    [ "/pages/eastereggs/404.php",         0 ],
    "/503"              =>    [ "/pages/eastereggs/503.php",         0 ],
];




run();
function run() {
    global $routes;
    //  Ger inte URL parametrar
    $fakeURL = $_SERVER['REDIRECT_URL'];  // Varför inte REQUEST_URI?

    $fakeURL = rtrim($fakeURL, "/");

    foreach ($routes as $path => $properties) {

        if ($path === $fakeURL) {
            $rank = getUserRank();

            if ($rank < 0) {
                $rank = 1;
            }

            if ($properties[1] < 0 && $_SERVER['SERVER_NAME'] == "gradeless.se"){
                // require __DIR__ . '/pages/error/503.html';
            }
            //  If your rank is high enough you get to see the page
            else if ($properties[1] <= $rank) {
                require __DIR__ . $properties[0];

            } else {
                //  If your rank is too low you will be sent to the 403 page
                require __DIR__ . '/pages/error/403.html';

            }
            return;
        }
    }
    require __DIR__ . '/pages/error/404.html';
}
?>