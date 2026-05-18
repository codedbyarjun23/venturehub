<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VentureHub - The Startup Networking Platform</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:300,400,500,600,700,800,900" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-[#0b0f19] text-gray-100 selection:bg-indigo-500/30 font-sans overflow-x-hidden relative">
        <!-- Background Elements -->
        <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-600/20 rounded-full blur-[120px] mix-blend-screen animate-blob"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-purple-600/20 rounded-full blur-[120px] mix-blend-screen animate-blob animation-delay-2000"></div>
            <div class="absolute top-[40%] left-[60%] w-[30%] h-[30%] bg-pink-600/10 rounded-full blur-[100px] mix-blend-screen animate-blob animation-delay-4000"></div>
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiLz4KPC9zdmc+')] opacity-20"></div>
        </div>

        <div class="relative z-10 flex flex-col min-h-screen">
            <!-- Navigation -->
            <nav class="w-full max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="text-2xl font-black tracking-tight text-white">Venture<span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-500">Hub</span></span>
                </div>
                
                @if (Route::has('login'))
                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-gray-300 hover:text-white transition-colors duration-300">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-300 hover:text-white transition-colors duration-300">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-white transition-all duration-300 bg-white/10 hover:bg-white/20 border border-white/10 rounded-full backdrop-blur-md hover:shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:-translate-y-0.5">
                                    Join the Hub
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>

            <!-- Hero Section -->
            <main class="flex-grow flex flex-col lg:flex-row items-center justify-center max-w-7xl mx-auto px-6 gap-16 py-12 lg:py-0">
                
                <!-- Text Content -->
                <div class="w-full lg:w-1/2 flex flex-col items-start text-left z-10">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-300 text-xs font-bold uppercase tracking-wider mb-6">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                        </span>
                        Now in Public Beta
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl font-black text-white leading-tight mb-6 tracking-tight">
                        Pitch Ideas.<br>
                        Build <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 animate-gradient-x">Startups.</span>
                    </h1>
                    
                    <p class="text-xl text-gray-400 leading-relaxed mb-10 max-w-lg font-light">
                        VentureHub is the premier networking platform for founders, developers, and designers to connect, share ideas, and build the future together.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="whitespace-nowrap relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full hover:from-indigo-500 hover:to-purple-500 shadow-[0_0_30px_rgba(99,102,241,0.3)] hover:shadow-[0_0_40px_rgba(168,85,247,0.5)] hover:-translate-y-1">
                                Go to Dashboard
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="whitespace-nowrap relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full hover:from-indigo-500 hover:to-purple-500 shadow-[0_0_30px_rgba(99,102,241,0.3)] hover:shadow-[0_0_40px_rgba(168,85,247,0.5)] hover:-translate-y-1">
                                Get Started Free
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                            </a>
                            <a href="{{ route('login') }}" class="whitespace-nowrap relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 bg-[#151b2b] border border-white/10 rounded-full hover:bg-[#1a2235] hover:border-white/20 hover:-translate-y-1">
                                Login
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="w-full lg:w-1/2 relative z-10 flex justify-center animate-float">
                    <div class="relative w-full max-w-lg aspect-square">
                        <!-- Decorative ring -->
                        <div class="absolute inset-0 rounded-full border border-white/5 border-dashed animate-[spin_60s_linear_infinite]"></div>
                        <div class="absolute inset-4 rounded-full border border-indigo-500/20 border-dashed animate-[spin_40s_linear_infinite_reverse]"></div>
                        
                        <!-- Main Image -->
                        <div class="absolute inset-8 rounded-3xl overflow-hidden border border-white/10 shadow-[0_0_50px_rgba(99,102,241,0.2)] bg-[#151b2b] p-2 backdrop-blur-sm">
                            <img src="{{ asset('images/hero.png') }}" alt="VentureHub Networking" class="w-full h-full object-cover rounded-2xl">
                            
                            <!-- Overlay gradients -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500/10 to-transparent pointer-events-none rounded-2xl"></div>
                        </div>

                        <!-- Floating Badges -->
                        <div class="absolute top-12 -left-6 bg-[#0b0f19]/80 backdrop-blur-md border border-white/10 p-4 rounded-2xl shadow-xl animate-bounce" style="animation-duration: 3s;">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 font-medium">New Pitch</p>
                                    <p class="text-sm text-white font-bold">AI SaaS Platform</p>
                                </div>
                            </div>
                        </div>

                        <div class="absolute bottom-24 -right-6 bg-[#0b0f19]/80 backdrop-blur-md border border-white/10 p-4 rounded-2xl shadow-xl animate-bounce" style="animation-duration: 4s; animation-delay: 1s;">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-pink-500/20 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400 font-medium">Trending</p>
                                    <p class="text-sm text-white font-bold">244 Upvotes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>

            <!-- Social Proof / Footer -->
            <footer class="w-full py-8 border-t border-white/5 mt-auto z-10">
                <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-gray-500 font-medium">© {{ date('Y') }} VentureHub. Empowering the next generation of founders.</p>
                    <div class="flex items-center gap-6">
                        <span class="text-sm text-gray-400 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                            All systems operational
                        </span>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
