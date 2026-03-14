<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-1.5 h-1.5 rounded-full bg-indigo-500"></div>
            <h2 class="font-black text-3xl text-white uppercase italic tracking-tighter leading-tight">
                Admin Dashboard<span class="text-indigo-500">.</span>
            </h2>
        </div>
        <p class="text-[10px] font-black text-slate-600 uppercase tracking-[0.2em] mt-2 ml-5">School Overview & Management</p>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <x-stat-card 
            title="Total Teachers" 
            :value="$stats['teachers']" 
            variant="indigo"
            icon='<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>'
        />
        <x-stat-card 
            title="Total Students" 
            :value="$stats['students']" 
            variant="emerald"
            icon='<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>'
        />
        <x-stat-card 
            title="Total Parents" 
            :value="$stats['parents']" 
            variant="amber"
            icon='<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>'
        />
        <x-stat-card 
            title="Announcements" 
            :value="$stats['announcements']" 
            variant="rose"
            icon='<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>'
        />
    </div>

    <div class="elite-canvas p-12 bg-white/[0.01]">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <div>
                <h3 class="text-2xl font-black text-white uppercase italic tracking-tighter">System Overview</h3>
                <p class="text-[10px] font-black text-slate-600 uppercase tracking-[0.2em] mt-1">Current Operations Hub</p>
            </div>
        </div>
        
        <div class="p-8 rounded-[2rem] border border-white/5 bg-black/40">
            <p class="text-slate-400 font-medium leading-[1.8] text-lg max-w-3xl">
                All school management systems are running smoothly. Detailed registries are accessible from the navigation sidebar. 
                Manage teachers, students, and broadcasts with ease using the <span class="text-white font-black italic">Elite Management Interface</span>.
            </p>
        </div>
    </div>
</x-app-layout>
