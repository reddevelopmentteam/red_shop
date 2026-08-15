<?php

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

    #[Reactive]
    public int $total = 0;

    #[Reactive]
    public array $appliedTypes = [];

    #[Reactive]
    public array $appliedStatuses = [];

    #[Reactive]
    public ?string $appliedPrice = null;

    #[Reactive]
    public array $appliedTechs = [];

    #[Reactive]
    public array $appliedLicences = [];

    #[Reactive]
    public string $sort = 'terbaru';
};
