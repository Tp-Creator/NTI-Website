<?php
include_once('includes\dbh.inc.php');


$routes = [
    "/forum" => "/pages/forum/main/forum.php",
    '/login' => '/pages/account/login/login.php',
];
console_log($_SERVER);


run();

function run() {
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];    
    foreach ($routes as $path => $url) {
        if ($path === $uri) {
            require __DIR__ . $url;
            return;
        }
    }
    require __DIR__ . '/404.html';
}
?>