<x-guest-layout>
    <div class="mb-12">
        <h2 class="text-4xl font-black text-white uppercase italic tracking-tighter leading-none">Member Login</h2>
        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Please enter your credentials</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-8">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="email@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="text-[10px] font-black text-indigo-500 hover:text-white uppercase tracking-widest transition-colors" href="{{ route('password.request') }}">
                        {{ __('Recover') }}
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" class="w-5 h-5 rounded border-white/10 bg-white/5 text-indigo-600 focus:ring-0 transition-all cursor-pointer" name="remember">
            <label for="remember_me" class="ms-3 text-xs font-bold text-slate-500 uppercase tracking-widest cursor-pointer leading-none">{{ __('Remember Me') }}</label>
        </div>

        <div>
            <x-primary-button>
            {{ __('Sign In') }}
        </x-primary-button>
        </div>

        @if (Route::has('register'))
            <p class="text-center text-[10px] font-bold text-slate-600 uppercase tracking-widest mt-10">
                Need an account? 
                <a href="{{ route('register') }}" class="text-white hover:text-indigo-500 transition-colors ml-1">Register Now</a>
            </p>
        @endif
    </form>
</x-guest-layout>
