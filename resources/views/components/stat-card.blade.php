@php
    $variants = [
        'indigo' => 'border-indigo-500/20 bg-indigo-500/5 text-white',
        'emerald' => 'border-emerald-500/20 bg-emerald-500/5 text-white',
        'amber' => 'border-amber-500/20 bg-amber-500/5 text-white',
        'rose' => 'border-rose-500/20 bg-rose-500/5 text-white',
        'blue' => 'border-blue-500/20 bg-blue-500/5 text-white',
    ];

    $colorClasses = $variants[$variant] ?? $variants['indigo'];
    $iconColors = [
        'indigo' => 'text-indigo-400',
        'emerald' => 'text-emerald-400',
        'amber' => 'text-amber-400',
        'rose' => 'text-rose-400',
        'blue' => 'text-blue-400',
    ];
    $iconColor = $iconColors[$variant] ?? 'text-indigo-400';
@endphp

<div {{ $attributes->merge(['class' => "$colorClasses elite-canvas p-10 elite-hover group"]) }}>
    <div class="flex items-center justify-between gap-6">
        <div class="min-w-0">
            <h3 class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] italic mb-4">{{ $title }}</h3>
            <p class="text-5xl font-black tracking-tighter text-white group-hover:text-indigo-400 transition-colors uppercase italic">{{ $value }}</p>
        </div>
        @if($icon)
            <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/5 {{ $iconColor }} group-hover:scale-110 group-hover:-rotate-12 transition-all duration-500">
                {!! $icon !!}
            </div>
        @endif
    </div>
</div>