@props(['headers', 'items', 'disablePagination' => false, 'paginationAppends' => []])
<div class="bg-[#0c0c0e] border border-white/5 rounded-[2rem] overflow-hidden shadow-2xl">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-white/5">
            <thead class="bg-white/[0.02]">
                <tr>
                    @foreach($headers as $header)
                        <th class="px-8 py-6 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] italic">{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-white/[0.02]">
                {{ $slot }}
            </tbody>
        </table>
    </div>
    @if(!$disablePagination && $items && method_exists($items, 'links'))
        <div class="px-8 py-6 bg-white/[0.01] border-t border-white/5">
            <div class="elite-pagination">
                {{ $items->appends($paginationAppends)->links() }}
            </div>
        </div>
    @endif
</div>