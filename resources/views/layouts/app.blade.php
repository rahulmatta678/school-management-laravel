<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-black">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Lumina Elite') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            [x-cloak] { display: none !important; }
            
            /* Elite Scrollbar */
            ::-webkit-scrollbar { width: 5px; height: 5px; }
            ::-webkit-scrollbar-track { background: transparent; }
            ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
            ::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.2); }
        </style>
    </head>
    <body class="h-full antialiased text-slate-400 bg-black overflow-hidden selection:bg-indigo-500/30">
        <!-- Dashboard Foundation -->
        <div class="fixed inset-0 pointer-events-none">
            <div class="aurora-blur bg-indigo-600/10 w-[800px] h-[800px] -top-96 -left-96"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 mix-blend-overlay"></div>
        </div>

        <div x-data="{ sidebarOpen: false }" class="relative flex h-screen p-4 lg:p-6 gap-4 lg:gap-6 overflow-hidden">
            
            <!-- Sidebar / Navigation -->
            @include('layouts.navigation')

            <!-- Main Content Area: The Floating Canvas -->
            <div class="flex-1 flex flex-col min-w-0 bg-[#0c0c0e] border border-white/5 rounded-[2.5rem] shadow-[0_0_100px_rgba(0,0,0,0.8)] overflow-hidden">
                
                <!-- Core Dashboard Header -->
                <header class="flex-shrink-0 flex items-center justify-between px-8 h-24 border-b border-white/5 bg-white/[0.01]">
                    <div class="flex items-center gap-4">
                        <button @click="sidebarOpen = true" class="p-3 text-slate-500 hover:text-white lg:hidden">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </button>
                        
                        @isset($header)
                            <div class="flex flex-col">
                                {{ $header }}
                            </div>
                        @endisset
                    </div>

                    <div class="flex items-center gap-6">
                        <!-- User Status -->
                        <div class="hidden sm:flex items-center gap-4 px-4 py-2 rounded-2xl bg-white/[0.02] border border-white/5">
                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></div>
                            <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">System Online</span>
                        </div>
                    </div>
                </header>

                <!-- Scrollable Body -->
                <main class="flex-1 overflow-y-auto custom-scrollbar p-8 lg:p-12">
                    <div class="max-w-[1400px]">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
