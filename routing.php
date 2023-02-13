<?php
include_once('includes\dbh.inc.php');


$routes = [
    "/"      => "/pages/index.html",
    "/forum" => "/pages/forum/main/forum.php",
    "/forum/question" => "/pages/forum/question/forumQuestion.php",
    "/login" => "/pages/account/login/login.php",
    "/sign-up" => "/pages/account/sign-up/sign-up.php",
];
// console_log($routes);




run();

function run() {
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];
    // console_log($uri);    
    foreach ($routes as $path => $url) {
        // console_log($url);
        if ($path === $uri) {
            // console_log($url);
            require __DIR__ . $url;
            return;
        }
    }
    require __DIR__ . '/404.html';
}
?>