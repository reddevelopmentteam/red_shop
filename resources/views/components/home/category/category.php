<?php

use Livewire\Component;

new class extends Component
{
    /** @var array<int, array{key: string, name: string, count: int, image: string}> */
    public array $categories = [
        ['key' => 'portofolio', 'name' => 'Portfolio', 'count' => 7, 'image' => 'https://picsum.photos/seed/portofolio/600/800'],
        ['key' => 'landing page', 'name' => 'Landing Page', 'count' => 10, 'image' => 'https://picsum.photos/seed/landing-page/600/800'],
        ['key' => 'dashboard', 'name' => 'Dashboard', 'count' => 5, 'image' => 'https://picsum.photos/seed/dashboard/600/800'],
        ['key' => 'e-commerce', 'name' => 'E-Commerce', 'count' => 9, 'image' => 'https://picsum.photos/seed/e-commerce/600/800'],
    ];
};
