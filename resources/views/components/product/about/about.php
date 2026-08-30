<?php

use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
    #[Reactive]
    public string $about = '';

    /** @var array<int, string> */
    #[Reactive]
    public array $features = [];

    /** @var array<int, array{label: string, slug: string, color: string}> */
    #[Reactive]
    public array $techStacks = [];
};
