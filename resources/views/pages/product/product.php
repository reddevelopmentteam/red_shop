<?php

use App\Services\TemplateData;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

new #[Layout('layouts::catalog')] class extends Component
{
    public string $slug;

    /** @var array{name: string, slug: string, category: string, type: string, price: ?string, originalPrice: ?string, discount: ?int, status: string, about: string, features: array<int, string>, techStacks: array<int, array{label: string, slug: string, color: string}>, version: string, demoLink: string, license: string, images: array<int, string>, lastUpdated: string, preview: string, filesIncluded: string, thumbnail: string}|null */
    public ?array $template = null;

    public string $selectedImage = '';

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->template = TemplateData::findBySlug($slug);

        if ($this->template === null) {
            abort(404);
        }

        $this->selectedImage = $this->template['images'][0] ?? $this->template['thumbnail'];
    }

    #[On('image-selected')]
    public function updateSelectedImage(string $image): void
    {
        $this->selectedImage = $image;
    }
};
