<?php
require_once __DIR__ . '/../src/Services/HeaderService.php';
use App\Services\HeaderService;

$service = new HeaderService();
// Парсим заголовки httpbin, так как он фигурирует в ТЗ
$headers = $service->getUrlHeaders('https://httpbin.org/post');
?>

<section class="form-container">
    <div class="feedback-form">
        <div class="feedback-form__group">
            <label class="feedback-form__label">Заголовки для: <strong>https://httpbin.org</strong></label>
            <textarea 
                class="feedback-form__input feedback-form__textarea" 
                readonly 
                rows="15"
            ><?= htmlspecialchars($headers) ?></textarea>
        </div>

        <div class="feedback-form__actions">
            <button href="/" class="feedback-form__submit">
                Вернуться к форме
            </button>
        </div>
    </div>
</section>