<?php

use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
    #[Reactive]
    public int $page = 1;

    #[Reactive]
    public ?string $kategori = null;

    #[Reactive]
    public array $counts = [];

    public array $types = [];

    public array $statuses = [];

    public ?string $price = null;

    public array $techs = [];

    public array $licences = [];

    public function applyFilters(): void
    {
        $this->dispatch('filters-applied',
            types: $this->types,
            statuses: $this->statuses,
            price: $this->price,
            techs: $this->techs,
            licences: $this->licences,
        );
    }

    #[On('filter-removed')]
    public function removeDraftFilter(string $group, string $value): void
    {
        match ($group) {
            'types' => $this->types = array_values(array_diff($this->types, [$value])),
            'statuses' => $this->statuses = array_values(array_diff($this->statuses, [$value])),
            'techs' => $this->techs = array_values(array_diff($this->techs, [$value])),
            'licences' => $this->licences = array_values(array_diff($this->licences, [$value])),
            'price' => $this->price = null,
            default => null,
        };
    }

    #[On('filters-reset')]
    public function resetDraft(): void
    {
        $this->types = [];
        $this->statuses = [];
        $this->price = null;
        $this->techs = [];
        $this->licences = [];
    }
};
