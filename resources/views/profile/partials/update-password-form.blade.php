<section>
    <header class="mb-10">
        <h2 class="text-2xl font-black text-white uppercase italic tracking-tighter">
            {{ __('Security Protocols') }}
        </h2>
        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Maintain high-security password standards</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-10">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Security Key')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="block w-full" autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Security Key')" />
            <x-text-input id="update_password_password" name="password" type="password" class="block w-full" autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm New Key')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="block w-full" autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-6">
            <div class="flex-1 max-w-[200px]">
                <x-primary-button>{{ __('Update Protocols') }}</x-primary-button>
            </div>
        </div>
    </form>
</section>
