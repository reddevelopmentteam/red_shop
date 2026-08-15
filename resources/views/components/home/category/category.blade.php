<section class="px-16 py-12">
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-family-display text-3xl font-bold text-text-primary">Kategori
            <span class="text-text-brand">Pilihan</span>
        </h1>
        <a href="#"
            class="flex items-center gap-1 font-family-body text-sm font-medium text-text-brand hover:text-interactive-primary-background-hover transition-colors">
            Lihat Semua
            <iconify-icon icon="material-symbols:chevron-right" width="16" height="16"></iconify-icon>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($categories as $category)
            <a href="#" class="group relative h-40 overflow-hidden rounded-xl transition-all hover:shadow-lg">
                <div class="absolute inset-0"
                    style="background-image: url('{{ $category['image'] }}'); background-size: cover; background-position: center;">
                </div>
                <div class="absolute inset-0 bg-black/60 transition-colors group-hover:bg-black/50"></div>
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"
                    style="background: radial-gradient(ellipse at bottom right, rgba(255,255,255,0.50) 0%, transparent 50%) ">
                </div>
                <div class="relative z-10 flex flex-col justify-between h-full p-6">
                    <h3 class="font-family-display text-2xl font-bold text-text-inverse">
                        {{ $category['name'] }}</h3>
                    <div class="flex flex-row-reverse items-end justify-between">
                        <div
                            class="self-end w-11 h-11 rounded-full bg-transparent flex items-center justify-center border border-brand-primary shadow-md group-hover:bg-white transition-colors">
                            <iconify-icon icon="material-symbols:arrow-forward" width="20" height="20" class="text-text-brand"></iconify-icon>
                        </div>
                        <p class="font-family-body text-sm text-text-inverse mt-1 opacity-80">
                            {{ $category['count'] }} Templates</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>
