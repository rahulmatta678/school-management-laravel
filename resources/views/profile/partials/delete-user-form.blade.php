<section class="space-y-10">
    <header>
        <h2 class="text-2xl font-black text-white uppercase italic tracking-tighter leading-none">
            {{ __('Terminate Identity') }}<span class="text-rose-500">.</span>
        </h2>

        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">
            {{ __('Once your account is purged, all of its associated clearance levels and data will be permanently revoked.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="group flex items-center px-10 py-5 bg-rose-600/10 border border-rose-500/20 text-rose-500 font-black text-xs uppercase italic tracking-widest rounded-3xl hover:bg-rose-600 hover:text-white transition-all duration-300 shadow-xl active:scale-95"
    >
        <svg class="w-4 h-4 mr-3 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
        {{ __('Request Termination') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-12">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-white uppercase italic tracking-tighter leading-none mb-4 text-center">
                {{ __('Confirm Termination') }}<span class="text-rose-500">?</span>
            </h2>

            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest italic mb-10 leading-relaxed text-center max-w-xs mx-auto">
                {{ __('This action is permanent. Enter your clearance password to authorize the complete removal of your identity from Lumina.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Clearance Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full"
                    placeholder="{{ __('Verify Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-12 space-y-4">
                <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-black text-xs uppercase italic tracking-widest py-5 rounded-3xl transition-all shadow-xl shadow-rose-900/40 active:scale-[0.98]">
                    {{ __('Authorize Deletion') }}
                </button>

                <button type="button" x-on:click="$dispatch('close-modal', 'confirm-user-deletion')" class="w-full bg-transparent text-slate-500 hover:text-white font-black text-[10px] uppercase tracking-[0.2em] italic py-4 transition-all uppercase">
                    Abort Protocol
                </button>
            </div>
        </form>
    </x-modal>
</section>
