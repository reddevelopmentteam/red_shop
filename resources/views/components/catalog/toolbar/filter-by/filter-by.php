<?php

use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
    #[Reactive]
    public string $sort = 'terbaru';

    public function selectSort(string $sort): void
    {
        $this->dispatch('sort-changed', sort: $sort);
    }
};
