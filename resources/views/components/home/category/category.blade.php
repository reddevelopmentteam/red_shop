<section class="px-16 py-12">
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-family-display text-3xl font-bold text-text-primary">Kategori
            <span class="text-text-brand">Pilihan</span>
        </h1>
        <a href="#"
            class="flex items-center gap-1 font-family-body text-sm font-medium text-text-brand hover:text-interactive-primary-background-hover transition-colors">
            Lihat Semua
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($categories as $category)
            <a href="#" class="group relative h-40 overflow-hidden rounded-xl transition-all hover:shadow-lg">
                <div class="absolute inset-0"
                    style="background-image: url('{{ $category['image'] }}'); background-size: cover; background-position: center;">
                </div>
                <div class="absolute inset-0 bg-black/60 transition-colors group-hover:bg-black/50"></div>
                <div class="relative z-10 flex flex-col justify-between h-full p-6">
                    <h3 class="font-family-display text-2xl font-bold text-text-inverse">
                        {{ $category['name'] }}</h3>
                    <div class="flex flex-row-reverse items-end justify-between">
                        <div
                            class="self-end w-11 h-11 rounded-full bg-transparent flex items-center justify-center border border-brand-primary shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path fill="#dc2626" d="m14 18l-1.4-1.45L16.15 13H4v-2h12.15L12.6 7.45L14 6l6 6z" />
                            </svg>
                        </div>
                        <p class="font-family-body text-sm text-text-inverse mt-1 opacity-80">
                            {{ $category['count'] }} Templates</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>
