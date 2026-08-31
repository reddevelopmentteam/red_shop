<div class="relative -mt-20">
    <div class="grid grid-cols-2 min-h-screen">
        <div class="bg-conic-90 from-red-300 from-0% to-background-default to-100%"></div>
        <div class="bg-conic-270 from-background-default from-0 to-red-300 to-100%"></div>
    </div>
    <div class="absolute -bottom-1 left-0 w-full h-48 bg-linear-to-b from-transparent to-white"></div>
    <div class="absolute inset-0 flex flex-col justify-center mt-15 items-center px-43.75">
        <div id="headline" class="flex flex-col gap-4 items-center">
            <div>
                <h1 class="font-family-display text-7xl text-text-primary text-center font-bold">Template Website Modern
                    <span class="text-red-600">Siap Pakai</span> untuk Anda
                </h1>
            </div>
            <div>
                <p class="text-center font-family-body text-text-secondary text-lg max-w-2xl">Temukan berbagai template
                    website berkualitas tinggi yang dirancang untuk developer, freelancer,
                    bisnis, dan agensi. Hemat waktu pengembangan dengan desain yang modern dan responsif.</p>
            </div>
        </div>
        <div id="cta" class="flex gap-4 mt-22.25">
            {{-- searchbar --}}
            <div x-data="{ open: false }" @click.away="open = false" class="relative bg-white shadow-lg rounded-xl">
                <form action="/catalog" method="GET" class="flex items-center">
                    <input type="search" name="cari" id="searchALl" placeholder="Cari landing page, portofolio, dashboard..."
                        @focus="open = true" @blur="open = false"
                        class="border-0 placeholder:text-text-placeholder px-6 py-4 min-w-137 rounded-xl focus:outline-0 focus:ring-0">
                    <span class="absolute right-4 mt-4 pointer-events-none">
                        <iconify-icon icon="material-symbols:search" width="27" height="27"
                            class="text-text-brand"></iconify-icon>
                    </span>
                </form>

                {{-- search  suggestion --}}
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-1"
                    class="absolute left-0 top-full mt-2 w-full bg-surface-default border border-border-subtle rounded-xl shadow-md z-50 overflow-hidden">

                    <div class="px-4 pt-4 pb-2">
                        <h3 class="font-family-display text-sm text-text-secondary mb-2">Sugesti Cepat</h3>
                        <div class="flex flex-col gap-1">
                            <a href="#"
                                class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                                <span
                                    class="font-family-body text-sm text-text-primary group-hover:text-text-link">Portfolio</span>
                                <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16"
                                    class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                                <span
                                    class="font-family-body text-sm text-text-primary group-hover:text-text-link">Landing
                                    Page</span>
                                <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16"
                                    class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                                <span
                                    class="font-family-body text-sm text-text-primary group-hover:text-text-link">Dashboard</span>
                                <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16"
                                    class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                                <span
                                    class="font-family-body text-sm text-text-primary group-hover:text-text-link">E-Commerce</span>
                                <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16"
                                    class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                            </a>
                        </div>
                    </div>

                    <div class="mx-4 border-t border-border-subtle"></div>

                    <div class="px-4 pt-3 pb-4">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-family-display text-sm text-text-secondary">Kategori Pilihan</h3>
                            <a href="#"
                                class="flex items-center gap-1 font-family-body text-sm font-medium text-text-brand hover:text-interactive-primary-background-hover transition-colors">
                                Lihat Semua
                                <iconify-icon icon="material-symbols:chevron-right" width="16"
                                    height="16"></iconify-icon>
                            </a>
                        </div>
                        <div class="flex overflow-x-auto gap-3 snap-x snap-mandatory scroll-smooth pb-2">
                            <a href="#"
                                class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                                <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                    style="background-image: url('https://picsum.photos/200?random=1'); background-size: cover; background-position: center;">
                                    <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                    <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">
                                        Portfolio</p>
                                    <p class="font-family-body text-xs text-text-inverse relative z-10">12 template</p>
                                </div>
                            </a>
                            <a href="#"
                                class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                                <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                    style="background-image: url('https://picsum.photos/200?random=2'); background-size: cover; background-position: center;">
                                    <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                    <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">
                                        Landing Page</p>
                                    <p class="font-family-body text-xs text-text-inverse relative z-10">8 template</p>
                                </div>
                            </a>
                            <a href="#"
                                class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                                <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                    style="background-image: url('https://picsum.photos/200?random=3'); background-size: cover; background-position: center;">
                                    <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                    <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">
                                        Dashboard</p>
                                    <p class="font-family-body text-xs text-text-inverse relative z-10">6 template</p>
                                </div>
                            </a>
                            <a href="#"
                                class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                                <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                    style="background-image: url('https://picsum.photos/200?random=4'); background-size: cover; background-position: center;">
                                    <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                    <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">
                                        E-Commerce</p>
                                    <p class="font-family-body text-xs text-text-inverse relative z-10">10 template</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex justify-center items-center gap-2.5 bg-background-brand rounded-xl px-6 py-4 cursor-pointer shadow-md">
                <button class="text-interactive-destructive-text-default font-family-label text-lg cursor-pointer">
                    Lihat Katalog
                </button>
                <iconify-icon icon="material-symbols:grid-view-outline" width="24" height="24"
                    class="text-white"></iconify-icon>
            </div>
        </div>
        <div id="feature"
            class="flex justify-between px-6 py-4 rounded-xl bg-surface-default mt-17.5 gap-10 shadow-md">
            {{--  --}}
            <div class="flex gap-2.5 justify-center items-center min-w-60">
                <iconify-icon icon="material-symbols:design-services-outline" width="36" height="36"
                    class="text-text-brand p-3 rounded-full bg-background-error"></iconify-icon>
                <div>
                    <h2 class="text-text-primary font-family-body text-lg">Design Modern</h2>
                    <p class="text-text-secondary font-family-body text-sm">Tampilan profesional dan elegan</p>
                </div>
            </div>
            {{--  --}}
            <div class="flex gap-2.5 justify-center items-center min-w-60">
                <iconify-icon icon="material-symbols:devices" width="36" height="36"
                    class="text-text-brand p-3 bg-background-error rounded-full"></iconify-icon>
                <div>
                    <h2 class="text-text-primary font-family-body text-lg">Responsif</h2>
                    <p class="text-text-secondary font-family-body text-sm">Optimal di semua perangkat</p>
                </div>
            </div>
            {{--  --}}
            <div class="flex gap-2.5 justify-center items-center min-w-60">
                <iconify-icon icon="material-symbols:touch-app" width="36" height="36"
                    class="text-text-brand p-3 rounded-full bg-background-error"></iconify-icon>
                <div>
                    <h2 class="text-text-primary font-family-body text-lg">Mudah Digunakan</h2>
                    <p class="text-text-secondary font-family-body text-sm">Struktur rapi dan mudah kostumisasi</p>
                </div>
            </div>
            {{--  --}}
            <div class="flex gap-2.5 justify-center items-center min-w-60">
                <iconify-icon icon="material-symbols:security" width="36" height="36"
                    class="text-text-brand p-3 rounded-full bg-background-error"></iconify-icon>
                <div>
                    <h2 class="text-text-primary font-family-body text-lg">Lisensi Jelas</h2>
                    <p class="text-text-secondary font-family-body text-sm">Tanpa biaya tersembunyi. Syarat mudah
                        dipahami.</p>
                </div>
            </div>
        </div>
    </div>
</div>
