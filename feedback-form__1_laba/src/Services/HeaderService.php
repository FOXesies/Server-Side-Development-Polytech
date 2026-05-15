<?php

namespace App\Services;

class HeaderService
{
    /**
     * Получает заголовки для указанного URL и возвращает их строкой
     */
    public function getUrlHeaders(string $url): string
    {
        // Настройка контекста, чтобы избежать блокировок
        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n"
            ]
        ];
        $context = stream_context_create($opts);

        // Попытка получить заголовки
        $headers = get_headers($url, 0, $context);

        if (!$headers) {
            return "Ошибка: Не удалось получить заголовки для URL: $url. \nВозможно, на сервере отключен allow_url_fopen или расширение OpenSSL.";
        }

        return implode(PHP_EOL, $headers);
    }
}