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
                                    <a href="#" class="flex flex-col gap-2 w-50 group shadow-sm rounded-lg h-fit">
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
        <form action="/catalog" method="GET" class="shadow-sm rounded-lg flex justify-between items-center px-6 py-2.5 min-w-161 bg-white">
            <input type="search" name="cari" value="{{ request('cari') }}"
                placeholder="Cari landing page, portofolio, dashboard, atau e-commerce"
                class="w-full h-full focus:outline-0 placeholder:text-text-placeholder font-family-body pr-2.5">
            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
            <button type="submit" aria-label="Cari">
                <iconify-icon icon="material-symbols:search" class="text-icon-brand"></iconify-icon>
            </button>
        </form>
    </div>
</div>
