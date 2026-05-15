<?php
require_once __DIR__ . '/../src/Services/HeaderService.php';
use App\Services\HeaderService;

$service = new HeaderService();
// Парсим заголовки httpbin, так как он фигурирует в ТЗ
$headers = $service->getUrlHeaders('https://httpbin.org/post');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результат выполнения</title>
    <link rel="stylesheet" href="/assets/css/home_style.css">
</head>
<body>
    <section class="form-container">
        <header class="main-header" style="justify-content: flex-start; margin-bottom: 20px;">
             <h2 class="form-title">Результат работы функции get_headers</h2>
        </header>

        <div class="feedback-form">
            <div class="feedback-form__group">
                <label class="feedback-form__label">Заголовки для: <strong>https://httpbin.org</strong></label>
                <textarea 
                    class="feedback-form__input feedback-form__textarea" 
                    readonly 
                    rows="15"
                    style="font-family: monospace; background-color: #f4f4f4; resize: none;"
                ><?= htmlspecialchars($headers) ?></textarea>
            </div>

            <div class="feedback-form__actions">
                <a href="/" class="feedback-form__submit" style="text-decoration: none; text-align: center; display: block;">
                    Вернуться к форме
                </a>
            </div>
        </div>
    </section>
</body>
</html>