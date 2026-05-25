<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Курсовая работа Кряжев Н.А.</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-white shadow mb-8">
        <div class="max-w-4xl mx-auto p-4 grid grid-cols-3 items-center">
            
            <div class="flex justify-start">
                <a href="{{ route('posts.index') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.svg') }}" alt="Логотип" class="h-8 w-auto object-contain">
                </a>
            </div>

            <div class="flex justify-center gap-6">
                <a href="{{ route('posts.index') }}" class="text-gray-600 font-semibold hover:text-blue-600 hover:underline transition">Лента</a>
                <a href="{{ route('authors.index') }}" class="text-gray-600 font-semibold hover:text-blue-600 hover:underline transition">Авторы</a>
                <a href="{{ route('page.support') }}" class="text-gray-600 font-semibold hover:text-blue-600 hover:underline transition">Поддержка</a>
            </div>

            <div class="flex justify-end">
                </div>

        </div>
    </nav>

    @if(session('success'))
        <div class="max-w-4xl mx-auto mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</body>
</html>