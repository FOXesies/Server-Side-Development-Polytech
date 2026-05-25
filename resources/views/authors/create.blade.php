@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded shadow-sm">
    <h1 class="text-2xl font-bold mb-6 text-center">Добавить автора</h1>
    
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.authors.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-2 gap-4">
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Фамилия" class="border p-2 rounded" required>
            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Имя" class="border p-2 rounded" required>
            <input type="text" name="middle_name" value="{{ old('middle_name') }}" placeholder="Отчество (опционально)" class="border p-2 rounded">
            
            <select name="gender" class="border p-2 rounded" required>
                <option value="Мужской" {{ old('gender') == 'Мужской' ? 'selected' : '' }}>Мужской</option>
                <option value="Женский" {{ old('gender') == 'Женский' ? 'selected' : '' }}>Женский</option>
            </select>
            
            <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="border p-2 rounded" required>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Телефон" class="border p-2 rounded" required>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" class="border p-2 rounded" required>
            <input type="text" name="address" value="{{ old('address') }}" placeholder="Адрес" class="border p-2 rounded" required>
        </div>
        
        <textarea name="comment" placeholder="Комментарий..." class="w-full border p-2 rounded mt-4">{{ old('comment') }}</textarea>
        
        <div class="mt-6 flex justify-center">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded transition shadow-sm">
                Сохранить
            </button>
        </div>
    </form>
</div>
@endsection