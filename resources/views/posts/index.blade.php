@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">
            {{ $isFiltered ? 'Записи выбранного автора' : 'Все публикации' }}
        </h1>
        <div class="space-x-2">
            @if($isFiltered)
                <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline mr-4">Показать все</a>
            @endif
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Добавить пост</a>
        </div>
    </div>

    @if(empty($posts))
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded" role="alert">
            <p class="font-bold">Уведомление</p>
            <p>У данного пользователя пока нет опубликованных записей (или лента абсолютно пуста).</p>
        </div>
    @else
        @foreach($posts as $post)
            <div class="border p-4 rounded-lg mb-4 bg-white shadow-sm">
                <div class="flex justify-between text-sm text-gray-500 mb-2">
                    <span class="font-semibold text-gray-800">
                        <a href="{{ route('posts.index', ['author_id' => $post['author']['id']]) }}" class="hover:text-blue-600 hover:underline">
                            {{ $post['author']['last_name'] }} {{ $post['author']['first_name'] }}
                        </a>
                    </span>
                    <span>{{ \Carbon\Carbon::parse($post['published_at'])->format('d.m.Y H:i') }}</span>
                </div>
                <p class="text-gray-700 whitespace-pre-line">{{ $post['content'] }}</p>
                
                <div class="mt-4 pt-4 border-t flex space-x-3 text-sm">
                    <a href="{{ route('posts.edit', $post['id']) }}" class="text-blue-500 hover:underline">Редактировать</a>
                    <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" onsubmit="return confirm('Удалить пост?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection