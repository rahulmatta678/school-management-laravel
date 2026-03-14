@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-black text-white uppercase italic tracking-widest focus:outline-none transition-all duration-300 shadow-[0_4px_20px_-5px_rgba(99,102,241,0.5)]'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-black text-slate-500 uppercase italic tracking-widest hover:text-white hover:border-slate-300 focus:outline-none transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
