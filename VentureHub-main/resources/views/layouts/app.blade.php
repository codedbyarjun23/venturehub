<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'VentureHub') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-100 bg-[#0b0f19] min-h-screen relative selection:bg-indigo-500 selection:text-white overflow-x-hidden">
        <!-- Stunning Animated Background Elements -->
        <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none bg-[#0b0f19]">
            <div class="absolute top-[-20%] left-[-10%] w-[800px] h-[800px] bg-purple-600/30 rounded-full mix-blend-screen filter blur-[150px] opacity-60 animate-blob"></div>
            <div class="absolute top-[10%] right-[-10%] w-[600px] h-[600px] bg-indigo-600/30 rounded-full mix-blend-screen filter blur-[150px] opacity-60 animate-blob" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-[-20%] left-[20%] w-[700px] h-[700px] bg-fuchsia-600/20 rounded-full mix-blend-screen filter blur-[150px] opacity-60 animate-blob" style="animation-delay: 4s;"></div>
            <div class="absolute top-[40%] left-[40%] w-[500px] h-[500px] bg-blue-600/20 rounded-full mix-blend-screen filter blur-[120px] opacity-50 animate-blob" style="animation-delay: 6s;"></div>
        </div>

        <div class="min-h-screen relative z-0 flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="glass-panel sticky top-0 z-10 transition-all duration-300 border-b-0 border-white/[0.08]">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 page-enter-header">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-10 flex-grow page-enter-content">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
