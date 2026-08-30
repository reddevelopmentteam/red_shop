<div class="px-16 pb-4">
    <nav class="flex items-center gap-2.5 font-family-label text-[16px] text-text-secondary">
        <a href="{{ route('home') }}" class="hover:text-text-brand transition-colors">Beranda</a>
        <span>/</span>
        <a href="{{ route('catalog') }}" class="hover:text-text-brand transition-colors">Katalog</a>
        <span>/</span>
        <a href="{{ route('catalog', ['kategori' => $category]) }}" class="hover:text-text-brand transition-colors">{{ $category }}</a>
        <span>/</span>
        <span class="text-text-brand font-medium">{{ $name }}</span>
    </nav>
</div>
