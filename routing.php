<?php
include_once('includes/dbh.func/general/dbh.inc.php');
include_once('includes/dbh.func/general/dbh.general.php');


/* The permissions in route are are the lowest status needed to be in a file (negatives are exceptions and does in this file count as logged in), here are all status levels
status = [
    0,   // not logged in
    1,   // Logged in
    2,   // Moderators
    3,   // Teachers
    4,   // Admins
    -1,  // muted
]
*/
$routes = [
    // Fake path                     Real path               Permission level
    "/"                 =>    [ "/pages/index.html",               0 ],

    "/login"            =>    [ "/pages/account/login.php",        0 ],
    "/sign-up"          =>    [ "/pages/account/sign-up.php",      0 ],
    "/account"          =>    [ "/pages/account/account.php",      1 ],
    
    "/forum"            =>    [ "/pages/forum/forum.php",          0 ],
    "/forum/question"   =>    [ "/pages/forum/forumQuestion.php",  0 ],
    
    "/google"           =>    [ "/pages/account/googleLogin.php",  0 ],          //  Test google login
    "/gooIn"            =>    [ "/pages/googleIndex.php",          0 ],          //  Test google login
    "/403"              =>    [ "/pages/eastereggs/403.php",       0 ],
    "/404"              =>    [ "/pages/eastereggs/404.php",       0 ],
];


run();

function run() {
    global $routes;
        //  Ger inte URL parametrar
    $fakeURL = $_SERVER['REDIRECT_URL'];
        
        //  Om man skrivit en eller flera "/" i slutet av URLn så tar vi bort dem och redirectar till adressen utan "/"
        //  ex. "/forum/" -> "/forum"
    if($fakeURL != rtrim($fakeURL, "/") && strlen(rtrim($fakeURL, "/")) > 3){
        header('Location: ' . rtrim($fakeURL, "/"));
    }
            
    foreach ($routes as $path => $properties) {
        if ($path === $_SERVER['REDIRECT_URL']) {
            $status = getUserFromId($_SESSION['userID'])->status;
            if ($status < 0) {
                $status = 1;
            }
            if ($properties[1] <= $status) {
                require __DIR__ . $properties[0];
            }
            return;
        }
    }
    require __DIR__ . '/pages/error/404.html';
}
?>