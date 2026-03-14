<x-app-layout>
    <div class="mb-12">
        <h2 class="text-4xl font-black text-white uppercase italic tracking-tighter leading-none">
            {{ __('System Overview') }}
        </h2>
        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Global view of students, parents, and teacher communications.</p>
    </div>

    <div class="space-y-12">
        
        <!-- Students Section -->
        <section>
            <div class="flex items-center gap-4 mb-6">
                <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center border border-white/5">
                    <span class="text-white font-black text-xs italic">S</span>
                </div>
                <h3 class="text-xs font-black text-white uppercase italic tracking-widest">
                    All Registered Students
                </h3>
            </div>
            
            <x-data-table :headers="['Student Detail', 'Assigned Teacher', 'Age / Grade', 'Joined Date']" 
                :items="$students" 
                :pagination-appends="['parents_page' => $parents->currentPage(), 'announcements_page' => $teacherAnnouncements->currentPage()]">
                @forelse ($students as $student)
                    <tr class="elite-hover group">
                        <td class="px-8 py-6 whitespace-nowrap">
                            <div class="text-xs font-black text-white uppercase italic">{{ $student->name }}</div>
                            <div class="text-[9px] text-slate-500 font-bold uppercase tracking-widest mt-1 group-hover:text-indigo-400 transition-colors">{{ $student->email }}</div>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            <span class="px-3 py-1.5 text-[10px] font-black text-indigo-400 bg-indigo-500/10 border border-indigo-500/20 rounded-lg uppercase italic tracking-widest">
                                {{ $student->teacher->name ?? 'None' }}
                            </span>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap text-[10px] text-slate-400 font-bold uppercase tracking-widest italic">
                            {{ $student->age }}y / {{ $student->grade }}
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap text-[9px] text-slate-500 font-black uppercase tracking-widest italic">
                            {{ $student->created_at->format('M d, Y') }}
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-8 py-12 text-center text-[10px] font-bold text-slate-600 uppercase tracking-widest">No students registered in the system.</td></tr>
                @endforelse
            </x-data-table>
        </section>

        <!-- Parents Section -->
        <section>
            <div class="flex items-center gap-4 mb-6">
                <div class="w-8 h-8 rounded-lg bg-emerald-600 flex items-center justify-center border border-white/5">
                    <span class="text-white font-black text-xs italic">P</span>
                </div>
                <h3 class="text-xs font-black text-white uppercase italic tracking-widest">
                    Registered Parents & Guardians
                </h3>
            </div>
            
            <x-data-table :headers="['Parent Name', 'Linked Student', 'Contact Information']" 
                :items="$parents"
                :pagination-appends="['students_page' => $students->currentPage(), 'announcements_page' => $teacherAnnouncements->currentPage()]">
                @forelse ($parents as $parent)
                    <tr class="elite-hover group">
                        <td class="px-8 py-6 whitespace-nowrap">
                            <div class="text-xs font-black text-white uppercase italic">{{ $parent->name }}</div>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            <span class="px-3 py-1.5 text-[10px] font-black text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 rounded-lg uppercase italic tracking-widest">
                                {{ $parent->student->name ?? 'None' }}
                            </span>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            <div class="text-[10px] text-white font-bold uppercase tracking-widest italic">{{ $parent->email }}</div>
                            <div class="text-[9px] text-slate-500 font-black uppercase tracking-[0.2em] mt-1">{{ $parent->phone ?? '-' }}</div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-8 py-12 text-center text-[10px] font-bold text-slate-600 uppercase tracking-widest">No parent records found.</td></tr>
                @endforelse
            </x-data-table>
        </section>

        <!-- Teacher Announcements Section -->
        <section>
            <div class="flex items-center gap-4 mb-6">
                <div class="w-8 h-8 rounded-lg bg-amber-600 flex items-center justify-center border border-white/5">
                    <span class="text-white font-black text-xs italic">A</span>
                </div>
                <h3 class="text-xs font-black text-white uppercase italic tracking-widest">
                    Faculty Announcements Feed
                </h3>
            </div>
            
            <x-data-table :headers="['Originating Teacher', 'Content Preview', 'Posted On']" 
                :items="$teacherAnnouncements"
                :pagination-appends="['students_page' => $students->currentPage(), 'parents_page' => $parents->currentPage()]">
                @forelse ($teacherAnnouncements as $announcement)
                    <tr class="elite-hover group">
                        <td class="px-8 py-6 whitespace-nowrap">
                            <span class="px-3 py-1.5 text-[10px] font-black text-amber-400 bg-amber-500/10 border border-amber-500/20 rounded-lg uppercase italic tracking-widest">
                                {{ $announcement->user->name ?? 'Admin' }}
                            </span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="text-xs font-black text-white uppercase italic">{{ $announcement->title }}</div>
                            <div class="flex items-center mt-2 group-hover:translate-x-1 transition-transform">
                                <span class="px-1.5 py-0.5 text-[8px] font-black rounded-md uppercase tracking-widest mr-3 border border-indigo-500/20 text-indigo-400">
                                    {{ $announcement->target_audience->label() }}
                                </span>
                                <span class="text-[10px] text-slate-500 font-bold line-clamp-1 italic">{{ $announcement->body }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-6 whitespace-nowrap text-[9px] text-slate-500 font-black uppercase tracking-widest italic">
                            {{ $announcement->created_at->format('M d, Y') }}
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-8 py-12 text-center text-[10px] font-bold text-slate-600 uppercase tracking-widest">No teacher activity to display.</td></tr>
                @endforelse
            </x-data-table>
        </section>

    </div>
</x-app-layout>
