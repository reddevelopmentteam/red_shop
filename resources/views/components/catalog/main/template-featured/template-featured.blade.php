<section class="py-8">
    <h2 class="font-family-display text-2xl font-bold text-text-primary mb-6">Unggulan</h2>

    @php
        $templates = [
            [
                'name' => 'Portfolio Agency',
                'category' => 'Portfolio',
                'price' => 'Rp299.000',
                'originalPrice' => null,
                'discount' => null,
                'status' => 'tersedia',
            ],
            [
                'name' => 'SaaS Landing Page',
                'category' => 'Landing Page',
                'price' => 'Rp249.000',
                'originalPrice' => 'Rp349.000',
                'discount' => 29,
                'status' => 'tersedia',
            ],
            [
                'name' => 'Admin Dashboard',
                'category' => 'Dashboard',
                'price' => null,
                'originalPrice' => null,
                'discount' => null,
                'status' => 'tidak_tersedia',
            ],
            [
                'name' => 'Toko Online Fashion',
                'category' => 'E-Commerce',
                'price' => 'Rp399.000',
                'originalPrice' => null,
                'discount' => null,
                'status' => 'tersedia',
            ],
        ];
    @endphp

    <div class="grid grid-cols-4 gap-6">
        @foreach ($templates as $template)
            @php
                $statusConfig = match ($template['status']) {
                    'tersedia' => ['label' => 'Tersedia', 'class' => 'bg-background-success text-text-success'],
                    'akan_datang' => ['label' => 'Akan Datang', 'class' => 'bg-background-warning text-text-warning'],
                    'tidak_tersedia' => ['label' => 'Tidak Tersedia', 'class' => 'bg-background-error text-text-error'],
                    default => ['label' => $template['status'], 'class' => 'bg-background-subtle text-text-secondary'],
                };
            @endphp
            <a href="#"
                class="group bg-surface-default rounded-xl overflow-hidden shadow-sm">
                <div class="relative h-62.5 overflow-hidden">
                    <img src="https://picsum.photos/seed/{{ Str::slug($template['name']) }}/600/400"
                        alt="{{ $template['name'] }}"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    <span
                        class="absolute bottom-3 right-3 rounded-full px-3 py-1 font-family-body text-xs font-medium {{ $statusConfig['class'] }}">
                        {{ $statusConfig['label'] }}
                    </span>
                </div>
                <div class="p-4">
                    <h3 class="font-family-body text-lg text-text-primary">
                        {{ $template['name'] }}</h3>
                    <span
                        class="inline-block mt-2 rounded-full bg-background-info px-3 py-0.5 font-family-body text-xs font-bold text-text-secondary">
                        {{ $template['category'] }}
                    </span>
                    @if ($template['status'] === 'tersedia')
                        <div class="mt-8 gap-2 flex-col">
                            <span
                                class="font-family-display text-2xl font-bold {{ $template['originalPrice'] ? 'text-text-brand' : 'text-text-primary' }}">
                                {{ $template['price'] }}
                            </span>
                            @if ($template['originalPrice'])
                                <span class="font-family-body line-through text-[16px] text-text-disabled">
                                    {{ $template['originalPrice'] }}
                                </span>
                                <span
                                    class="discount-badge bg-background-error px-2 pl-5 py-1 font-family-body text-[16px] text-text-error">
                                    {{ $template['discount'] }}%
                                </span>
                            @endif
                        </div>
                    @endif
                </div>
            </a>
        @endforeach
    </div>
</section>
