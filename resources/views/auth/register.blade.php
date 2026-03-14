<x-guest-layout>
    <div class="mb-12">
        <h2 class="text-4xl font-black text-white uppercase italic tracking-tighter leading-none">Member Registration</h2>
        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Create your account</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-8">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="user@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-primary-button>
            {{ __('Register') }}
        </x-primary-button>
        </div>

        <p class="text-center text-[10px] font-bold text-slate-600 uppercase tracking-widest mt-10">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-white hover:text-indigo-500 transition-colors ml-1">Sign in here</a>
        </p>
    </form>
</x-guest-layout>
