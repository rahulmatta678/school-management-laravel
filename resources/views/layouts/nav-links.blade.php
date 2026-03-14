@php
    $dashboardRoute = auth()->user()->isAdmin() ? 'admin.dashboard' : (auth()->user()->isTeacher() ? 'teacher.dashboard' : 'dashboard');
    
    $dashIcon = '<svg class="mr-4 flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>';
    $usersIcon = '<svg class="mr-4 flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>';
    $announceIcon = '<svg class="mr-4 flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>';
    $searchIcon = '<svg class="mr-4 flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>';
@endphp

<a href="{{ route($dashboardRoute) }}" 
   class="{{ request()->routeIs($dashboardRoute) ? 'elite-glass text-white border-indigo-500/20 shadow-xl' : 'text-slate-500 hover:text-white border-transparent' }} group flex items-center px-5 py-4 text-xs font-black uppercase italic tracking-widest rounded-2xl border transition-all duration-300">
    {!! $dashIcon !!}
    {{ __('Dashboard') }}
</a>

@if(auth()->user()->isAdmin())
    <div class="pt-8 mb-4">
        <p class="px-5 text-[9px] font-black text-slate-600 uppercase tracking-[0.3em] italic">{{ __('Admin Console') }}</p>
    </div>
    <a href="{{ route('admin.teachers.index') }}" 
       class="{{ request()->routeIs('admin.teachers.*') ? 'elite-glass text-white border-indigo-500/20 shadow-xl' : 'text-slate-500 hover:text-white border-transparent' }} group flex items-center px-5 py-4 text-xs font-black uppercase italic tracking-widest rounded-2xl border transition-all duration-300">
        {!! $usersIcon !!}
        {{ __('Teacher Registry') }}
    </a>
    <a href="{{ route('admin.announcements.index') }}" 
       class="{{ request()->routeIs('admin.announcements.*') ? 'elite-glass text-white border-indigo-500/20 shadow-xl' : 'text-slate-500 hover:text-white border-transparent' }} group flex items-center px-5 py-4 text-xs font-black uppercase italic tracking-widest rounded-2xl border transition-all duration-300">
        {!! $announceIcon !!}
        {{ __('Announcements') }}
    </a>
    <a href="{{ route('admin.overview') }}" 
       class="{{ request()->routeIs('admin.overview') ? 'elite-glass text-white border-indigo-500/20 shadow-xl' : 'text-slate-500 hover:text-white border-transparent' }} group flex items-center px-5 py-4 text-xs font-black uppercase italic tracking-widest rounded-2xl border transition-all duration-300">
        {!! $searchIcon !!}
        {{ __('System Overview') }}
    </a>
@endif

@if(auth()->user()->isTeacher())
    <div class="pt-8 mb-4">
        <p class="px-5 text-[9px] font-black text-slate-600 uppercase tracking-[0.3em] italic">{{ __('Teacher Portal') }}</p>
    </div>
    <a href="{{ route('teacher.students.index') }}" 
       class="{{ request()->routeIs('teacher.students.*') ? 'elite-glass text-white border-indigo-500/20 shadow-xl' : 'text-slate-500 hover:text-white border-transparent' }} group flex items-center px-5 py-4 text-xs font-black uppercase italic tracking-widest rounded-2xl border transition-all duration-300">
        {!! $usersIcon !!}
        {{ __('Student Registry') }}
    </a>
    <a href="{{ route('teacher.parents.index') }}" 
       class="{{ request()->routeIs('teacher.parents.*') ? 'elite-glass text-white border-indigo-500/20 shadow-xl' : 'text-slate-500 hover:text-white border-transparent' }} group flex items-center px-5 py-4 text-xs font-black uppercase italic tracking-widest rounded-2xl border transition-all duration-300">
        <svg class="mr-4 flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        {{ __('Parent Contacts') }}
    </a>
    <a href="{{ route('teacher.announcements.index') }}" 
       class="{{ request()->routeIs('teacher.announcements.*') ? 'elite-glass text-white border-indigo-500/20 shadow-xl' : 'text-slate-500 hover:text-white border-transparent' }} group flex items-center px-5 py-4 text-xs font-black uppercase italic tracking-widest rounded-2xl border transition-all duration-300">
        {!! $announceIcon !!}
        {{ __('Post News') }}
    </a>
@endif
