<?php

use Livewire\Component;

new class extends Component
{
    /** @var array<int, array{name: string, category: string, price: string, originalPrice: ?string, discount: ?int, status: string, thumbnail: string}> */
    public array $newestTemplates = [
        [
            'name' => 'Portfolio Agency',
            'category' => 'Portfolio',
            'price' => 'Rp249.000',
            'originalPrice' => 'Rp349.000',
            'discount' => 29,
            'status' => 'tersedia',
            'thumbnail' => 'https://picsum.photos/seed/portfolio-agency/600/400',
        ],
        [
            'name' => 'SaaS Landing Page',
            'category' => 'Landing Page',
            'price' => 'Rp299.000',
            'originalPrice' => null,
            'discount' => null,
            'status' => 'tersedia',
            'thumbnail' => 'https://picsum.photos/seed/saas-landing/600/400',
        ],
        [
            'name' => 'Admin Dashboard',
            'category' => 'Dashboard',
            'price' => 'Rp349.000',
            'originalPrice' => 'Rp449.000',
            'discount' => 22,
            'status' => 'akan_datang',
            'thumbnail' => 'https://picsum.photos/seed/admin-dashboard/600/400',
        ],
        [
            'name' => 'Toko Online Fashion',
            'category' => 'E-Commerce',
            'price' => 'Rp399.000',
            'originalPrice' => null,
            'discount' => null,
            'status' => 'tersedia',
            'thumbnail' => 'https://picsum.photos/seed/fashion-store/600/400',
        ],
    ];

    /** @var array<int, array{name: string, category: string, price: string, originalPrice: ?string, discount: ?int, status: string, thumbnail: string}> */
    public array $bestSellingTemplates = [
        [
            'name' => 'Corporate Profile',
            'category' => 'Portfolio',
            'price' => 'Rp199.000',
            'originalPrice' => 'Rp299.000',
            'discount' => 33,
            'status' => 'tersedia',
            'thumbnail' => 'https://picsum.photos/seed/corporate-profile/600/400',
        ],
        [
            'name' => 'Startup Landing Page',
            'category' => 'Landing Page',
            'price' => 'Rp249.000',
            'originalPrice' => null,
            'discount' => null,
            'status' => 'tersedia',
            'thumbnail' => 'https://picsum.photos/seed/startup-landing/600/400',
        ],
        [
            'name' => 'Analytics Dashboard',
            'category' => 'Dashboard',
            'price' => 'Rp449.000',
            'originalPrice' => null,
            'discount' => null,
            'status' => 'tersedia',
            'thumbnail' => 'https://picsum.photos/seed/analytics-dashboard/600/400',
        ],
        [
            'name' => 'Marketplace Store',
            'category' => 'E-Commerce',
            'price' => 'Rp499.000',
            'originalPrice' => 'Rp599.000',
            'discount' => 17,
            'status' => 'tidak_tersedia',
            'thumbnail' => 'https://picsum.photos/seed/marketplace-store/600/400',
        ],
    ];
};
