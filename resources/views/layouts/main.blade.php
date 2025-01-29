<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AutoSalon') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <x-header />

        <main>
            @yield('content')
        </main>

        @if (session('success'))
            <div id="notification"
                class="fixed bottom-4 right-4 p-4 bg-green-500 text-white rounded-lg shadow-lg transition-opacity duration-300 ease-in-out opacity-0">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const notification = document.getElementById('notification');
                    if (notification) {
                        notification.classList.remove('opacity-0');
                        notification.classList.add('opacity-100');

                        setTimeout(function() {
                            notification.classList.remove('opacity-100');
                            notification.classList.add('opacity-0');
                        }, 5000);
                    }
                });
            </script>
        @endif

        @if (session('error'))
            <div id="error-notification"
                class="fixed bottom-4 right-4 p-4 bg-red-500 text-white rounded-lg shadow-lg transition-opacity duration-300 ease-in-out opacity-0">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const errorNotification = document.getElementById('error-notification');
                    if (errorNotification) {
                        errorNotification.classList.remove('opacity-0');
                        errorNotification.classList.add('opacity-100');

                        setTimeout(function() {
                            errorNotification.classList.remove('opacity-100');
                            errorNotification.classList.add('opacity-0');
                        }, 5000);
                    }
                });
            </script>
        @endif


</body>

</html>
