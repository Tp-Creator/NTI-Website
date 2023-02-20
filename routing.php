<?php
include_once('includes/dbh.func/general/dbh.inc.php');



    //  OBS "/" måste vara sist för att den inte alltid ska returnera index. Den tar första bästa som börjar med det vi kollar efter...
$routes = [
    "/"                 =>      ["/pages/index.html", false],

    "/login"            =>      ["/pages/account/login.php", false],
    "/sign-up"          =>      ["/pages/account/sign-up.php", false],
    "/account"          =>      ["/pages/account/account.php", false],
    
    "/forum"            =>      ["/pages/forum/forum.php", false],
    "/forum/question"   =>      ["/pages/forum/forumQuestion.php", false],
    
    "/google"           =>      ["/pages/account/googleLogin.php", false],          //  Test google login
    "/gooIn"            =>      ["/pages/googleIndex.php", false],          //  Test google login
    "/403"              =>      ["/pages/eastereggs/403.php", false],
    "/404"              =>      ["/pages/eastereggs/404.php", false]
    
    

    // "/includes/OPA/forum/OPA.forum.php"          =>   ["/includes/OPA/forum/OPA.forum.php", false], 
    // "/includes/OPA/forum/OPA.question.php"          =>   ["/includes/OPA/forum/OPA.question.php", false], 


    // "/lib" => "/css//" . $_SERVER['REQUEST_fakeURL'],
    
];

// console_log($_SERVER['REQUEST_fakeURL']);


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
            
    foreach ($routes as $path => $url) {
        if ($path === $_SERVER['REDIRECT_URL']) {
        // if (str_starts_with($fakeURL, $path)) {
            require __DIR__ . $url[0];
            return;
        }
    }
    require __DIR__ . '/pages/error/404.html';
}
?>