<div class="flex justify-center items-center gap-3 py-8">
    @php
        $start = max(2, $page - 1);
        $end = min($totalPages - 1, $page + 1);

        $pages = [1];

        if ($start > 2) {
            $pages[] = '...';
        }

        for ($i = $start; $i <= $end; $i++) {
            $pages[] = $i;
        }

        if ($end < $totalPages - 1) {
            $pages[] = '...';
        }

        if ($totalPages > 1) {
            $pages[] = $totalPages;
        }
    @endphp

    {{-- Previous --}}
    <button wire:click="goToPage({{ max(1, $page - 1) }})"
        class="flex items-center justify-center w-10 h-10 rounded-lg border-2 border-border-subtle transition-colors {{ $page === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:border-brand-primary hover:text-text-brand' }}"
        {{ $page === 1 ? 'disabled' : '' }}>
        <iconify-icon icon="material-symbols:arrow-left-alt" width="20" height="20" class="text-icon-brand"></iconify-icon>
    </button>

    {{-- Page numbers --}}
    @foreach ($pages as $pageNum)
        @if ($pageNum === '...')
            <span class="flex items-center justify-center w-10 h-10 font-family-body text-sm text-text-secondary">...</span>
        @else
            <button wire:click="goToPage({{ $pageNum }})"
                class="flex items-center justify-center w-10 h-10 rounded-lg font-family-body text-sm font-medium transition-colors
                    {{ $page === $pageNum
                        ? 'bg-brand-primary text-white'
                        : 'border-2 border-border-subtle hover:border-brand-primary hover:text-text-brand' }}">
                {{ $pageNum }}
            </button>
        @endif
    @endforeach

    {{-- Next --}}
    <button wire:click="goToPage({{ min($totalPages, $page + 1) }})"
        class="flex items-center justify-center w-10 h-10 rounded-lg border-2 border-border-subtle transition-colors {{ $page === $totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:border-brand-primary hover:text-text-brand' }}"
        {{ $page === $totalPages ? 'disabled' : '' }}>
        <iconify-icon icon="material-symbols:arrow-right-alt" width="20" height="20" class="text-icon-brand"></iconify-icon>
    </button>
</div>
