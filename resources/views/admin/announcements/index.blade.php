<x-app-layout>
    <div class="mb-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div>
            <h2 class="text-4xl font-black text-white uppercase italic tracking-tighter leading-none">
                {{ __('Global Announcements') }}<span class="text-indigo-500">.</span>
            </h2>
            <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Manage school-wide notifications and emergency alerts</p>
        </div>
        <a href="{{ route('admin.announcements.create') }}" class="group flex items-center px-8 py-4 bg-white text-black font-black text-xs uppercase italic tracking-widest rounded-full hover:bg-indigo-600 hover:text-white transition-all duration-300 shadow-xl active:scale-95">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
            {{ __('New Post') }}
        </a>
    </div>

    @if (session('success'))
        <div class="mb-12 p-6 bg-emerald-500/10 border border-emerald-500/20 rounded-3xl flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center border border-emerald-500/20">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </div>
            <div>
                <p class="text-[10px] font-black text-emerald-400 uppercase tracking-widest italic mb-0.5">Admin Clearance</p>
                <p class="text-xs text-slate-400 font-bold uppercase italic">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <x-data-table :headers="['Content Preview', 'Audience', 'Posted On', 'Actions']" :items="$announcements">
        @forelse ($announcements as $ann)
            <tr class="elite-hover group">
                <td class="px-8 py-6">
                    <div class="text-xs font-black text-white uppercase italic truncate max-w-sm">{{ $ann->title }}</div>
                    <div class="text-[10px] text-slate-500 font-bold line-clamp-1 mt-2 italic group-hover:text-slate-400 transition-colors">{{ $ann->body }}</div>
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                    <span class="px-3 py-1.5 text-[9px] font-black rounded-lg border border-indigo-500/20 text-indigo-400 bg-indigo-500/10 uppercase italic tracking-[0.1em]">
                        {{ $ann->target_audience->label() }}
                    </span>
                </td>
                <td class="px-8 py-6 whitespace-nowrap text-[9px] text-slate-500 font-black uppercase tracking-widest italic">
                    {{ $ann->created_at->format('M d, Y') }}
                </td>
                <td class="px-8 py-6 whitespace-nowrap text-right">
                    <div class="flex items-center justify-end">
                        <button type="button" x-data="" x-on:click="$dispatch('open-modal', 'confirm-delete-{{ $ann->id }}')" class="group/btn flex items-center gap-2 text-[10px] font-black text-slate-600 hover:text-rose-500 uppercase tracking-widest transition-colors">
                            <svg class="w-3.5 h-3.5 transition-transform group-hover/btn:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="px-8 py-12 text-center text-[10px] font-bold text-slate-600 uppercase tracking-widest italic">No announcements in the registry.</td></tr>
        @endforelse
    </x-data-table>

    <!-- Modal Portal Container -->
    @foreach ($announcements as $ann)
        <x-delete-confirmation 
            name="confirm-delete-{{ $ann->id }}" 
            :action="route('admin.announcements.destroy', $ann)"
            title="Global Purge"
            :message="'Are you sure you want to permanently remove this global announcement?'"
        />
    @endforeach
</x-app-layout>
