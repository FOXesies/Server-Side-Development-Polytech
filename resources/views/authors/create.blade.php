@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded shadow-sm">
    <h1 class="text-2xl font-bold mb-6">Добавить автора</h1>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <input type="text" name="last_name" placeholder="Фамилия" class="border p-2 rounded" required>
            <input type="text" name="first_name" placeholder="Имя" class="border p-2 rounded" required>
            <input type="text" name="middle_name" placeholder="Отчество (опционально)" class="border p-2 rounded">
            
            <select name="gender" class="border p-2 rounded" required>
                <option value="Мужской">Мужской</option>
                <option value="Женский">Женский</option>
            </select>
            
            <input type="date" name="birth_date" class="border p-2 rounded" required>
            <input type="text" name="phone" placeholder="Телефон" class="border p-2 rounded" required>
            <input type="email" name="email" placeholder="E-mail" class="border p-2 rounded" required>
            <input type="text" name="address" placeholder="Адрес" class="border p-2 rounded" required>
        </div>
        <textarea name="comment" placeholder="Комментарий..." class="w-full border p-2 rounded mt-4"></textarea>
        <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded">Сохранить</button>
    </form>
</div>
@endsection