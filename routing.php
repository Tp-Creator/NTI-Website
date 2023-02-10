<?php
include_once('includes\dbh.inc.php');


$routes = [
    "/"      => "/pages/index.html",
    "/forum" => "/pages/forum/main/forum.php",
    "/login" => "/pages/account/login/login.php",
];
console_log($_SERVER);


run();

function run() {
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];    
    foreach ($routes as $path => $url) {
        if ($path === $uri) {
            console_log($url);
            require __DIR__ . $url;
            return;
        }
    }
    require __DIR__ . '/404.html';
}
?>