<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lumina Elite | The Standard of Education</title>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            .text-aurora {
                background: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
        </style>
    </head>
    <body class="antialiased bg-[#000000] text-slate-100 selection:bg-indigo-500/30 overflow-x-hidden">
        <!-- Visual Foundation -->
        <div class="fixed inset-0 pointer-events-none">
            <div class="aurora-blur bg-indigo-600 w-[500px] h-[500px] -top-40 -left-40 opacity-10"></div>
            <div class="aurora-blur bg-purple-600 w-[500px] h-[500px] bottom-0 right-0 opacity-10"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 mix-blend-overlay"></div>
        </div>

        <div class="relative min-h-screen flex flex-col">
            <!-- Header -->
            <nav class="relative z-50 flex items-center justify-between px-8 py-8 mx-auto w-full max-w-[1400px]">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-indigo-600 shadow-[0_0_30px_rgba(79,70,229,0.4)]">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <span class="text-2xl font-black tracking-tighter text-white uppercase italic">Lumina<span class="text-indigo-500">.</span></span>
                </div>
                
                <div class="flex items-center gap-8">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-slate-400 hover:text-white transition-all uppercase tracking-widest">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-bold text-slate-400 hover:text-white transition-all uppercase tracking-widest">Sign In</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-2xl border border-white/10 bg-white/5 px-6 py-3 text-sm font-bold text-white hover:bg-white hover:text-black transition-all shadow-xl uppercase tracking-widest">Get Started</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>

            <!-- Hero Section -->
            <main class="flex-grow flex flex-col items-center justify-center px-6 text-center py-20">
                <div class="animate-float mb-12">
                    <div class="inline-flex items-center rounded-full px-4 py-1.5 text-xs font-black uppercase tracking-[0.2em] text-indigo-400 border border-indigo-500/30 bg-indigo-500/5">
                        Modern School Management
                    </div>
                </div>

                <h1 class="max-w-5xl text-6xl font-[1000] tracking-tighter text-white sm:text-9xl mb-10 leading-[1] uppercase italic">
                    The Elite <br/>
                    <span class="text-aurora">Education Manager</span>
                </h1>
                
                <p class="max-w-xl mx-auto text-lg font-medium leading-relaxed text-slate-400 mb-14">
                    Architected for educational excellence.
                    Streamlined teacher and student management with a premium interface.
                </p>

                <div class="flex flex-col sm:flex-row items-center gap-6">
                    <a href="{{ route('register') }}" class="group relative px-10 py-5 bg-indigo-600 rounded-[2rem] text-lg font-black text-white shadow-[0_0_40px_rgba(79,70,229,0.3)] hover:scale-105 transition-all overflow-hidden uppercase italic">
                        <span class="relative z-10 font-black">Register Now</span>
                        <div class="absolute inset-0 bg-white translate-y-full group-hover:translate-y-0 transition-transform duration-500 opacity-10"></div>
                    </a>
                    <a href="#features" class="px-10 py-5 rounded-[2rem] border border-white/10 text-lg font-black text-white hover:bg-white/5 transition-all uppercase italic">
                        Explore Features
                    </a>
                </div>
            </main>

            <!-- Floating Preview Section -->
            <section id="features" class="w-full max-w-[1400px] mx-auto px-8 py-32">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @php 
                        $features = [
                            ['Administration', 'Comprehensive tools for managing staff and departments.', 'glow-indigo'],
                            ['Education', 'Empower teachers with modern classroom tools.', 'glow-purple'],
                            ['Engagement', 'Keep students and parents connected and informed.', 'glow-indigo']
                        ];
                    @endphp

                    @foreach($features as $f)
                    <div class="elite-canvas group p-10 elite-hover">
                        <div class="w-12 h-2 bg-indigo-500 mb-8"></div>
                        <h3 class="text-2xl font-black text-white mb-4 uppercase italic">{{ $f[0] }}</h3>
                        <p class="text-slate-400 leading-relaxed font-medium">{{ $f[1] }}</p>
                    </div>
                    @endforeach
                </div>
            </section>
            
            <!-- Footer -->
            <footer class="py-12 border-t border-white/5 mt-auto">
                <div class="mx-auto max-w-7xl px-8 flex justify-between items-center text-slate-500 font-bold text-xs uppercase tracking-widest">
                    <p>© 2026 Lumina Elite. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>
