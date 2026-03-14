@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-white/10 focus:border-indigo-600 focus:ring-0 rounded-2xl bg-white/[0.02] text-white placeholder-slate-600 transition-all py-4 px-6']) }}>
