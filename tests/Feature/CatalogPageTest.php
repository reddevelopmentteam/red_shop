<?php

use Livewire\Livewire;

test('catalog page applies filters dispatched from the toolbar filter', function () {
    Livewire::test('pages::catalog')
        ->dispatch('filters-applied', types: [], statuses: ['tersedia'], price: null, techs: [], licences: [])
        ->assertSet('appliedStatuses', ['tersedia'])
        ->assertSet('currentPage', 1)
        ->assertSet('appliedPrice', null)
        ->assertSet('appliedTypes', []);
});

test('catalog page exposes only templates matching the applied filter', function () {
    $component = Livewire::test('pages::catalog')
        ->dispatch('filters-applied', types: [], statuses: ['tersedia'], price: null, techs: [], licences: []);

    $templates = $component->instance()->getPageTemplates();

    expect($templates)->not->toBeEmpty();
    expect(collect($templates)->pluck('status')->unique()->all())->toBe(['tersedia']);
});

test('featured section renders when nothing is filtered', function () {
    $component = Livewire::test('pages::catalog');

    expect($component->instance()->showFeatured())->toBeTrue();
});

test('featured section is hidden when a filter is applied', function () {
    $component = Livewire::test('pages::catalog')
        ->dispatch('filters-applied', types: [], statuses: ['tersedia'], price: null, techs: [], licences: []);

    expect($component->instance()->showFeatured())->toBeFalse();
});

test('featured section is hidden when a kategori is selected', function () {
    $component = Livewire::test('pages::catalog', ['kategori' => 'SaaS']);

    expect($component->instance()->showFeatured())->toBeFalse();
});

test('toolbar filter dispatches applied filter state', function () {
    Livewire::test('catalog.toolbar.filter', ['page' => 1, 'kategori' => null, 'counts' => []])
        ->set('statuses', ['tersedia'])
        ->call('applyFilters')
        ->assertDispatched('filters-applied', types: [], statuses: ['tersedia'], price: null, techs: [], licences: []);
});

test('filter chip dispatches filter removal', function () {
    Livewire::test('catalog.toolbar.filter-chip', [
        'kategori' => null,
        'appliedTypes' => [],
        'appliedStatuses' => ['tersedia'],
        'appliedPrice' => null,
        'appliedTechs' => [],
        'appliedLicences' => [],
    ])
        ->call('removeFilter', 'statuses', 'tersedia')
        ->assertDispatched('filter-removed', group: 'statuses', value: 'tersedia');
});

test('catalog page removes a single applied filter value', function () {
    Livewire::test('pages::catalog')
        ->dispatch('filters-applied', types: [], statuses: ['tersedia', 'akan_datang'], price: null, techs: [], licences: [])
        ->dispatch('filter-removed', group: 'statuses', value: 'tersedia')
        ->assertSet('appliedStatuses', ['akan_datang'])
        ->assertSet('currentPage', 1);
});

test('filter panel resets its draft state when filters are reset', function () {
    Livewire::test('catalog.toolbar.filter', ['page' => 1, 'kategori' => null, 'counts' => []])
        ->set('statuses', ['tersedia'])
        ->set('price', '100-250')
        ->dispatch('filters-reset')
        ->assertSet('statuses', [])
        ->assertSet('price', null);
});

test('filter panel removes a value from its draft state when a chip is removed', function () {
    Livewire::test('catalog.toolbar.filter', ['page' => 1, 'kategori' => null, 'counts' => []])
        ->set('statuses', ['tersedia', 'akan_datang'])
        ->dispatch('filter-removed', group: 'statuses', value: 'tersedia')
        ->assertSet('statuses', ['akan_datang']);
});

test('filter panel keeps selected checkboxes checked in the rendered markup', function () {
    $html = Livewire::test('catalog.toolbar.filter', ['page' => 1, 'kategori' => null, 'counts' => []])
        ->set('statuses', ['tersedia'])
        ->set('techs', ['Laravel'])
        ->html();

    expect($html)->toContain('id="status-tersedia" value="tersedia" wire:model.live="statuses" class="accent-icon-brand" checked');
    expect($html)->toContain('id="status-akan-datang" value="akan_datang" wire:model.live="statuses" class="accent-icon-brand"');
    expect($html)->toContain('id="tech-laravel" value="Laravel" wire:model.live="techs" class="accent-icon-brand" checked');
});

test('filter panel defaults the price radio to semua-harga', function () {
    $html = Livewire::test('catalog.toolbar.filter', ['page' => 1, 'kategori' => null, 'counts' => []])
        ->html();

    expect($html)->toContain('id="price-semua-harga" value="semua-harga" wire:model.live="price" class="accent-icon-brand" checked');
    expect($html)->toContain('id="price-under100" value="under100" wire:model.live="price" class="accent-icon-brand"');
});

test('catalog page combines filters across groups', function () {
    $component = Livewire::test('pages::catalog')
        ->dispatch('filters-applied', types: [], statuses: ['tersedia'], price: '100-250', techs: ['Laravel'], licences: ['Personal']);

    $templates = $component->instance()->getPageTemplates();

    expect($templates)->not->toBeEmpty();

    $violations = collect($templates)->filter(function (array $template): bool {
        $value = (int) str_replace(['Rp', '.'], '', $template['price'] ?? '0');
        $techLabels = array_column($template['techStacks'], 'label');

        return $template['status'] !== 'tersedia'
            || $value < 100000
            || $value > 250000
            || ! in_array('Laravel', $techLabels)
            || $template['license'] !== 'Personal';
    })->count();

    expect($violations)->toBe(0);
});

test('toolbar filter dispatches multiple groups at once', function () {
    Livewire::test('catalog.toolbar.filter', ['page' => 1, 'kategori' => null, 'counts' => []])
        ->set('statuses', ['tersedia'])
        ->set('price', '100-250')
        ->set('techs', ['Laravel'])
        ->set('licences', ['Personal'])
        ->call('applyFilters')
        ->assertDispatched('filters-applied',
            types: [],
            statuses: ['tersedia'],
            price: '100-250',
            techs: ['Laravel'],
            licences: ['Personal'],
        );
});

test('filter chip renders chips for every applied group', function () {
    $html = Livewire::test('catalog.toolbar.filter-chip', [
        'kategori' => null,
        'appliedTypes' => [],
        'appliedStatuses' => ['tersedia'],
        'appliedPrice' => '100-250',
        'appliedTechs' => ['Laravel'],
        'appliedLicences' => ['Personal'],
    ])->html();

    expect($html)->toContain('Tersedia');
    expect($html)->toContain('Rp100.000 - Rp250.000');
    expect($html)->toContain('Laravel');
    expect($html)->toContain('Personal');
    expect($html)->toContain('Reset');
});

test('total template renders the total count', function () {
    $html = Livewire::test('catalog.toolbar.total-template', ['total' => 144])->html();

    expect($html)->toContain('144 Template');
});

test('total template reflects the filtered count across all pages', function () {
    $component = Livewire::test('pages::catalog');

    expect($component->instance()->getTotalTemplates())->toBe(144);

    $component->dispatch('filters-applied', types: [], statuses: ['tersedia'], price: null, techs: [], licences: []);

    expect($component->instance()->getTotalTemplates())->toBe(125);
});

test('catalog page applies the sort dispatched from the filter-by toolbar', function () {
    Livewire::test('pages::catalog')
        ->dispatch('sort-changed', sort: 'harga-terendah')
        ->assertSet('sort', 'harga-terendah')
        ->assertSet('currentPage', 1);
});

test('catalog page sorts templates by price ascending', function () {
    $component = Livewire::test('pages::catalog')
        ->dispatch('sort-changed', sort: 'harga-terendah');

    $prices = collect($component->instance()->getPageTemplates())
        ->map(fn (array $template): ?int => $template['price'] ? (int) str_replace(['Rp', '.'], '', $template['price']) : null)
        ->filter()
        ->values()
        ->all();

    expect($prices)->toHaveCount(24);
    expect($prices)->toBe($prices);
    expect($prices)->toEqual(collect($prices)->sort()->values()->all());
});

test('catalog page sorts templates by price descending', function () {
    $component = Livewire::test('pages::catalog')
        ->dispatch('sort-changed', sort: 'harga-tertinggi');

    $prices = collect($component->instance()->getPageTemplates())
        ->map(fn (array $template): ?int => $template['price'] ? (int) str_replace(['Rp', '.'], '', $template['price']) : null)
        ->filter()
        ->values()
        ->all();

    expect($prices)->toEqual(collect($prices)->sortDesc()->values()->all());
});

test('catalog page sorts templates by name ascending', function () {
    $component = Livewire::test('pages::catalog')
        ->dispatch('sort-changed', sort: 'nama-a-z');

    $names = collect($component->instance()->getPageTemplates())->pluck('name')->all();

    expect($names)->toEqual(collect($names)->sort()->values()->all());
});

test('catalog page sorts templates by discount descending for terlaris', function () {
    $component = Livewire::test('pages::catalog')
        ->dispatch('sort-changed', sort: 'terlaris');

    $discounts = collect($component->instance()->getPageTemplates())
        ->map(fn (array $template): int => $template['discount'] ?? 0)
        ->all();

    expect($discounts)->toEqual(collect($discounts)->sortDesc()->values()->all());
});

test('filter-by toolbar dispatches the selected sort', function () {
    Livewire::test('catalog.toolbar.filter-by', ['sort' => 'terbaru'])
        ->call('selectSort', 'harga-tertinggi')
        ->assertDispatched('sort-changed', sort: 'harga-tertinggi');
});

test('filter-by toolbar renders the active sort as the button label', function () {
    $html = Livewire::test('catalog.toolbar.filter-by', ['sort' => 'harga-terendah'])->html();

    expect($html)->toContain('Harga Terendah');
    expect($html)->toContain('wire:click="selectSort(\'terlaris\')"');
});

test('toolbar children keep stable wire keys so the filter is not re-mounted', function () {
    $html = Livewire::test('catalog.toolbar', [
        'page' => 1,
        'kategori' => 'SaaS',
        'counts' => [],
        'total' => 18,
        'appliedTypes' => [],
        'appliedStatuses' => [],
        'appliedPrice' => null,
        'appliedTechs' => [],
        'appliedLicences' => [],
        'sort' => 'terbaru',
    ])->html();

    expect($html)->toContain('wire:key="filter"');
    expect($html)->toContain('wire:key="filter-chip"');
    expect($html)->toContain('wire:key="total-template"');
    expect($html)->toContain('wire:key="filter-by"');
});

test('catalog page filters templates by search term', function () {
    $component = Livewire::test('pages::catalog', ['cari' => 'Blog']);

    $templates = $component->instance()->getPageTemplates();

    expect($templates)->not->toBeEmpty();
    expect(collect($templates)->every(fn (array $template): bool => str_contains(mb_strtolower($template['name']), 'blog')))->toBeTrue();
});

test('catalog page matches search case-insensitively', function () {
    $component = Livewire::test('pages::catalog', ['cari' => 'SAAS']);

    $templates = $component->instance()->getPageTemplates();

    expect($templates)->not->toBeEmpty();
    expect(collect($templates)->every(fn (array $template): bool => str_contains(mb_strtolower($template['name']), 'saas')))->toBeTrue();
});

test('featured section is hidden when a search term is set', function () {
    $component = Livewire::test('pages::catalog', ['cari' => 'Blog']);

    expect($component->instance()->showFeatured())->toBeFalse();
});

test('catalog page clears the search term when filters are reset', function () {
    Livewire::test('pages::catalog', ['cari' => 'Blog'])
        ->dispatch('filters-reset')
        ->assertSet('cari', null);
});

test('empty state shows when no templates match', function () {
    $html = Livewire::test('pages::catalog', ['cari' => 'xyznonexistent'])->html();

    expect($html)->toContain('Template tidak ditemukan');
    expect($html)->toContain(asset('catalog/no-card.svg'));
});

test('pagination is hidden when no templates match', function () {
    Livewire::test('pages::catalog', ['cari' => 'xyznonexistent'])
        ->assertDontSeeHtml('wire:click="goToPage');
});
