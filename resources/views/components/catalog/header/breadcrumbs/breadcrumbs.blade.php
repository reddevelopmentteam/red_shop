<div class="flex gap-2.5">
    <a href="{{ route('home') }}"
        class="text-text-secondary hover:text-text-brand transition-colors">Beranda</a>
    <span class="text-text-secondary">/</span>
    <a href="{{ route('catalog') }}"
        class="{{ $kategori ? 'text-text-secondary' : 'text-brand-primary' }} hover:text-text-brand transition-colors">Katalog</a>
    @if ($kategori)
        <span class="text-text-secondary">/</span>
        <p class="text-brand-primary">{{ $kategori }}</p>
    @endif
</div>
