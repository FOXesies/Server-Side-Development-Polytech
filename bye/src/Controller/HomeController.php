<?php

class HomeController {
    
    public function welcome(): void {
        echo "<h1>Добро пожаловать на наш сайт!</h1>";
    }

    public function sayBye(string $name): void {
        $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        echo "<h1>Пока, {$safeName}</h1>";
    }
}