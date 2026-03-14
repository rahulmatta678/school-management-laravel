<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-8 py-4 bg-white/5 border border-white/10 rounded-2xl font-black text-[10px] text-slate-400 uppercase tracking-widest italic hover:bg-white/10 hover:text-white focus:outline-none transition-all duration-300 disabled:opacity-25 active:scale-95']) }}>
    {{ $slot }}
</button>
