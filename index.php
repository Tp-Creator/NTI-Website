<?php

include_once('includes\dbh.inc.php');

console_log($_SERVER);


$pages = [
    'home' => [
        'file' => '403.html',
        'title' => 'Home',
    ],
    'about' => [
        'file' => 'about.php',
        'title' => 'About',
    ],
    'login' => [
        'file' => '/pages/account/login/login.php',
        'title' => 'login',
    ],
];

$route = $_GET['route'] ?? 'home';

if (!isset($pages[$route])) {
    http_response_code(404);
    exit('Page not found');
}

$page = $pages[$route];

require __DIR__ . '/' . $page['file'];

?>