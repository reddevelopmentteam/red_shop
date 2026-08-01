<?php

use Livewire\Component;

new class extends Component
{
    public string $title = '';

    public string $highlight = '';

    /** @var array<int, array{name: string, category: string, price: string, originalPrice: ?string, discount: ?int, status: string, thumbnail: string}> */
    public array $templates = [];
};
