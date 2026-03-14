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
            .auth-side-aurora {
                background: radial-gradient(circle at 50% 50%, #1e1b4b 0%, #000000 100%);
            }
        </style>
    </head>
    <body class="h-full antialiased text-slate-400 bg-black overflow-hidden">
        <div class="flex min-h-full">
            <!-- Left Side: Visual / Minimalist Brand -->
            <div class="relative hidden w-0 flex-1 lg:block auth-side-aurora overflow-hidden border-r border-white/5">
                <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 mix-blend-overlay"></div>
                <div class="aurora-blur bg-indigo-500 w-[600px] h-[600px] -top-20 -left-20 opacity-20"></div>
                
                <div class="absolute inset-0 flex flex-col items-start justify-between p-16">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-indigo-600 shadow-[0_0_30px_rgba(79,70,229,0.4)]">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-black tracking-tighter text-white uppercase italic">Lumina<span class="text-indigo-500">.</span></span>
                    </div>

                    <div class="max-w-md">
                        <h2 class="text-5xl font-black tracking-tighter text-white uppercase italic leading-[0.9] mb-6">
                            Verified <br/> Access Port
                        </h2>
                        <p class="text-lg font-bold text-slate-500 uppercase tracking-widest leading-relaxed">
                            Secured school infrastructure management. Multi-tenant protocol active.
                        </p>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></div>
                        <div class="w-2 h-2 rounded-full bg-slate-800"></div>
                        <div class="w-2 h-2 rounded-full bg-slate-800"></div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Clean Form Area -->
            <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:flex-none lg:px-24 xl:px-32 bg-[#0c0c0e] relative z-10 shadow-[-50px_0_100px_rgba(0,0,0,0.8)]">
                <div class="mx-auto w-full max-w-sm lg:w-[400px]">
                    <div class="lg:hidden mb-12">
                         <div class="flex items-center gap-3">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-indigo-600">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <span class="text-xl font-black tracking-tighter text-white uppercase italic">Lumina</span>
                        </div>
                    </div>

                    <div class="mt-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
