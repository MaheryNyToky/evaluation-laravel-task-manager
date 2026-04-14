<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">

@if (Route::has('login'))
    <div class="absolute top-0 right-0 p-6 text-right z-10">
        @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-6 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Register</a>
            @endif
        @endauth
    </div>
@endif

<div class="relative min-h-screen flex flex-col items-center justify-center">
    <main class="flex flex-col items-center text-center px-6">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white">Bienvenue sur Task Manager</h1>
        <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Connectez-vous pour gérer vos projets.</p>
    </main>
</div>

</body>
</html>
