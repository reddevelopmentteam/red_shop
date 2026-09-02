<div class="flex justify-center">
    @php
        $sortLabels = [
            'terbaru' => 'Terbaru',
            'terlaris' => 'Terlaris',
            'harga-terendah' => 'Harga Terendah',
            'harga-tertinggi' => 'Harga Tertinggi',
            'nama-a-z' => 'Nama A-Z',
        ];
    @endphp

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
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']" class="relative">
        <!-- Button -->
        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
            type="button"
            class="relative flex justify-between items-center whitespace-nowrap py-2.5 rounded-lg shadow-sm bg-surface-default border-2 border-border-subtle px-4 min-w-49.75">
            <div>
                <span class="font-family-body text-text-secondary">Urutkan:</span>
                <span class="font-family-body text-brand-primary">{{ $sortLabels[$sort] ?? 'Terbaru' }}</span>
            </div>

            <iconify-icon icon="material-symbols:keyboard-arrow-down" class="transform transition-transform delay-100"
                :class="{ 'rotate-180': open }"></iconify-icon>
        </button>

        <!-- Panel -->
        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')" x-cloak
            class="absolute flex flex-col gap-4 left-0 min-w-49.75 rounded-lg shadow-sm mt-6.5 bg-surface-default px-4 py-2.5 border-2 border-border-subtle z-10">
            @foreach ($sortLabels as $key => $label)
                <button type="button" wire:click="selectSort('{{ $key }}')"
                    class="text-left font-family-body {{ $sort === $key ? 'text-brand-primary' : '' }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>
</div>
