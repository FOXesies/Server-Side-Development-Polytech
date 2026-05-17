<?php

require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/Controller/HomeController.php';

$router = new Router();

$router->add('/welcome', [HomeController::class, 'welcome']);
$router->add('/bye/{name}', [HomeController::class, 'sayBye']);
$router->add('/hello', [HomeController::class, 'sayHelloDefault']);
$router->add('/hello/{username}', [HomeController::class, 'sayHello']);

$currentUri = $_SERVER['REQUEST_URI'];

$currentUri = str_replace('/index.php', '', $currentUri);
$currentUri = str_replace('/bye/public', '', $currentUri); 

if (empty($currentUri)) {
    $currentUri = '/';
}

$router->dispatch($currentUri);