<?php

class HomeController {
    
    private function render(string $content, array $variables = []): void {
        extract($variables);

        include __DIR__ . '/../Views/layout.php';
    }
    
    public function welcome(): void {
        $this->render("<h1>Добро пожаловать на наш сайт!</h1>");
    }

    public function sayBye(string $name): void {
        $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        
        $this->render("<h1>Пока, {$safeName}</h1>", [
            'title' => "Прощание с {$safeName}"
        ]);
    }

    public function sayHello(string $username): void {
        $safeName = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        
        $this->render("<h1>Приветствуем вас, {$safeName}!</h1>", [
            'title' => 'Страница приветствия'
        ]);
    }
    
    public function sayHelloDefault(): void {
        $this->render("<h1>Приветствуем вас, Гость!</h1>", [
            'title' => 'Страница приветствия'
        ]);
    }
}