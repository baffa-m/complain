<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-green-100">
    <div class="flex">

        <!-- Sidebar -->
        @include('layouts.partials.sidebar')

        <!-- Content Container -->
        <div class="flex flex-col w-full transition-transform ease-in-out duration-300 transform">
            <x-banner />
            @include('layouts.partials.header')

            <div class="p-3 text-base font-bold text-gray-900 hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                <h2>Hi, {{ auth()->user()->name }}</h2>
            </div>

            <main class="container mx-auto px-5 flex-grow">
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')
    @livewireScripts
</body>
</html>
