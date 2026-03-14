<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="elite-canvas">
                <div class="p-12">
                    <div class="mb-10">
                        <h2 class="text-3xl font-black text-white uppercase italic tracking-tighter leading-none">
                            New Announcement<span class="text-indigo-500">.</span>
                        </h2>
                        <p class="text-slate-500 mt-2 font-bold uppercase text-[10px] tracking-[0.2em]">Post messages for staff and students</p>
                    </div>

                    <div class="mb-12 p-8 bg-[#000000] border border-indigo-500/20 rounded-3xl">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-indigo-500/10 flex items-center justify-center border border-indigo-500/20">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-[10px] font-black text-indigo-400 uppercase tracking-widest italic mb-2">Notification System</h4>
                                <p class="text-xs text-slate-400 font-bold uppercase italic leading-relaxed">
                                    Messages posted here will be immediately visible to all intended users on their dashboards.
                                </p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('admin.announcements.store') }}" method="POST">
                        @csrf

                        <div class="space-y-10">
                            <!-- Title -->
                            <div>
                                <x-input-label for="title" :value="__('Announcement Title')" />
                                <x-text-input id="title" class="block w-full" type="text" name="title" :value="old('title')" required autofocus placeholder="Subject" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Body -->
                            <div>
                                <x-input-label for="body" :value="__('Message Content')" />
                                <textarea id="body" name="body" rows="8" class="block w-full border-white/10 focus:border-indigo-600 focus:ring-0 rounded-[2rem] bg-white/[0.02] text-white placeholder-slate-600 transition-all p-8 font-medium leading-relaxed" required placeholder="Write your announcement here...">{{ old('body') }}</textarea>
                                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-between gap-4 mt-12 pt-10 border-t border-white/5">
                            <div class="flex-1 max-w-[200px]">
                                <x-primary-button>{{ __('Post Announcement') }}</x-primary-button>
                            </div>
                            <a href="{{ route('admin.announcements.index') }}" class="text-[10px] font-bold text-slate-500 hover:text-white uppercase tracking-widest transition-colors">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
