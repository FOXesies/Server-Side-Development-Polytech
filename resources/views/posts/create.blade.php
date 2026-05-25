@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded shadow-sm">
    <h1 class="text-2xl font-bold mb-6">Создать пост</h1>
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Автор</label>
            <select name="author_id" class="w-full border p-2 rounded" required>
                @foreach($authors as $author)
                    <option value="{{ $author['id'] }}">{{ $author['last_name'] }} {{ $author['first_name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Текст поста</label>
            <textarea name="content" rows="5" class="w-full border p-2 rounded" required></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Опубликовать</button>
    </form>
</div>
@endsection