<?php

use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
    /** @var array{category: string, license: string, lastUpdated: string, preview: string, filesIncluded: string, version: string} */
    #[Reactive]
    public array $template = [];
};
