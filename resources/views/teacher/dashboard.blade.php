<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-1.5 h-1.5 rounded-full bg-indigo-500"></div>
            <h2 class="font-black text-3xl text-white uppercase italic tracking-tighter leading-tight">
                Teacher Dashboard<span class="text-indigo-500">.</span>
            </h2>
        </div>
        <p class="text-[10px] font-black text-slate-600 uppercase tracking-[0.2em] mt-2 ml-5">My Classes & Notifications</p>
    </x-slot>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <x-stat-card 
            title="My Students" 
            :value="$stats['my_students']" 
            variant="blue"
            icon='<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>'
        />
        <x-stat-card 
            title="Announcements" 
            :value="$stats['my_announcements']" 
            variant="rose"
            icon='<svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>'
        />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Official Streams -->
        <div class="lg:col-span-2 elite-canvas p-12 bg-white/[0.01]">
            <div class="flex items-center gap-4 mb-10">
                <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                </div>
                <div>
                    <h3 class="text-2xl font-black text-white uppercase italic tracking-tighter">School Announcements</h3>
                    <p class="text-[10px] font-black text-slate-600 uppercase tracking-[0.2em] mt-1">Official Messages from Admin</p>
                </div>
            </div>
            
            <div class="space-y-10">
                @forelse ($adminAnnouncements as $ann)
                    <div class="relative pl-10 pb-10 border-l border-white/5 last:border-0 last:pb-0 group">
                        <div class="absolute -left-[4.5px] top-0 w-2 h-2 rounded-full bg-indigo-500 shadow-[0_0_15px_rgba(79,70,229,0.5)] group-hover:scale-150 transition-transform"></div>
                        <div class="flex justify-between items-start mb-4">
                            <h4 class="font-black text-white leading-tight tracking-tight uppercase italic text-lg">{{ $ann->title }}</h4>
                            <span class="text-[9px] font-black text-slate-500 bg-white/5 px-3 py-1.5 rounded-lg uppercase tracking-widest border border-white/5">{{ $ann->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-base text-slate-400 leading-relaxed font-medium">{{ $ann->body }}</p>
                        <div class="text-[10px] text-slate-500 mt-6 flex items-center gap-3">
                            <span class="font-black text-indigo-400 uppercase italic">Admin Post</span> • <span class="font-bold text-slate-400">{{ $ann->user->name }}</span>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20 bg-white/[0.02] rounded-[2rem] border border-dashed border-white/10">
                        <p class="text-slate-500 font-bold uppercase tracking-widest text-xs">No active directives found</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Operations Panel -->
        <div class="space-y-8">
            <div class="elite-canvas p-10 bg-[#000000] border-indigo-500/20">
                <h3 class="text-xl font-black text-white mb-1 uppercase italic tracking-tighter">Quick Actions</h3>
                <p class="text-[9px] font-black text-slate-600 mb-10 uppercase tracking-[0.2em]">Common workspace tasks</p>
                
                <div class="space-y-4">
                    <a href="{{ route('teacher.students.create') }}" class="flex items-center justify-between p-5 rounded-2xl bg-white/[0.03] hover:bg-white/[0.06] border border-white/5 transition-all group">
                        <span class="text-xs font-black text-white uppercase italic tracking-widest">Add Student</span>
                        <svg class="w-4 h-4 text-indigo-500 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                    </a>
                    <a href="{{ route('teacher.announcements.create') }}" class="flex items-center justify-between p-5 rounded-2xl bg-white/[0.03] hover:bg-white/[0.06] border border-white/5 transition-all group">
                        <span class="text-xs font-black text-white uppercase italic tracking-widest">Post News</span>
                        <svg class="w-4 h-4 text-purple-500 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
