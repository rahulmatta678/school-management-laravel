<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="elite-canvas">
                <div class="p-12">
                    <div class="mb-10">
                        <h2 class="text-3xl font-black text-white uppercase italic tracking-tighter leading-none">
                            Edit Parent<span class="text-indigo-500">.</span>
                        </h2>
                        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Modify contact information and linked student</p>
                    </div>

                    <form action="{{ route('teacher.parents.update', $parent) }}" method="POST" class="space-y-10">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <!-- Student Selection -->
                            <div>
                                <x-input-label for="student_id" :value="__('Linked Student')" />
                                <div class="relative group/select">
                                    <select id="student_id" name="student_id" class="w-full border-white/10 focus:border-indigo-600 focus:ring-0 rounded-2xl bg-white/[0.02] text-white transition-all py-4 px-6 font-black uppercase italic text-xs tracking-widest appearance-none cursor-pointer" required>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}" class="bg-black text-white" {{ old('student_id', $parent->student_id) == $student->id ? 'selected' : '' }}>
                                                {{ $student->name }} ({{ $student->grade ?? 'N/A' }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-6 text-slate-500 group-focus-within/select:text-indigo-500 transition-colors">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
                            </div>

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Parent Full Name')" />
                                <x-text-input id="name" class="block w-full" type="text" name="name" :value="old('name', $parent->name)" required placeholder="Full Name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <!-- Email -->
                            <div>
                                <x-input-label for="email" :value="__('Email Address')" />
                                <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email', $parent->email)" required placeholder="email@example.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Phone -->
                            <div>
                                <x-input-label for="phone" :value="__('Phone Number (Optional)')" />
                                <x-text-input id="phone" class="block w-full" type="text" name="phone" :value="old('phone', $parent->phone)" placeholder="+1 (555) 000-0000" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-4 mt-12 pt-10 border-t border-white/5">
                            <div class="flex-1 max-w-[200px]">
                                <x-primary-button>{{ __('Update Parent') }}</x-primary-button>
                            </div>
                            <a href="{{ route('teacher.parents.index') }}" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-widest transition-colors">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
