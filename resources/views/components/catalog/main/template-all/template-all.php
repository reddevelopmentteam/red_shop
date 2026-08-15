<?php

use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
    #[Reactive]
    public array $templates = [];

    public function resetFilters(): void
    {
        $this->dispatch('filters-reset');
    }
};
