<?php

use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
    /** @var array{name: string, slug: string, category: string, price: ?string, originalPrice: ?string, discount: ?int, status: string, demoLink: string} */
    #[Reactive]
    public array $template = [];
};
