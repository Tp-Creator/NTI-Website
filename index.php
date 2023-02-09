<?php
include_once('includes\dbh.inc.php');



$routes = [
    "/forum" => "/pages/forum/main/forum.php",
    '/login' => '/pages/account/login/login.php',
];

// route('/', function () {
//     echo "Home page";
// });

// route('/login', function () {
//     echo "Login page";
// });

// function route(string $path, callable $callback){
//     global $routes;
//     $routes[$path] = $callback;
// }

run();

function run(){
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];    
    foreach ($routes as $path => $url) {
        if ($path === $uri) {
            // console_log($url);
            require __DIR__ . $url;
            // $callback();
        } #continue;     callback();
    }
}



































// console_log($_SERVER);


// $pages = [
//     'home' => [
//         'file' => '403.html',
//         'title' => 'Home',
//     ],
//     'about' => [
//         'file' => 'about.php',
//         'title' => 'About',
//     ],
//     'login' => [
//         'file' => '/pages/account/login/login.php',
//         'title' => 'login',
//     ],
// ];

// $route = $_GET['route'] ?? 'home';

// if (!isset($pages[$route])) {
//     http_response_code(404);
//     exit('Page not found');
// }

// $page = $pages[$route];

// require __DIR__ . '/' . $page['file'];











?>