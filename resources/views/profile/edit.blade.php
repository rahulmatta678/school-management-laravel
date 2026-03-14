<x-app-layout>
    <div class="mb-12">
        <h2 class="text-4xl font-black text-white uppercase italic tracking-tighter leading-none">
            {{ __('Profile Settings') }}<span class="text-indigo-500">.</span>
        </h2>
        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Manage your identity and security protocols</p>
    </div>

    @if (session('status') === 'profile-updated' || session('status') === 'password-updated')
        <div class="mb-12 p-6 bg-emerald-500/10 border border-emerald-500/20 rounded-3xl flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center border border-emerald-500/20">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </div>
            <div>
                <p class="text-[10px] font-black text-emerald-400 uppercase tracking-widest italic mb-0.5">System Update</p>
                <p class="text-xs text-slate-400 font-bold uppercase italic">Security protocols updated successfully.</p>
            </div>
        </div>
    @endif

    <div class="space-y-12">
        <div class="elite-canvas p-12 max-w-4xl">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="elite-canvas p-12 max-w-4xl border-indigo-500/10">
            @include('profile.partials.update-password-form')
        </div>

        @if(auth()->user()->role !== \App\Enums\UserRole::Admin)
            <div class="elite-canvas p-12 max-w-4xl border-rose-500/10">
                @include('profile.partials.delete-user-form')
            </div>
        @endif
    </div>
</x-app-layout>
