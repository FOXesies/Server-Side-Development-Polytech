@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto my-12 p-8 bg-white rounded shadow-sm text-center">
    <div class="flex justify-center mb-4">
        <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
        </svg>
    </div>

    <h1 class="text-4xl font-extrabold text-gray-800 mb-2">404</h1>
    <h2 class="text-xl font-bold text-gray-700 mb-4">Упс! Страница не найдена</h2>
    
    <p class="text-gray-600 mb-6 bg-gray-50 p-3 rounded border border-gray-100 font-medium">
        {{ $exception->getMessage() ?: 'Запрашиваемая страница перемещена или никогда не существовала.' }}
    </p>

    <a href="{{ route('posts.index') }}" 
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition duration-200">
        Вернуться в ленту
    </a>
</div>
@endsection