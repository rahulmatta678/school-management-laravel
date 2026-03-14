<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="elite-canvas">
                <div class="p-12">
                    <div class="mb-10">
                        <h2 class="text-3xl font-black text-white uppercase italic tracking-tighter leading-none">
                            Edit Student: <span class="text-indigo-500">{{ $student->name }}</span>
                        </h2>
                        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Update student profile and academic details</p>
                    </div>

                    <form action="{{ route('teacher.students.update', $student) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Name -->
                            <div class="md:col-span-2">
                                <x-input-label for="name" :value="__('Full Name')" />
                                <x-text-input id="name" class="block w-full" type="text" name="name" :value="old('name', $student->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email -->
                            <div>
                                <x-input-label for="email" :value="__('Email Address')" />
                                <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email', $student->email)" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <!-- Age -->
                                <div>
                                    <x-input-label for="age" :value="__('Age')" />
                                    <x-text-input id="age" class="block w-full" type="number" name="age" :value="old('age', $student->age)" />
                                    <x-input-error :messages="$errors->get('age')" class="mt-2" />
                                </div>

                                <!-- Grade -->
                                <div>
                                    <x-input-label for="grade" :value="__('Grade/Class')" />
                                    <x-text-input id="grade" class="block w-full" type="text" name="grade" :value="old('grade', $student->grade)" />
                                    <x-input-error :messages="$errors->get('grade')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-4 mt-12 pt-10 border-t border-white/5">
                            <div class="flex-1 max-w-[200px]">
                                <x-primary-button>{{ __('Update Student') }}</x-primary-button>
                            </div>
                            <a href="{{ route('teacher.students.index') }}" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-widest transition-colors">
                                Cancel Changes
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
