<div class="flex items-center gap-3 flex-wrap">
    @php
        $priceLabels = [
            'semua-harga' => 'Semua harga',
            'under100' => 'Dibawah Rp100.000',
            '100-250' => 'Rp100.000 - Rp250.000',
            '250-500' => 'Rp250.000 - Rp500.000',
            'over500' => 'Diatas Rp500.000',
        ];

        $statusLabels = [
            'tersedia' => 'Tersedia',
            'akan_datang' => 'Akan datang',
            'tidak_tersedia' => 'Tidak tersedia',
        ];

        $chips = [];

        if ($kategori) {
            $chips[] = ['group' => null, 'value' => $kategori, 'label' => $kategori, 'remove' => 'removeKategori'];
        }

        foreach ($appliedStatuses as $value) {
            $chips[] = ['group' => 'statuses', 'value' => $value, 'label' => $statusLabels[$value] ?? $value, 'remove' => 'removeFilter'];
        }

        if ($appliedPrice && $appliedPrice !== 'semua-harga') {
            $chips[] = ['group' => 'price', 'value' => $appliedPrice, 'label' => $priceLabels[$appliedPrice] ?? $appliedPrice, 'remove' => 'removeFilter'];
        }

        foreach ($appliedTypes as $value) {
            $chips[] = ['group' => 'types', 'value' => $value, 'label' => $value, 'remove' => 'removeFilter'];
        }

        foreach ($appliedTechs as $value) {
            $chips[] = ['group' => 'techs', 'value' => $value, 'label' => $value, 'remove' => 'removeFilter'];
        }

        foreach ($appliedLicences as $value) {
            $chips[] = ['group' => 'licences', 'value' => $value, 'label' => $value, 'remove' => 'removeFilter'];
        }
    @endphp

    @foreach ($chips as $chip)
        <span
            class="flex items-center gap-2 px-4 py-2 rounded-lg bg-zinc-200 font-family-body text-sm text-text-primary">
            {{ $chip['label'] }}
            @if ($chip['remove'] === 'removeKategori')
                <button wire:click="removeKategori" type="button"
                    class="text-text-primary hover:text-text-brand transition-colors flex items-center">
                    <iconify-icon icon="material-symbols:close" width="16" height="16"></iconify-icon>
                </button>
            @else
                <button wire:click="removeFilter('{{ $chip['group'] }}', '{{ $chip['value'] }}')" type="button"
                    class="text-text-tertiary hover:text-text-brand transition-colors">
                    <iconify-icon icon="material-symbols:close" width="16" height="16"></iconify-icon>
                </button>
            @endif
        </span>
    @endforeach

    @if ($chips)
        <button wire:click="resetFilters" type="button"
            class="font-family-body text-sm font-semibold text-brand-primary hover:text-interactive-primary-background-hover transition-colors">
            Reset
        </button>
    @endif
</div>
