<?php

use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
    #[Reactive]
    public int $page = 1;

    public int $totalPages = 6;

    public function goToPage(int $page): void
    {
        $page = max(1, min($page, $this->totalPages));
        $this->dispatch('page-changed', page: $page);
    }
};
