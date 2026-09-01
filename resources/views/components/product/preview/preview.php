<?php

use Livewire\Attributes\Reactive;
use Livewire\Component;

new class extends Component
{
    /** @var array<int, string> */
    #[Reactive]
    public array $images = [];

    #[Reactive]
    public string $selectedImage = '';

    #[Reactive]
    public string $templateName = '';

    public function selectImage(string $image): void
    {
        $this->dispatch('image-selected', image: $image);
    }
};
