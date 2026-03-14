<!-- Off-canvas menu for mobile -->
<div x-show="sidebarOpen" class="fixed inset-0 flex z-50 lg:hidden" x-ref="dialog" aria-modal="true" x-cloak>
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/90 backdrop-blur-sm" @click="sidebarOpen = false"></div>

    <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative flex-1 flex flex-col max-w-xs w-full bg-[#0c0c0e] border-r border-white/5">
        <div class="absolute top-0 right-0 -mr-12 pt-2">
            <button @click="sidebarOpen = false" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none">
                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex-1 h-0 pt-8 pb-4 overflow-y-auto">
            <div class="flex-shrink-0 flex items-center px-8 mb-10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-indigo-600">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-black tracking-tighter text-white uppercase italic">Lumina</span>
                </div>
            </div>
            <nav class="px-3 space-y-2">
                @include('layouts.nav-links')
            </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-white/5 p-6">
            @include('layouts.nav-user')
        </div>
    </div>
</div>

<!-- Static sidebar for desktop -->
<div class="hidden lg:flex lg:flex-shrink-0">
    <div class="flex flex-col w-80">
        <div class="flex flex-col h-full bg-black">
            <div class="flex-1 flex flex-col pt-12 pb-4 overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-8 mb-16">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-indigo-600 shadow-[0_0_30px_rgba(79,70,229,0.3)]">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-black tracking-tighter text-white uppercase italic leading-none">Lumina<span class="text-indigo-500">.</span></span>
                    </div>
                </div>
                
                <div class="px-8 mb-6">
                    <p class="text-[10px] font-black text-slate-600 uppercase tracking-[0.2em] mb-4">Portal Menu</p>
                    <nav class="space-y-3">
                        @include('layouts.nav-links')
                    </nav>
                </div>
            </div>
            
            <div class="p-8">
                <div class="elite-canvas p-6 elite-hover border-indigo-500/20 bg-indigo-500/5">
                    @include('layouts.nav-user')
                </div>
            </div>
        </div>
    </div>
</div>
