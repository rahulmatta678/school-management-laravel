<x-app-layout>
    <div class="mb-12 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div>
            <h2 class="text-4xl font-black text-white uppercase italic tracking-tighter leading-none">
                {{ __('Parents Registry') }}<span class="text-indigo-500">.</span>
            </h2>
            <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Contact information for your students' guardians</p>
        </div>
        <a href="{{ route('teacher.parents.create') }}" class="group flex items-center px-8 py-4 bg-white text-black font-black text-xs uppercase italic tracking-widest rounded-full hover:bg-indigo-600 hover:text-white transition-all duration-300 shadow-xl active:scale-95">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
            {{ __('Add Parent') }}
        </a>
    </div>

    @if (session('success'))
        <div class="mb-12 p-6 bg-emerald-500/10 border border-emerald-500/20 rounded-3xl flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center border border-emerald-500/20">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </div>
            <div>
                <p class="text-[10px] font-black text-emerald-400 uppercase tracking-widest italic mb-0.5">System Notification</p>
                <p class="text-xs text-slate-400 font-bold uppercase italic">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <x-data-table :headers="['Parent Name', 'Linked Student', 'Contact Details', 'Actions']" :items="$parents">
        @forelse ($parents as $parent)
            <tr class="elite-hover group">
                <td class="px-8 py-6 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-500 font-black text-xs mr-4 uppercase italic">
                            {{ substr($parent->name, 0, 1) }}
                        </div>
                        <div class="text-xs font-black text-white uppercase italic">{{ $parent->name }}</div>
                    </div>
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                    <div class="text-xs font-black text-indigo-400 uppercase italic">{{ $parent->student->name ?? 'N/A' }}</div>
                    <div class="text-[9px] uppercase font-black text-slate-600 tracking-widest mt-1 italic">Assigned Student</div>
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                    <div class="text-xs font-black text-slate-300 lowercase italic">{{ $parent->email }}</div>
                    <div class="text-[9px] text-slate-600 font-black uppercase tracking-[0.2em] mt-1">{{ $parent->phone ?? 'No Contact Phone' }}</div>
                </td>
                <td class="px-8 py-6 whitespace-nowrap text-right text-xs font-black uppercase italic">
                    <div class="flex items-center justify-end gap-6 text-[10px] tracking-widest">
                        <a href="{{ route('teacher.parents.edit', $parent) }}" class="text-slate-500 hover:text-white transition-colors flex items-center gap-2">
                             <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                             Edit
                        </a>
                        <button type="button" x-data="" x-on:click="$dispatch('open-modal', 'confirm-delete-{{ $parent->id }}')" class="text-slate-600 hover:text-rose-500 transition-colors flex items-center gap-2">
                             <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                             Delete
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="px-8 py-12 text-center text-[10px] font-bold text-slate-600 uppercase tracking-widest italic">No parent contacts found in system.</td></tr>
        @endforelse
    </x-data-table>

    <!-- Modal Portal Container -->
    @foreach ($parents as $parent)
        <x-delete-confirmation 
            name="confirm-delete-{{ $parent->id }}" 
            :action="route('teacher.parents.destroy', $parent)"
            title="Remove Parent Record"
            :message="'Are you sure you want to remove ' . $parent->name . ' from the registry?'"
        />
    @endforeach
</x-app-layout>
