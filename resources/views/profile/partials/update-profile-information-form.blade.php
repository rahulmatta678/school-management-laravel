<section>
    <header class="mb-10">
        <h2 class="text-2xl font-black text-white uppercase italic tracking-tighter">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Update your account identity and contact details</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-10">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" name="name" type="text" class="block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" name="email" type="email" class="block w-full" :value="old('email', $user->email)" required autocomplete="username" placeholder="john@example.com" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-6 p-4 bg-amber-500/5 border border-amber-500/10 rounded-2xl">
                    <p class="text-[10px] font-black text-amber-500 uppercase tracking-widest italic mb-2">Verification Required</p>
                    <p class="text-xs text-slate-400 font-bold uppercase italic leading-loose">
                        {{ __('Your email address is currently unverified.') }}
                        <button form="send-verification" class="text-white hover:text-indigo-400 underline decoration-indigo-500/30 underline-offset-4 transition-colors">
                            {{ __('Resend Verification Token') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-[10px] font-black text-emerald-400 uppercase tracking-widest italic">
                            {{ __('Verification link transmission successful.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-6">
            <div class="flex-1 max-w-[200px]">
                <x-primary-button>{{ __('Save Changes') }}</x-primary-button>
            </div>
        </div>
    </form>
</section>
