<div class="flex justify-between items-center px-16 py-6">
    <img src={{ asset('images/logo/brand.png') }} alt="brand" width="189">
    <div class="flex gap-4 items-center">
        <div class="flex justify-center">
            <div x-data="{
                open: false,
                toggle() {
                    if (this.open) {
                        return this.close()
                    }
            
                    this.$refs.button.focus()
            
                    this.open = true
                },
                close(focusAfter) {
                    if (!this.open) return
            
                    this.open = false
            
                    focusAfter && focusAfter.focus()
                }
            }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
                class="relative">
                <!-- Button -->
                <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                    :aria-controls="$id('dropdown-button')" type="button"
                    class="relative flex justify-between items-center whitespace-nowrap border-2 border-brand-primary/20 gap-2.5 px-6 py-2.5 rounded-lg min-w-45.25 bg-transparent text-brand-primary"
                    :class="{ 'bg-white': open }">
                    <iconify-icon icon="material-symbols:category-outline" width="24"></iconify-icon>
                    <span class="font-family-body text-[16px] font-semibold">Kategori</span>
                    <iconify-icon icon="material-symbols:keyboard-arrow-down"
                        class="transform transition-transform duration-100" width="24"
                        :class="{ 'rotate-180': open }"></iconify-icon>
                </button>

                <!-- Panel -->
                <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
                    :id="$id('dropdown-button')" x-cloak
                    class="absolute flex gap-6 -left-83.5 min-w-265.5 rounded-xl shadow-sm mt-5.75 z-10 origin-top-left bg-surface-overlay px-6 py-5 outline-none">
                    @php
                        $categories = [
                            ['name' => 'Semua Template', 'icon' => 'apps'],
                            ['name' => 'Landing Page', 'icon' => 'web'],
                            ['name' => 'Portfolio', 'icon' => 'perm-media-outline'],
                            ['name' => 'Dashboard', 'icon' => 'dashboard-outline'],
                            ['name' => 'SaaS', 'icon' => 'cloud-outline'],
                            ['name' => 'Data Management', 'icon' => 'database-outline'],
                            ['name' => 'E-Commerce', 'icon' => 'shopping-bag-outline'],
                            ['name' => 'Blog', 'icon' => 'article-outline'],
                            ['name' => 'Education', 'icon' => 'school-outline'],
                        ];

                        $featuredTemplates = [
                            ['name' => 'Portfolio Agency', 'price' => 'Rp299.000'],
                            ['name' => 'SaaS Landing Page', 'price' => 'Rp200.000'],
                            ['name' => 'Admin Dashboard', 'price' => 'Rp149.000'],
                        ];
                    @endphp

                    <div class="flex flex-col flex-1 gap-5 min-w-64">
                        <div>
                            <div class="grid grid-cols-3 gap-1">
                                @foreach ($categories as $category)
                                    <a href="{{ $category['name'] === 'Semua Template' ? '/catalog' : '/catalog?kategori=' . $category['name'] }}"
                                        class="flex items-center gap-2.5 px-3 py-2 rounded-md transition-colors group hover:bg-[#F87171]/10 min-w-[213.33px]">
                                        <iconify-icon icon="material-symbols:{{ $category['icon'] }}"
                                            class="text-text-secondary group-hover:text-text-brand"
                                            width="24"></iconify-icon>
                                        <span
                                            class="font-family-body text-sm text-text-secondary group-hover:text-text-link">
                                            {{ $category['name'] }}
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="p-px bg-border-subtle rounded-full"></div>

                        <div>
                            <h3 class="font-family-display text-xl font-semibold text-text-primary mb-4">Template
                                Unggulan</h3>
                            <div class="flex gap-4">
                                @foreach ($featuredTemplates as $template)
                                    <a href="{{ route('product', Str::slug($template['name'])) }}" wire:navigate class="flex flex-col gap-2 w-50 group shadow-sm rounded-lg h-fit">
                                        <img src="https://picsum.photos/seed/{{ Str::slug($template['name']) }}/600/400"
                                            alt="{{ $template['name'] }}"
                                            class="w-full h-32.5 object-cover rounded-lg transition-transform duration-300 group-hover:scale-105">
                                        <div class="p-3">
                                            <span
                                                class="font-family-body text-[16px] text-text-primary">{{ $template['name'] }}</span>
                                            <span
                                                class="font-family-display text-xl font-semibold text-text-primary">{{ $template['price'] }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-center justify-center text-center gap-6 bg-brand-primary/5 rounded-xl p-2.5 w-87.5 h-113.5">
                        <img src="{{ asset('images/catalog/dropsidebar.png') }}" alt="Custom template illustration"
                            width="200">
                        <div class="flex flex-col gap-2.5">
                            <h3 class="font-family-display font-bold text-text-primary text-lg">Butuh template custom?
                            </h3>
                            <p class="font-family-body text-sm text-text-primary">
                                Kami siap membantu membuat template sesuai kebutuhanmu.
                            </p>
                        </div>
                        <a href="#"
                            class="flex items-center gap-2.5 border-2 border-brand-primary text-brand-primary rounded-lg px-4 py-2.5 font-family-body text-sm font-semibold">
                            <iconify-icon icon="mdi:whatsapp" class="text-brand-primary" width="24"></iconify-icon>
                            Konsultasi Gratis
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div x-data="{ open: false }" @click.away="open = false" class="relative">
            <form action="/catalog" method="GET" class="shadow-sm rounded-lg flex justify-between items-center px-6 py-2.5 min-w-161 bg-white">
                <input type="search" name="cari" value="{{ request('cari') }}"
                    @focus="open = true" @blur="open = false"
                    placeholder="Cari landing page, portofolio, dashboard, atau e-commerce"
                    class="w-full h-full focus:outline-0 placeholder:text-text-placeholder font-family-body pr-2.5">
                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                <button type="submit" aria-label="Cari">
                    <iconify-icon icon="material-symbols:search" class="text-icon-brand"></iconify-icon>
                </button>
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
                        <a href="/catalog?kategori=Portfolio"
                            class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                            <span class="font-family-body text-sm text-text-primary group-hover:text-text-link">Portfolio</span>
                            <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16"
                                class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                        </a>
                        <a href="/catalog?kategori=Landing Page"
                            class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                            <span class="font-family-body text-sm text-text-primary group-hover:text-text-link">Landing Page</span>
                            <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16"
                                class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                        </a>
                        <a href="/catalog?kategori=Dashboard"
                            class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                            <span class="font-family-body text-sm text-text-primary group-hover:text-text-link">Dashboard</span>
                            <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16"
                                class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                        </a>
                        <a href="/catalog?kategori=E-Commerce"
                            class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                            <span class="font-family-body text-sm text-text-primary group-hover:text-text-link">E-Commerce</span>
                            <iconify-icon icon="material-symbols:arrow-outward" width="16" height="16"
                                class="text-text-tertiary group-hover:text-text-brand"></iconify-icon>
                        </a>
                    </div>
                </div>

                <div class="mx-4 border-t border-border-subtle"></div>

                <div class="px-4 pt-3 pb-4">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="font-family-display text-sm text-text-secondary">Kategori Pilihan</h3>
                        <a href="/catalog"
                            class="flex items-center gap-1 font-family-body text-sm font-medium text-text-brand hover:text-interactive-primary-background-hover transition-colors">
                            Lihat Semua
                            <iconify-icon icon="material-symbols:chevron-right" width="16" height="16"></iconify-icon>
                        </a>
                    </div>
                    <div class="flex overflow-x-auto gap-3 snap-x snap-mandatory scroll-smooth pb-2">
                        <a href="/catalog?kategori=Portfolio"
                            class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                            <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                style="background-image: url('https://picsum.photos/200?random=1'); background-size: cover; background-position: center;">
                                <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">Portfolio</p>
                                <p class="font-family-body text-xs text-text-inverse relative z-10">12 template</p>
                            </div>
                        </a>
                        <a href="/catalog?kategori=Landing Page"
                            class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                            <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                style="background-image: url('https://picsum.photos/200?random=2'); background-size: cover; background-position: center;">
                                <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">Landing Page</p>
                                <p class="font-family-body text-xs text-text-inverse relative z-10">8 template</p>
                            </div>
                        </a>
                        <a href="/catalog?kategori=Dashboard"
                            class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                            <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                style="background-image: url('https://picsum.photos/200?random=3'); background-size: cover; background-position: center;">
                                <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">Dashboard</p>
                                <p class="font-family-body text-xs text-text-inverse relative z-10">6 template</p>
                            </div>
                        </a>
                        <a href="/catalog?kategori=E-Commerce"
                            class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                            <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                style="background-image: url('https://picsum.photos/200?random=4'); background-size: cover; background-position: center;">
                                <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">E-Commerce</p>
                                <p class="font-family-body text-xs text-text-inverse relative z-10">10 template</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
