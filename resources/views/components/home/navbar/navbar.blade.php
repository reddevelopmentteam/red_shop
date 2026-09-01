<div class="flex justify-between mt-2.5 px-8 py-2.5 shadow-md bg-background-default items-center rounded-xl gap-20">
    <div id="left">
        <img src={{ asset('images/logo/brand.png') }} alt="brand">
    </div>
    <div id="middle">
        <menu class="flex gap-4">
            <li><a href="/catalog" class="hover:text-text-link font-family-body text-lg text-text-secondary">Katalog</a>
            </li>
            <li class="relative" x-data="{ open: false }" @click.away="open = false">
                <a href="#" @click.prevent="open = !open" :class="open ? 'text-text-brand' : ''"
                    class="flex items-center gap-1 hover:text-text-brand font-family-body text-lg text-text-secondary">
                    Kategori
                    <span class="transition-transform duration-200" :class="open && 'rotate-180'">
                        <iconify-icon icon="material-symbols:keyboard-arrow-down" width="16" height="16"></iconify-icon>
                    </span>
                </a>

                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-1" @click="open = false"
                    class="absolute left-10 -translate-x-1/2 top-full mt-8 w-64 bg-background-default rounded-xl shadow-lg z-50 overflow-hidden">

                    <div class="px-4 pt-4 pb-3">
                        <h3 class="font-family-display text-sm text-text-secondary">Unggulan</h3>
                    </div>

                    <div class="flex flex-col gap-1 px-4">
                        <a href="#" class="flex items-center justify-between transition-colors group">
                            <span class="font-family-body text-text-primary group-hover:text-text-link">Portfolio</span>
                            <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16" class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                        </a>
                        <a href="#" class="flex items-center justify-between transition-colors group">
                            <span class="font-family-body text-text-primary group-hover:text-text-link">Landing
                                Page</span>
                            <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16" class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                        </a>
                        <a href="#" class="flex items-center justify-between transition-colors group">
                            <span class="font-family-body text-text-primary group-hover:text-text-link">Dashboard</span>
                            <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16" class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                        </a>
                        <a href="#" class="flex items-center justify-between transition-colors group">
                            <span
                                class="font-family-body text-text-primary group-hover:text-text-link">E-Commerce</span>
                            <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16" class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                        </a>
                    </div>

                    <div class="mt-3 mx-5 border-t border-border-subtle"></div>

                    <div class="px-5 py-3 flex justify-end">
                        <a href="#"
                            class="flex items-center gap-2 font-family-body font-medium text-text-brand hover:text-interactive-primary-background-hover transition-colors">
                            Lihat Semua
                            <iconify-icon icon="material-symbols:chevron-right" width="16" height="16"></iconify-icon>
                        </a>
                    </div>
                </div>
            </li>
            <li><a href="/contact" class="hover:text-text-link font-family-body text-lg text-text-secondary">Kontak</a>
            </li>
        </menu>
    </div>
    <div id="right" x-data="{ open: false }" @click.away="open = false" class="relative">
        <form action="/catalog" method="GET"
            class="flex items-center px-4 py-2.5 pr-15 border border-border-subtle rounded-lg focus-within:border-brand-primary transition-colors">
            <input type="search" name="cari" id="searchAll" @focus="open = true" @blur="open = false"
                placeholder="Cari landing page, portofolio"
                class="border-0 placeholder:text-text-placeholder focus:outline-0 focus:ring-0 w-full">
            <span class="absolute right-4 top-2.5">
                <button type="submit" aria-label="Cari">
                    <iconify-icon icon="material-symbols:search" width="24" height="24" class="text-text-brand"></iconify-icon>
                </button>
            </span>
        </form>

        {{-- Suggestions dropdown --}}
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-1"
            class="absolute left-0 top-full mt-6 w-full bg-surface-default border border-border-subtle rounded-xl shadow-lg z-50 overflow-hidden">

            <div class="px-4 pt-4 pb-3">
                <h3 class="font-family-display text-sm text-text-secondary">Sugesti</h3>
            </div>

            <div class="flex flex-col gap-1 px-4 pb-3">
                <a href="#" class="flex items-center justify-between transition-colors group">
                    <span class="font-family-body text-text-primary group-hover:text-text-link">Portfolio</span>
                    <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16" class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                </a>
                <a href="#" class="flex items-center justify-between transition-colors group">
                    <span class="font-family-body text-text-primary group-hover:text-text-link">Landing Page</span>
                    <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16" class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                </a>
                <a href="#" class="flex items-center justify-between transition-colors group">
                    <span class="font-family-body text-text-primary group-hover:text-text-link">Dashboard</span>
                    <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16" class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                </a>
                <a href="#" class="flex items-center justify-between transition-colors group">
                    <span class="font-family-body text-text-primary group-hover:text-text-link">E-Commerce</span>
                    <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16" class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                </a>
            </div>
        </div>
    </div>
</div>
