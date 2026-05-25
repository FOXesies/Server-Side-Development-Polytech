@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow-sm">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Оставить обращение</h2>

    <form action="https://httpbin.org/post" method="POST" class="space-y-4">
        
        <div class="flex flex-col">
            <label for="username" class="mb-1 font-semibold text-gray-700">Имя пользователя</label>
            <input type="text" id="username" name="username" required 
                   placeholder="Иван Иванов" 
                   class="w-full padding-2 border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
        </div>

        <div class="flex flex-col">
            <label for="email" class="mb-1 font-semibold text-gray-700">E-mail пользователя</label>
            <input type="email" id="email" name="email" required 
                   placeholder="example@mail.ru" 
                   class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
        </div>

        <div class="flex flex-col">
            <label for="type" class="mb-1 font-semibold text-gray-700">Тип обращения</label>
            <select id="type" name="type" required 
                    class="w-full border border-gray-300 rounded p-2 bg-white focus:outline-none focus:border-blue-500">
                <option value="" disabled selected>Выберите тип...</option>
                <option value="жалоба">Жалоба</option>
                <option value="предложение">Предложение</option>
                <option value="благодарность">Благодарность</option>
            </select>
        </div>

        <div class="flex flex-col">
            <label for="message" class="mb-1 font-semibold text-gray-700">Текст обращения</label>
            <textarea id="message" name="message" rows="5" required 
                      placeholder="Введите ваше сообщение..." 
                      class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500"></textarea>
        </div>

        <div class="flex flex-col gap-2 pt-2">
            <span class="font-semibold text-gray-700">Вариант ответа:</span>
            <div class="flex gap-4">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="response_channels[]" value="sms" checked 
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-gray-700">SMS</span>
                </label>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="response_channels[]" value="email" 
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-gray-700">E-mail</span>
                </label>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                Отправить обращение
            </button>
        </div>
    </form>
</div>
@endsection