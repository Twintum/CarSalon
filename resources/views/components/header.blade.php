<header class="bg-gray-900 text-white py-4">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
            <!-- Логотип -->
            <a href="{{ route('index') }}" class="text-xl font-bold tracking-wider">AutoSalon</a>

            <!-- Навигация для десктопов -->
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('index') }}" class="text-sm hover:text-red-500 transition duration-300">Главная</a>
                <a href="{{ route('cars.index') }}"
                    class="text-sm hover:text-red-500 transition duration-300">Автомобили</a>
                <a href="#" class="text-sm hover:text-red-500 transition duration-300">Услуги</a>
                <a href="#" class="text-sm hover:text-red-500 transition duration-300">О нас</a>
                <a href="#" class="text-sm hover:text-red-500 transition duration-300">Контакты</a>
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <a href="{{ route('admin.cars') }}"
                        class="text-sm hover:text-red-500 transition duration-300">Админка</a>
                @endif
            </nav>

            <!-- Кнопка входа/выхода -->
            <div class="hidden md:block">
                @auth
                    <a href="{{ route('profile') }}" {{-- <a href="/profile" --}}
                        class="focus:outline-none text-white bg-primary-700 hover:bg-primary-800 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        Профиль
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="focus:outline-none text-white bg-primary-700 hover:bg-primary-800 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        Войти
                    </a>
                @endauth
            </div>

            <!-- Кнопка мобильного меню -->
            <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Мобильное меню -->
        <div id="mobile-menu" class="md:hidden hidden mt-4">
            <nav class="flex flex-col space-y-2">
                <a href="#" class="text-sm hover:text-red-500 transition duration-300">Главная</a>
                <a href="#" class="text-sm hover:text-red-500 transition duration-300">Автомобили</a>
                <a href="#" class="text-sm hover:text-red-500 transition duration-300">Услуги</a>
                <a href="#" class="text-sm hover:text-red-500 transition duration-300">О нас</a>
                <a href="#" class="text-sm hover:text-red-500 transition duration-300">Контакты</a>
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left text-sm hover:text-red-500 transition duration-300">
                            Выйти
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm hover:text-red-500 transition duration-300">Войти</a>
                @endauth
            </nav>
        </div>
    </div>
</header>
