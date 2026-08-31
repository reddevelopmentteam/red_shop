<?php

use App\Services\TemplateData;
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
            'techs' => $this->countTechGroups($all),
            'licences' => $this->countByGroup($all, 'license', 'licences'),
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

    private function countTechGroups(Collection $all): array
    {
        return $all
            ->filter(fn (array $template): bool => $this->matchesOtherFilters($template, 'techs'))
            ->flatMap(fn (array $template): array => array_column($template['techStacks'], 'label'))
            ->countBy()
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

        if ($exceptGroup !== 'techs' && $this->appliedTechs && ! $this->matchesTechFilter($template)) {
            return false;
        }

        if ($exceptGroup !== 'licences' && $this->appliedLicences && ! in_array($template['license'], $this->appliedLicences)) {
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

                if ($this->appliedTechs && ! $this->matchesTechFilter($template)) {
                    return false;
                }

                if ($this->appliedLicences && ! in_array($template['license'], $this->appliedLicences)) {
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

    private function matchesTechFilter(array $template): bool
    {
        $techLabels = array_column($template['techStacks'], 'label');

        return ! empty(array_intersect($this->appliedTechs, $techLabels));
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

    private function allTemplates(): array
    {
        return TemplateData::all();
    }
};
