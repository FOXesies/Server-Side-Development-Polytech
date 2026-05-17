<?php

require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/Controller/HomeController.php';

$router = new Router();

// Регистрируем маршруты
$router->add('/welcome', [HomeController::class, 'welcome']);
$router->add('/bye/{name}', [HomeController::class, 'sayBye']);

$currentUri = $_SERVER['REQUEST_URI'];
$router->dispatch($currentUri);