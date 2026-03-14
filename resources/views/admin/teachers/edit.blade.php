<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="elite-canvas">
                <div class="p-12">
                    <div class="mb-10">
                        <h2 class="text-3xl font-black text-white uppercase italic tracking-tighter leading-none">
                            Edit Teacher: <span class="text-indigo-500">{{ $teacher->name }}</span>
                        </h2>
                        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Update faculty credentials and profile information</p>
                    </div>

                    <form action="{{ route('admin.teachers.update', $teacher) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Full Name')" />
                                <x-text-input id="name" class="block w-full" type="text" name="name" :value="old('name', $teacher->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-input-label for="email" :value="__('Email Address')" />
                                <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email', $teacher->email)" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Update Password (Optional) -->
                        <div class="mt-12 pt-10 border-t border-white/5">
                            <div class="mb-8">
                                <h3 class="text-xs font-black text-white uppercase italic tracking-widest">Update Password (Optional)</h3>
                                <p class="text-[10px] text-slate-500 uppercase font-bold tracking-widest mt-1">Leave blank if you don't want to change the password.</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <x-input-label for="password" :value="__('New Password')" />
                                    <x-text-input id="password" class="block w-full" type="password" name="password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="password_confirmation" :value="__('Confirm New Password')" />
                                    <x-text-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-4 mt-12 pt-10 border-t border-white/5">
                            <div class="flex-1 max-w-[200px]">
                                <x-primary-button>{{ __('Update Teacher') }}</x-primary-button>
                            </div>
                            <a href="{{ route('admin.teachers.index') }}" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-widest transition-colors">
                                Cancel Changes
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
