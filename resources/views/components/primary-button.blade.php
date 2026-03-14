<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full inline-flex items-center justify-center px-8 py-5 bg-white text-black hover:bg-indigo-600 hover:text-white rounded-[2rem] font-black text-sm uppercase italic tracking-widest transition-all duration-300 shadow-xl']) }}>
    {{ $slot }}
</button>
