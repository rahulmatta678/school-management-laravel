@props([
    'name',
    'action',
    'title' => 'Confirm Deletion',
    'message' => 'Are you sure you want to permanently delete this record? This action cannot be undone.',
    'buttonText' => 'Delete Permanently'
])

<x-modal :name="$name" maxWidth="md" focusable>
    <div class="p-12 text-center text-white">
        <!-- Icon Shell -->
        <div class="mx-auto w-24 h-24 mb-8 bg-rose-500/10 rounded-2xl border border-rose-500/20 flex items-center justify-center animate-pulse">
            <svg class="w-12 h-12 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>

        <h3 class="text-2xl font-black uppercase italic tracking-tighter mb-4">{{ $title }}</h3>
        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest italic mb-10 leading-relaxed max-w-xs mx-auto">
            {{ $message }}
        </p>

        <form method="post" action="{{ $action }}" class="space-y-4">
            @csrf
            @method('delete')

            <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-black text-xs uppercase tracking-widest italic py-5 rounded-3xl transition-all shadow-xl shadow-rose-900/40 active:scale-[0.98]">
                {{ $buttonText }}
            </button>

            <button type="button" x-on:click="$dispatch('close-modal', '{{ $name }}')" class="w-full bg-transparent text-slate-500 hover:text-white font-black text-[10px] uppercase tracking-[0.2em] italic py-4 transition-all">
                Maybe Not This Time
            </button>
        </form>
    </div>
</x-modal>
