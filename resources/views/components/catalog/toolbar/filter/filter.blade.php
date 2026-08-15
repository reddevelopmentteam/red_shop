<div>
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
            <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                type="button"
                class="px-4 h-11 bg-surface-default border-2 border-border-default rounded-lg flex justify-between items-center min-w-77.5 transition-colors duration-100 cursor-pointer" :class="{ 'text-brand-primary': open }">
                <div class="flex gap-2.5 items-center">
                    <iconify-icon icon="material-symbols:filter-list" width="24"></iconify-icon>
                    <span class="font-family-body text-[14px] font-semibold">Filter</span>
                </div>

                <!-- Heroicon: micro chevron-down -->
                <iconify-icon icon="material-symbols:keyboard-arrow-down" class="transform transition-transfrom duration-100" :class="{ 'rotate-180': open }"></iconify-icon>
            </button>

            <!-- Panel -->
            <div class="absolute left-0 z-10">

                <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
                    :id="$id('dropdown-button')" x-cloak
                    class="flex flex-col min-w-77.5 gap-4 p-4 rounded-xl bg-surface-default border-2 mt-6.5 z-10 border-border-subtle">
                    @if ($kategori)
                        <div class="flex flex-col gap-4">
                            <h1 class="font-family-body font-semibold text-[14px]">Tipe</h1>
                            <div class="flex flex-col gap-2.5">
                                <div class="flex justify-between items-center">
                                    <div class="flex gap-2">
                                        <input type="checkbox" id="type-saas" value="SaaS" wire:model.live="types" class="accent-icon-brand" @checked(in_array('SaaS', $types))>
                                        <label for="type-saas" class="font-family-body text-sm">SaaS</label>
                                    </div>
                                    <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['types']['SaaS'] ?? 0 }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex gap-2">
                                        <input type="checkbox" id="type-startup" value="Startup" wire:model.live="types" class="accent-icon-brand" @checked(in_array('Startup', $types))>
                                        <label for="type-startup" class="font-family-body text-sm">Startup</label>
                                    </div>
                                    <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['types']['Startup'] ?? 0 }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex gap-2">
                                        <input type="checkbox" id="type-agency" value="Agency" wire:model.live="types" class="accent-icon-brand" @checked(in_array('Agency', $types))>
                                        <label for="type-agency" class="font-family-body text-sm">Agency</label>
                                    </div>
                                    <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['types']['Agency'] ?? 0 }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex gap-2">
                                        <input type="checkbox" id="type-product" value="Product" wire:model.live="types" class="accent-icon-brand" @checked(in_array('Product', $types))>
                                        <label for="type-product" class="font-family-body text-sm">Product</label>
                                    </div>
                                    <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['types']['Product'] ?? 0 }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex gap-2">
                                        <input type="checkbox" id="type-app" value="App" wire:model.live="types" class="accent-icon-brand" @checked(in_array('App', $types))>
                                        <label for="type-app" class="font-family-body text-sm">App</label>
                                    </div>
                                    <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['types']['App'] ?? 0 }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex gap-2">
                                        <input type="checkbox" id="type-personal" value="Personal" wire:model.live="types" class="accent-icon-brand" @checked(in_array('Personal', $types))>
                                        <label for="type-personal" class="font-family-body text-sm">Personal</label>
                                    </div>
                                    <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['types']['Personal'] ?? 0 }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex gap-2">
                                        <input type="checkbox" id="type-business" value="Business" wire:model.live="types" class="accent-icon-brand" @checked(in_array('Business', $types))>
                                        <label for="type-business" class="font-family-body text-sm">Business</label>
                                    </div>
                                    <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['types']['Business'] ?? 0 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-full bg-border-subtle p-px"></div>
                    @endif
                    <div class="flex flex-col gap-4">
                        <h1 class="font-family-body font-semibold text-[14px]">Status</h1>
                        <div class="flex flex-col gap-2.5">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="status-tersedia" value="tersedia" wire:model.live="statuses" class="accent-icon-brand" @checked(in_array('tersedia', $statuses))>
                                    <label for="status-tersedia" class="font-family-body text-sm">Tersedia</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['statuses']['tersedia'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="status-akan-datang" value="akan_datang" wire:model.live="statuses" class="accent-icon-brand" @checked(in_array('akan_datang', $statuses))>
                                    <label for="status-akan-datang" class="font-family-body text-sm">Akan datang</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['statuses']['akan_datang'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="status-tidak-tersedia" value="tidak_tersedia" wire:model.live="statuses" class="accent-icon-brand" @checked(in_array('tidak_tersedia', $statuses))>
                                    <label for="status-tidak-tersedia" class="font-family-body text-sm">Tidak tersedia</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['statuses']['tidak_tersedia'] ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-full bg-border-subtle p-px"></div>
                    <div class="flex flex-col gap-4">
                        <h1 class="font-family-body font-semibold text-[14px]">Harga</h1>
                        <div class="flex flex-col gap-2.5">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="radio" id="price-semua-harga" value="semua-harga" wire:model.live="price" class="accent-icon-brand" @checked($price === null || $price === 'semua-harga')>
                                    <label for="price-semua-harga" class="font-family-body text-sm">Semua harga</label>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="radio" id="price-under100" value="under100" wire:model.live="price" class="accent-icon-brand" @checked($price === 'under100')>
                                    <label for="price-under100" class="font-family-body text-sm">Dibawah Rp100.000</label>
                                </div>
                                <p class="font-family-body text-text-secondary text-[12px] font-semibold">{{ $counts['prices']['under100'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="radio" id="price-100-250" value="100-250" wire:model.live="price" class="accent-icon-brand" @checked($price === '100-250')>
                                    <label for="price-100-250" class="font-family-body text-sm">Rp100.000 - Rp250.000</label>
                                </div>
                                <p class="font-family-body text-text-secondary text-[12px] font-semibold">{{ $counts['prices']['100-250'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="radio" id="price-250-500" value="250-500" wire:model.live="price" class="accent-icon-brand" @checked($price === '250-500')>
                                    <label for="price-250-500" class="font-family-body text-sm">Rp250.000 - Rp500.000</label>
                                </div>
                                <p class="font-family-body text-text-secondary text-[12px] font-semibold">{{ $counts['prices']['250-500'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="radio" id="price-over500" value="over500" wire:model.live="price" class="accent-icon-brand" @checked($price === 'over500')>
                                    <label for="price-over500" class="font-family-body text-sm">Diatas Rp500.000</label>
                                </div>
                                <p class="font-family-body text-text-secondary text-[12px] font-semibold">{{ $counts['prices']['over500'] ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-full bg-border-subtle p-px"></div>
                    <div class="flex flex-col gap-4">
                        <h1 class="font-family-body font-semibold text-[14px]">Teknologi</h1>
                        <div class="flex flex-col gap-2.5">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="tech-html" value="HTML" wire:model.live="techs" class="accent-icon-brand" @checked(in_array('HTML', $techs))>
                                    <label for="tech-html" class="font-family-body text-sm">HTML</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['techs']['HTML'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="tech-react" value="React" wire:model.live="techs" class="accent-icon-brand" @checked(in_array('React', $techs))>
                                    <label for="tech-react" class="font-family-body text-sm">React</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['techs']['React'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="tech-vue" value="Vue" wire:model.live="techs" class="accent-icon-brand" @checked(in_array('Vue', $techs))>
                                    <label for="tech-vue" class="font-family-body text-sm">Vue</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['techs']['Vue'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="tech-laravel" value="Laravel" wire:model.live="techs" class="accent-icon-brand" @checked(in_array('Laravel', $techs))>
                                    <label for="tech-laravel" class="font-family-body text-sm">Laravel</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['techs']['Laravel'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="tech-nextjs" value="Next.js" wire:model.live="techs" class="accent-icon-brand" @checked(in_array('Next.js', $techs))>
                                    <label for="tech-nextjs" class="font-family-body text-sm">Next.js</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['techs']['Next.js'] ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-full bg-border-subtle p-px"></div>
                    <div class="flex flex-col gap-4">
                        <h1 class="font-family-body font-semibold text-[14px]">Lisensi</h1>
                        <div class="flex flex-col gap-2.5">
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="licence-personal" value="Personal" wire:model.live="licences" class="accent-icon-brand" @checked(in_array('Personal', $licences))>
                                    <label for="licence-personal" class="font-family-body text-sm">Personal</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['licences']['Personal'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="licence-komersial" value="Komersial" wire:model.live="licences" class="accent-icon-brand" @checked(in_array('Komersial', $licences))>
                                    <label for="licence-komersial" class="font-family-body text-sm">Komersial</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['licences']['Komersial'] ?? 0 }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <input type="checkbox" id="licence-personal-komersial" value="Personal & Komersial" wire:model.live="licences" class="accent-icon-brand" @checked(in_array('Personal & Komersial', $licences))>
                                    <label for="licence-personal-komersial" class="font-family-body text-sm">Personal & Komersial</label>
                                </div>
                                <p class="font-family-body text-[12px] text-text-secondary font-semibold">{{ $counts['licences']['Personal & Komersial'] ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <button wire:click="applyFilters"
                        class="px-4 py-2.5 text-center text-brand-primary bg-background-error font-family-body text-sm rounded-lg font-semibold">Terapkan Filter</button>
                </div>
            </div>
        </div>
    </div>
</div>
