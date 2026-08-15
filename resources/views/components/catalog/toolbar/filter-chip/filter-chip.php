<?php

use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
    #[Reactive]
    public ?string $kategori = null;

    #[Reactive]
    public array $appliedTypes = [];

    #[Reactive]
    public array $appliedStatuses = [];

    #[Reactive]
    public ?string $appliedPrice = null;

    #[Reactive]
    public array $appliedTechs = [];

    #[Reactive]
    public array $appliedLicences = [];

    public function removeKategori(): void
    {
        $this->dispatch('kategori-cleared');
    }

    public function removeFilter(string $group, string $value): void
    {
        $this->dispatch('filter-removed', group: $group, value: $value);
    }

    public function resetFilters(): void
    {
        $this->dispatch('filters-reset');
    }
};
