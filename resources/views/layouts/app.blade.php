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
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

                        <!-- Уведомление -->
            @if(session('warning'))
                <div id="alert-warning" class="mb-6 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-lg relative">
                    {{ session('warning') }}
                    <button type="button" class="absolute top-3 right-3 text-yellow-700 hover:text-yellow-900" 
                            onclick="this.parentElement.style.display='none'">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif

            @if(session('info'))
                <div id="alert-info" class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative">
                    {{ session('info') }}
                    <button type="button" class="absolute top-3 right-3 text-green-700 hover:text-green-900" 
                            onclick="this.parentElement.style.display='none'">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif

            @if(session('success'))
                <div id="alert-success" class="mb-6 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-lg relative">
                    {{ session('success') }}
                    <button type="button" class="absolute top-3 right-3 text-blue-700 hover:text-blue-900" 
                            onclick="this.parentElement.style.display='none'">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div id="alert-error" class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative">
                    {{ session('error') }}
                    <button type="button" class="absolute top-3 right-3 text-red-700 hover:text-red-900" 
                            onclick="this.parentElement.style.display='none'">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
