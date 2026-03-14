<x-app-layout>
    <div class="mb-12">
        <h2 class="text-4xl font-black text-white uppercase italic tracking-tighter leading-none">
            {{ __('Terminal Dashboard') }}<span class="text-indigo-500">.</span>
        </h2>
        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Operational status and quick access protocols</p>
    </div>

    <div class="elite-canvas p-12">
        <div class="flex items-center gap-6 mb-8">
            <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center">
                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <div>
                <h3 class="text-xl font-black text-white uppercase italic tracking-tighter">Welcome back, {{ auth()->user()->name }}</h3>
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest italic">Authorization Level: {{ auth()->user()->role->label() }}</p>
            </div>
        </div>

        <div class="text-slate-400 font-bold uppercase italic text-xs leading-relaxed max-w-2xl bg-white/[0.01] border border-white/5 p-8 rounded-3xl">
            {{ __("You're logged in to the Lumina Elite core. Navigate via the sidebar to manage school registry, faculty communication, and system parameters.") }}
        </div>
    </div>
</x-app-layout>
