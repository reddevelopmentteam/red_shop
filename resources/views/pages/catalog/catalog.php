<?php

use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

new #[Layout('layouts::catalog')] class extends Component
{
    public int $currentPage = 1;

    #[Url(as: 'kategori')]
    public ?string $kategori = null;

    #[Url(as: 'cari')]
    public ?string $cari = null;

    public array $appliedStatuses = [];

    public ?string $appliedPrice = null;

    public array $appliedTypes = [];

    public array $appliedTechs = [];

    public array $appliedLicences = [];

    public string $sort = 'terbaru';

    #[On('sort-changed')]
    public function changeSort(string $sort): void
    {
        $this->sort = $sort;
        $this->currentPage = 1;
    }

    #[On('page-changed')]
    public function changePage(int $page): void
    {
        $this->currentPage = max(1, min($page, $this->getTotalPages()));
    }

    #[On('kategori-cleared')]
    public function clearKategori(): void
    {
        $this->kategori = null;
        $this->currentPage = 1;
    }

    #[On('filters-reset')]
    public function resetFilters(): void
    {
        $this->kategori = null;
        $this->cari = null;
        $this->currentPage = 1;
        $this->appliedStatuses = [];
        $this->appliedPrice = null;
        $this->appliedTypes = [];
        $this->appliedTechs = [];
        $this->appliedLicences = [];
    }

    #[On('filters-applied')]
    public function applyFilters(array $types, array $statuses, ?string $price, array $techs, array $licences): void
    {
        $this->appliedTypes = $types;
        $this->appliedStatuses = $statuses;
        $this->appliedPrice = $price;
        $this->appliedTechs = $techs;
        $this->appliedLicences = $licences;
        $this->currentPage = 1;
    }

    #[On('filter-removed')]
    public function removeFilter(string $group, string $value): void
    {
        match ($group) {
            'types' => $this->appliedTypes = array_values(array_diff($this->appliedTypes, [$value])),
            'statuses' => $this->appliedStatuses = array_values(array_diff($this->appliedStatuses, [$value])),
            'techs' => $this->appliedTechs = array_values(array_diff($this->appliedTechs, [$value])),
            'licences' => $this->appliedLicences = array_values(array_diff($this->appliedLicences, [$value])),
            'price' => $this->appliedPrice = null,
            default => null,
        };

        $this->currentPage = 1;
    }

    public function showFeatured(): bool
    {
        return $this->kategori === null
            && ! $this->cari
            && $this->appliedStatuses === []
            && $this->appliedPrice === null
            && $this->appliedTypes === []
            && $this->appliedTechs === []
            && $this->appliedLicences === [];
    }

    public function getTotalPages(): int
    {
        return max(1, (int) ceil(count($this->getFilteredTemplates()) / 24));
    }

    public function getTotalTemplates(): int
    {
        return count($this->getFilteredTemplates());
    }

    public function getPageTemplates(): array
    {
        return collect($this->getFilteredTemplates())
            ->slice(($this->currentPage - 1) * 24, 24)
            ->values()
            ->all();
    }

    public function getFilterCounts(): array
    {
        $all = collect($this->allTemplates());

        return [
            'types' => $this->countByGroup($all, 'type', 'types'),
            'statuses' => $this->countByGroup($all, 'status', 'statuses'),
            'techs' => $this->countByGroup($all, 'tech', 'techs'),
            'licences' => $this->countByGroup($all, 'licence', 'licences'),
            'prices' => $this->countPrices($all),
        ];
    }

    private function countByGroup(Collection $all, string $field, string $exceptGroup): array
    {
        return $all
            ->filter(fn (array $template): bool => $this->matchesOtherFilters($template, $exceptGroup))
            ->countBy($field)
            ->all();
    }

    private function countPrices(Collection $all): array
    {
        $pool = $all->filter(fn (array $template): bool => $this->matchesOtherFilters($template, 'prices'));

        return [
            'under100' => $pool->filter(fn (array $template): bool => $this->matchesPrice($template['price'], 'under100'))->count(),
            '100-250' => $pool->filter(fn (array $template): bool => $this->matchesPrice($template['price'], '100-250'))->count(),
            '250-500' => $pool->filter(fn (array $template): bool => $this->matchesPrice($template['price'], '250-500'))->count(),
            'over500' => $pool->filter(fn (array $template): bool => $this->matchesPrice($template['price'], 'over500'))->count(),
        ];
    }

    private function matchesOtherFilters(array $template, string $exceptGroup): bool
    {
        if ($this->cari && ! $this->matchesSearch($template)) {
            return false;
        }

        if ($this->kategori && $template['category'] !== $this->kategori) {
            return false;
        }

        if ($exceptGroup !== 'statuses' && $this->appliedStatuses && ! in_array($template['status'], $this->appliedStatuses)) {
            return false;
        }

        if ($exceptGroup !== 'prices' && $this->appliedPrice && ! $this->matchesPrice($template['price'], $this->appliedPrice)) {
            return false;
        }

        if ($exceptGroup !== 'types' && $this->appliedTypes && ! in_array($template['type'], $this->appliedTypes)) {
            return false;
        }

        if ($exceptGroup !== 'techs' && $this->appliedTechs && ! in_array($template['tech'], $this->appliedTechs)) {
            return false;
        }

        if ($exceptGroup !== 'licences' && $this->appliedLicences && ! in_array($template['licence'], $this->appliedLicences)) {
            return false;
        }

        return true;
    }

    private function getFilteredTemplates(): array
    {
        return collect($this->allTemplates())
            ->filter(function (array $template): bool {
                if ($this->cari && ! $this->matchesSearch($template)) {
                    return false;
                }

                if ($this->kategori && $template['category'] !== $this->kategori) {
                    return false;
                }

                if ($this->appliedStatuses && ! in_array($template['status'], $this->appliedStatuses)) {
                    return false;
                }

                if ($this->appliedPrice && ! $this->matchesPrice($template['price'], $this->appliedPrice)) {
                    return false;
                }

                if ($this->appliedTypes && ! in_array($template['type'], $this->appliedTypes)) {
                    return false;
                }

                if ($this->appliedTechs && ! in_array($template['tech'], $this->appliedTechs)) {
                    return false;
                }

                if ($this->appliedLicences && ! in_array($template['licence'], $this->appliedLicences)) {
                    return false;
                }

                return true;
            })
            ->pipe(fn (Collection $templates): Collection => $this->sortTemplates($templates))
            ->values()
            ->all();
    }

    private function sortTemplates(Collection $templates): Collection
    {
        return match ($this->sort) {
            'harga-terendah' => $templates
                ->sortBy(fn (array $template): int => $this->priceValue($template['price']) ?? PHP_INT_MAX)
                ->values(),
            'harga-tertinggi' => $templates
                ->sortByDesc(fn (array $template): int => $this->priceValue($template['price']) ?? 0)
                ->values(),
            'terlaris' => $templates
                ->sortBy(fn (array $template): int => $template['discount'] ?? 0, SORT_REGULAR, true)
                ->values(),
            'nama-a-z' => $templates->sortBy('name')->values(),
            default => $templates,
        };
    }

    private function priceValue(?string $price): ?int
    {
        return $price ? (int) str_replace(['Rp', '.'], '', $price) : null;
    }

    private function matchesSearch(array $template): bool
    {
        return str_contains(mb_strtolower($template['name']), mb_strtolower($this->cari));
    }

    private function matchesPrice(?string $price, string $range): bool
    {
        if ($range === 'semua-harga') {
            return true;
        }

        $value = $price ? (int) str_replace(['Rp', '.'], '', $price) : 0;

        return match ($range) {
            'under100' => $value < 100000,
            '100-250' => $value >= 100000 && $value <= 250000,
            '250-500' => $value >= 250000 && $value <= 500000,
            'over500' => $value > 500000,
            default => true,
        };
    }

    private function typeFor(string $category, int $index): string
    {
        return match ($category) {
            'SaaS' => 'SaaS',
            'Landing Page' => $index % 2 === 0 ? 'Startup' : 'Product',
            'Portfolio' => 'Agency',
            'Dashboard' => $index % 2 === 0 ? 'Business' : 'App',
            'E-Commerce' => $index % 2 === 0 ? 'Business' : 'App',
            'Blog' => 'Personal',
            'Education' => $index % 2 === 0 ? 'Personal' : 'Business',
            'Data Management' => 'Business',
            default => 'Personal',
        };
    }

    private function allTemplates(): array
    {
        return Product::query()
            ->with(['category', 'techStacks'])
            ->latest()
            ->get()
            ->map(fn (Product $product): array => $this->formatProduct($product))
            ->all();

        $templates = [
            // Page 1
            ['name' => 'Portfolio Agency', 'category' => 'Portfolio', 'price' => 'Rp299.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Landing Page', 'category' => 'Landing Page', 'price' => 'Rp249.000', 'originalPrice' => 'Rp349.000', 'discount' => 29, 'status' => 'tersedia'],
            ['name' => 'Admin Dashboard', 'category' => 'Dashboard', 'price' => null, 'originalPrice' => null, 'discount' => null, 'status' => 'tidak_tersedia'],
            ['name' => 'Toko Online Fashion', 'category' => 'E-Commerce', 'price' => 'Rp399.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Creative Portfolio', 'category' => 'Portfolio', 'price' => 'Rp199.000', 'originalPrice' => 'Rp299.000', 'discount' => 33, 'status' => 'tersedia'],
            ['name' => 'Startup Landing', 'category' => 'Landing Page', 'price' => 'Rp279.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Analytics Dashboard', 'category' => 'Dashboard', 'price' => 'Rp449.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Pricing Page', 'category' => 'SaaS', 'price' => 'Rp179.000', 'originalPrice' => 'Rp249.000', 'discount' => 28, 'status' => 'tersedia'],
            ['name' => 'Data Analytics Panel', 'category' => 'Data Management', 'price' => 'Rp349.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tidak_tersedia'],
            ['name' => 'Marketplace Store', 'category' => 'E-Commerce', 'price' => 'Rp499.000', 'originalPrice' => 'Rp599.000', 'discount' => 17, 'status' => 'tersedia'],
            ['name' => 'Personal Blog', 'category' => 'Blog', 'price' => 'Rp149.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'University Portal', 'category' => 'Education', 'price' => 'Rp329.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Corporate Profile', 'category' => 'Portfolio', 'price' => 'Rp259.000', 'originalPrice' => 'Rp359.000', 'discount' => 28, 'status' => 'tersedia'],
            ['name' => 'Product Landing', 'category' => 'Landing Page', 'price' => 'Rp219.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'CRM Dashboard', 'category' => 'Dashboard', 'price' => null, 'originalPrice' => null, 'discount' => null, 'status' => 'tidak_tersedia'],
            ['name' => 'Inventory System', 'category' => 'Data Management', 'price' => 'Rp379.000', 'originalPrice' => 'Rp479.000', 'discount' => 21, 'status' => 'tersedia'],
            ['name' => 'Multi Vendor Store', 'category' => 'E-Commerce', 'price' => 'Rp549.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Tech Blog', 'category' => 'Blog', 'price' => 'Rp169.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'LMS Platform', 'category' => 'Education', 'price' => 'Rp419.000', 'originalPrice' => 'Rp519.000', 'discount' => 19, 'status' => 'tersedia'],
            ['name' => 'SaaS Dashboard', 'category' => 'SaaS', 'price' => 'Rp299.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Agency Portfolio', 'category' => 'Portfolio', 'price' => 'Rp229.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Minimal Blog', 'category' => 'Blog', 'price' => 'Rp129.000', 'originalPrice' => 'Rp199.000', 'discount' => 35, 'status' => 'tersedia'],
            ['name' => 'Cloud Dashboard', 'category' => 'SaaS', 'price' => 'Rp359.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Edu Portal', 'category' => 'Education', 'price' => 'Rp289.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],

            // Page 2
            ['name' => 'Modern Portfolio', 'category' => 'Portfolio', 'price' => 'Rp269.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'App Landing Page', 'category' => 'Landing Page', 'price' => 'Rp239.000', 'originalPrice' => 'Rp319.000', 'discount' => 25, 'status' => 'tersedia'],
            ['name' => 'Finance Dashboard', 'category' => 'Dashboard', 'price' => 'Rp479.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Onboarding', 'category' => 'SaaS', 'price' => 'Rp199.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'CRM System', 'category' => 'Data Management', 'price' => 'Rp429.000', 'originalPrice' => 'Rp529.000', 'discount' => 19, 'status' => 'tersedia'],
            ['name' => 'Electronics Store', 'category' => 'E-Commerce', 'price' => 'Rp459.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'News Blog', 'category' => 'Blog', 'price' => 'Rp159.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'School Portal', 'category' => 'Education', 'price' => 'Rp319.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'One Page Landing', 'category' => 'Landing Page', 'price' => 'Rp189.000', 'originalPrice' => 'Rp269.000', 'discount' => 30, 'status' => 'tersedia'],
            ['name' => 'Project Dashboard', 'category' => 'Dashboard', 'price' => 'Rp389.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Recipe Blog', 'category' => 'Blog', 'price' => 'Rp139.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Metrics', 'category' => 'SaaS', 'price' => 'Rp329.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tidak_tersedia'],
            ['name' => 'Gadget Store', 'category' => 'E-Commerce', 'price' => 'Rp489.000', 'originalPrice' => 'Rp589.000', 'discount' => 17, 'status' => 'tersedia'],
            ['name' => 'Minimal Portfolio', 'category' => 'Portfolio', 'price' => 'Rp179.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Event Landing', 'category' => 'Landing Page', 'price' => 'Rp209.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Warehouse System', 'category' => 'Data Management', 'price' => 'Rp399.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Course Platform', 'category' => 'Education', 'price' => 'Rp369.000', 'originalPrice' => 'Rp469.000', 'discount' => 21, 'status' => 'tersedia'],
            ['name' => 'HR Dashboard', 'category' => 'Dashboard', 'price' => 'Rp419.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Travel Blog', 'category' => 'Blog', 'price' => 'Rp149.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Fashion Store', 'category' => 'E-Commerce', 'price' => 'Rp439.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Analytics', 'category' => 'SaaS', 'price' => 'Rp279.000', 'originalPrice' => 'Rp379.000', 'discount' => 26, 'status' => 'tersedia'],
            ['name' => 'Real Estate Landing', 'category' => 'Landing Page', 'price' => 'Rp299.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Medical Portal', 'category' => 'Education', 'price' => 'Rp349.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Creative Agency', 'category' => 'Portfolio', 'price' => 'Rp249.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],

            // Page 3
            ['name' => 'Startup Dashboard', 'category' => 'Dashboard', 'price' => 'Rp359.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Product Landing V2', 'category' => 'Landing Page', 'price' => 'Rp219.000', 'originalPrice' => 'Rp299.000', 'discount' => 27, 'status' => 'tersedia'],
            ['name' => 'Portfolio Minimal', 'category' => 'Portfolio', 'price' => 'Rp189.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'E-Commerce Lite', 'category' => 'E-Commerce', 'price' => 'Rp349.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Starter', 'category' => 'SaaS', 'price' => 'Rp169.000', 'originalPrice' => 'Rp239.000', 'discount' => 29, 'status' => 'tersedia'],
            ['name' => 'Photo Blog', 'category' => 'Blog', 'price' => 'Rp129.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Student Portal', 'category' => 'Education', 'price' => 'Rp299.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Data Warehouse', 'category' => 'Data Management', 'price' => 'Rp459.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Service Landing', 'category' => 'Landing Page', 'price' => 'Rp259.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Admin Panel', 'category' => 'Dashboard', 'price' => 'Rp399.000', 'originalPrice' => 'Rp499.000', 'discount' => 20, 'status' => 'tersedia'],
            ['name' => 'Freelancer Portfolio', 'category' => 'Portfolio', 'price' => 'Rp159.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Grocery Store', 'category' => 'E-Commerce', 'price' => 'Rp379.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Music Blog', 'category' => 'Blog', 'price' => 'Rp149.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tidak_tersedia'],
            ['name' => 'SaaS Billing', 'category' => 'SaaS', 'price' => 'Rp289.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Training Platform', 'category' => 'Education', 'price' => 'Rp339.000', 'originalPrice' => 'Rp439.000', 'discount' => 23, 'status' => 'tersedia'],
            ['name' => 'Inventory Dashboard', 'category' => 'Data Management', 'price' => 'Rp409.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Overview', 'category' => 'SaaS', 'price' => 'Rp249.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Book Store', 'category' => 'E-Commerce', 'price' => 'Rp319.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Design Portfolio', 'category' => 'Portfolio', 'price' => 'Rp209.000', 'originalPrice' => 'Rp289.000', 'discount' => 28, 'status' => 'tersedia'],
            ['name' => 'Webinar Landing', 'category' => 'Landing Page', 'price' => 'Rp179.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Fitness Blog', 'category' => 'Blog', 'price' => 'Rp139.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Certification Portal', 'category' => 'Education', 'price' => 'Rp309.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'API Dashboard', 'category' => 'Dashboard', 'price' => 'Rp439.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Service Dashboard', 'category' => 'Dashboard', 'price' => 'Rp369.000', 'originalPrice' => 'Rp469.000', 'discount' => 21, 'status' => 'tersedia'],

            // Page 4
            ['name' => 'Photography Portfolio', 'category' => 'Portfolio', 'price' => 'Rp239.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'App Preview Landing', 'category' => 'Landing Page', 'price' => 'Rp199.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Sales Dashboard', 'category' => 'Dashboard', 'price' => 'Rp429.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Suite', 'category' => 'SaaS', 'price' => 'Rp319.000', 'originalPrice' => 'Rp419.000', 'discount' => 24, 'status' => 'tersedia'],
            ['name' => 'Fashion Marketplace', 'category' => 'E-Commerce', 'price' => 'Rp469.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Travel Blog V2', 'category' => 'Blog', 'price' => 'Rp159.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Research Portal', 'category' => 'Education', 'price' => 'Rp359.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'CRM Analytics', 'category' => 'Data Management', 'price' => 'Rp449.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Crypto Landing', 'category' => 'Landing Page', 'price' => 'Rp229.000', 'originalPrice' => 'Rp329.000', 'discount' => 30, 'status' => 'tersedia'],
            ['name' => 'Operations Dashboard', 'category' => 'Dashboard', 'price' => 'Rp389.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Lifestyle Blog', 'category' => 'Blog', 'price' => 'Rp139.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Platform', 'category' => 'SaaS', 'price' => 'Rp269.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Online Course', 'category' => 'Education', 'price' => 'Rp389.000', 'originalPrice' => 'Rp489.000', 'discount' => 20, 'status' => 'tersedia'],
            ['name' => 'Boutique Store', 'category' => 'E-Commerce', 'price' => 'Rp359.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Artist Portfolio', 'category' => 'Portfolio', 'price' => 'Rp179.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Social Media Landing', 'category' => 'Landing Page', 'price' => 'Rp189.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'HR Analytics', 'category' => 'Data Management', 'price' => 'Rp419.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Admin', 'category' => 'SaaS', 'price' => 'Rp299.000', 'originalPrice' => 'Rp399.000', 'discount' => 25, 'status' => 'tersedia'],
            ['name' => 'Magazine Blog', 'category' => 'Blog', 'price' => 'Rp169.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Learning Portal', 'category' => 'Education', 'price' => 'Rp329.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Minimal Dashboard', 'category' => 'Dashboard', 'price' => 'Rp379.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Shoe Store', 'category' => 'E-Commerce', 'price' => 'Rp399.000', 'originalPrice' => 'Rp499.000', 'discount' => 20, 'status' => 'tersedia'],
            ['name' => 'Architecture Portfolio', 'category' => 'Portfolio', 'price' => 'Rp279.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Event Landing V2', 'category' => 'Landing Page', 'price' => 'Rp209.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],

            // Page 5
            ['name' => 'Business Portfolio', 'category' => 'Portfolio', 'price' => 'Rp259.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Features Landing', 'category' => 'Landing Page', 'price' => 'Rp249.000', 'originalPrice' => 'Rp349.000', 'discount' => 29, 'status' => 'tersedia'],
            ['name' => 'Dev Dashboard', 'category' => 'Dashboard', 'price' => 'Rp469.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Team', 'category' => 'SaaS', 'price' => 'Rp229.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Jewelry Store', 'category' => 'E-Commerce', 'price' => 'Rp519.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Food Blog', 'category' => 'Blog', 'price' => 'Rp149.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Language Portal', 'category' => 'Education', 'price' => 'Rp349.000', 'originalPrice' => 'Rp449.000', 'discount' => 22, 'status' => 'tersedia'],
            ['name' => 'ERP Dashboard', 'category' => 'Data Management', 'price' => 'Rp499.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'SaaS Enterprise', 'category' => 'SaaS', 'price' => 'Rp359.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'One Page Portfolio', 'category' => 'Portfolio', 'price' => 'Rp199.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Promo Landing', 'category' => 'Landing Page', 'price' => 'Rp169.000', 'originalPrice' => 'Rp239.000', 'discount' => 29, 'status' => 'tersedia'],
            ['name' => 'Handmade Store', 'category' => 'E-Commerce', 'price' => 'Rp329.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Podcast Blog', 'category' => 'Blog', 'price' => 'Rp139.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Academic Portal', 'category' => 'Education', 'price' => 'Rp379.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Metrics Dashboard', 'category' => 'Dashboard', 'price' => 'Rp409.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Growth', 'category' => 'SaaS', 'price' => 'Rp289.000', 'originalPrice' => 'Rp389.000', 'discount' => 26, 'status' => 'tersedia'],
            ['name' => 'Digital Portfolio', 'category' => 'Portfolio', 'price' => 'Rp219.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Startup Landing V2', 'category' => 'Landing Page', 'price' => 'Rp239.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Pet Store', 'category' => 'E-Commerce', 'price' => 'Rp369.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Code Blog', 'category' => 'Blog', 'price' => 'Rp159.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Tutor Portal', 'category' => 'Education', 'price' => 'Rp299.000', 'originalPrice' => 'Rp399.000', 'discount' => 25, 'status' => 'tersedia'],
            ['name' => 'Report Dashboard', 'category' => 'Dashboard', 'price' => 'Rp439.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Service Landing V2', 'category' => 'Landing Page', 'price' => 'Rp219.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Agency Dashboard', 'category' => 'Dashboard', 'price' => 'Rp389.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],

            // Page 6
            ['name' => 'Studio Portfolio', 'category' => 'Portfolio', 'price' => 'Rp289.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Landing Pro', 'category' => 'Landing Page', 'price' => 'Rp269.000', 'originalPrice' => 'Rp369.000', 'discount' => 27, 'status' => 'tersedia'],
            ['name' => 'Monitor Dashboard', 'category' => 'Dashboard', 'price' => 'Rp489.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Suite Pro', 'category' => 'SaaS', 'price' => 'Rp339.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Craft Store', 'category' => 'E-Commerce', 'price' => 'Rp409.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Design Blog', 'category' => 'Blog', 'price' => 'Rp179.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Skill Portal', 'category' => 'Education', 'price' => 'Rp369.000', 'originalPrice' => 'Rp469.000', 'discount' => 21, 'status' => 'tersedia'],
            ['name' => 'BI Dashboard', 'category' => 'Data Management', 'price' => 'Rp529.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Pro', 'category' => 'SaaS', 'price' => 'Rp309.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Executive Portfolio', 'category' => 'Portfolio', 'price' => 'Rp249.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Launch Landing', 'category' => 'Landing Page', 'price' => 'Rp199.000', 'originalPrice' => 'Rp279.000', 'discount' => 29, 'status' => 'tersedia'],
            ['name' => 'Vintage Store', 'category' => 'E-Commerce', 'price' => 'Rp379.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Writing Blog', 'category' => 'Blog', 'price' => 'Rp149.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => ' Academy Pro', 'category' => 'Education', 'price' => 'Rp399.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Executive Dashboard', 'category' => 'Dashboard', 'price' => 'Rp519.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'SaaS Scale', 'category' => 'SaaS', 'price' => 'Rp379.000', 'originalPrice' => 'Rp479.000', 'discount' => 21, 'status' => 'tersedia'],
            ['name' => 'Magazine Portfolio', 'category' => 'Portfolio', 'price' => 'Rp229.000', 'originalPrice' => null, 'discount' => null, 'status' => 'akan_datang'],
            ['name' => 'Demo Landing', 'category' => 'Landing Page', 'price' => 'Rp249.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Sneaker Store', 'category' => 'E-Commerce', 'price' => 'Rp449.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Vlog Blog', 'category' => 'Blog', 'price' => 'Rp169.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Coding Academy', 'category' => 'Education', 'price' => 'Rp349.000', 'originalPrice' => 'Rp449.000', 'discount' => 22, 'status' => 'tersedia'],
            ['name' => 'Full Dashboard', 'category' => 'Dashboard', 'price' => 'Rp459.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Startup Pro Landing', 'category' => 'Landing Page', 'price' => 'Rp279.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
            ['name' => 'Gallery Portfolio', 'category' => 'Portfolio', 'price' => 'Rp209.000', 'originalPrice' => null, 'discount' => null, 'status' => 'tersedia'],
        ];

        return collect($templates)
            ->values()
            ->map(function (array $template, int $index): array {
                $template['type'] = $this->typeFor($template['category'], $index);
                $template['tech'] = ['HTML', 'React', 'Vue', 'Laravel', 'Next.js'][$index % 5];
                $template['licence'] = ['Personal', 'Komersial', 'Personal & Komersial'][$index % 3];

                return $template;
            })
            ->all();
    }

    private function formatProduct(Product $product): array
    {
        $hasDiscount = $product->discount_price !== null && $product->price > 0;
        $thumbnail = $product->thumbnail;
        $thumbnailPath = ltrim($thumbnail, '/');

        if (str_starts_with($thumbnailPath, 'storage/')) {
            $thumbnailPath = substr($thumbnailPath, 8);
        }

        $status = $product->status === 'for sale' ? 'tersedia' : 'tidak_tersedia';
        $licence = match ($product->license) {
            'commercial' => 'Komersial',
            'personal & commercial' => 'Personal & Komersial',
            default => 'Personal',
        };

        return [
            'name' => $product->name,
            'category' => $product->category->first()?->name ?? 'Tanpa kategori',
            'price' => 'Rp'.number_format($product->discount_price ?? $product->price, 0, ',', '.'),
            'originalPrice' => $hasDiscount
                ? 'Rp'.number_format($product->price, 0, ',', '.')
                : null,
            'discount' => $hasDiscount
                ? (int) round((1 - $product->discount_price / $product->price) * 100)
                : null,
            'status' => $status,
            'type' => $this->typeFor($product->category->first()?->name ?? '', $product->id),
            'tech' => $product->techStacks->first()?->name ?? 'HTML',
            'licence' => $licence,
            'thumbnail' => filter_var($thumbnail, FILTER_VALIDATE_URL)
                ? $thumbnail
                : asset('storage/'.$thumbnailPath),
            'demoLink' => $product->demo_link,
        ];
    }
};
