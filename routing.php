<?php
include_once('includes/dbh.func/general/dbh.inc.php');



    //  OBS "/" måste vara sist för att den inte alltid ska returnera index. Den tar första bästa som börjar med det vi kollar efter...
$routes = [
    "/"                 =>  ["/pages/index.html", false],

    "/login"            =>  ["/pages/account/login.php", false],
    "/sign-up"          =>  ["/pages/account/sign-up.php", false],
    "/account"          =>  ["/pages/account/account.php", false],
    
    "/forum"            =>  ["/pages/forum/forum.php", false],
    "/forum/question"   =>  ["/pages/forum/forumQuestion.php", false],
    
    "/google"          =>   ["/pages/account/googleLogin.php", false],          //  Test google login
    "/gooIn"          =>   ["/pages/googleIndex.php", false],          //  Test google login

    
    // "/lib" => "/css//" . $_SERVER['REQUEST_URI'],
    
];

// console_log($_SERVER['REQUEST_URI']);


run();

function run() {
    global $routes;
        //  Ger inte URL parametrar
    $uri = $_SERVER['REDIRECT_URL'];
        
        //  Om man skrivit en eller flera "/" i slutet av URLn så tar vi bort dem och redirectar till adressen utan "/"
        //  ex. "/forum/" -> "/forum"
    if($uri != rtrim($uri, "/") && strlen(rtrim($uri, "/")) > 3){
        header('Location: ' . rtrim($uri, "/"));
    }
            
    foreach ($routes as $path => $url) {
        if ($path === $_SERVER['REDIRECT_URL']) {
        // if (str_starts_with($uri, $path)) {
            require __DIR__ . $url[0];
            return;
        }
    }
    require __DIR__ . '/pages/.err/404.html';
}
?>