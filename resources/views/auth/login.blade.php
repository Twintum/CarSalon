@extends('layouts.auth')

@section('content')
    <h2 class="text-2xl font-bold mb-4 text-center">Вход</h2>

    <form class="max-w-md mx-auto" id="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary-700 focus:outline-none focus:ring-0 focus:border-primary-600 peer"
                placeholder=" " required />
            <label for="email"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-primary-600 peer-focus:dark:text-primary-700 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="password" id="password" value="{{ old('password') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-primary-700 focus:outline-none focus:ring-0 focus:border-primary-600 peer"
                placeholder=" " required />
            <label for="password"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary-600 peer-focus:dark:text-primary-700 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Пароль</label>
        </div>


        @if ($errors->any())
            <div class="mb-4 p-4 text-red-800 bg-red-200 border border-red-400 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex justify-between">
            <a href="{{ route('register') }}" class="text-gray-500">Регистрация &#8594;</a>
            <button type="submit"
                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Вход
            </button>
        </div>
    </form>
@endsection
