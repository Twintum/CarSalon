@extends('layouts.main')

@section('content')
    <div class="bg-gray-100">
        <!-- Hero секция -->
        <div class="bg-gray-900 text-white py-20">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Добро пожаловать в AutoSalon</h1>
                <p class="text-xl mb-8">Найдите автомобиль своей мечты</p>
                <a href="#"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Просмотреть каталог
                </a>
            </div>
        </div>

        <!-- Преимущества -->
        <div class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Почему выбирают нас</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Широкий выбор</h3>
                        <p class="text-gray-600">Более 1000 автомобилей различных марок и моделей</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Выгодные условия</h3>
                        <p class="text-gray-600">Кредит, лизинг и специальные предложения</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-4">Гарантия качества</h3>
                        <p class="text-gray-600">Предпродажная подготовка и гарантийное обслуживание</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Популярные модели -->
        <div class="bg-white py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Популярные модели</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md">
                            <img src="https://via.placeholder.com/300x200" alt="Car {{ $i }}"
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2">Модель автомобиля {{ $i }}</h3>
                                <p class="text-gray-600 mb-4">Краткое описание автомобиля {{ $i }}</p>
                                <a href="#" class="text-red-600 hover:text-red-700 font-semibold">Подробнее</a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Призыв к действию -->
        <div class="bg-gray-900 text-white py-16">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-4">Готовы выбрать свой идеальный автомобиль?</h2>
                <p class="text-xl mb-8">Запишитесь на тест-драйв прямо сейчас!</p>
                <a href="#"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Записаться на тест-драйв
                </a>
            </div>
        </div>
    </div>
@endsection
