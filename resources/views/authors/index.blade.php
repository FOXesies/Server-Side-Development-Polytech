@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow-sm">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Список авторов</h1>
        <a href="{{ route('admin.authors.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">Добавить автора</a>
    </div>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b">
                <th class="p-2 w-16">ID</th> 
                <th class="p-2">ФИО</th>
                <th class="p-2">Телефон</th>
                <th class="p-2">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
            <tr class="border-b">
                <td class="p-2 text-gray-500 font-mono">{{ $author['id'] }}</td>
                <td class="p-2">{{ $author['last_name'] }} {{ $author['first_name'] }}</td>
                <td class="p-2">{{ $author['phone'] }}</td>
                <td class="p-2 flex gap-2">
                    <a href="{{ route('admin.authors.edit', $author['id']) }}" class="text-blue-500">Изменить</a>
                    <form action="{{ route('admin.authors.destroy', $author['id']) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection