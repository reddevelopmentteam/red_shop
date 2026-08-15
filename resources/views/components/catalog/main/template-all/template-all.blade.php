<section class="py-8 min-h-screen">
    <h2 class="font-family-display text-2xl font-bold text-text-primary mb-6">Semua Template</h2>

    @if (!empty($templates))
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
                            <div class="mt-8 flex-col gap-2">
                                <span
                                    class="font-family-display text-2xl font-bold {{ $template['originalPrice'] ? 'text-text-brand' : 'text-text-primary' }}">
                                    {{ $template['price'] }}
                                </span>
                                @if ($template['originalPrice'])
                                    <span class="font-family-body line-through text-[16px] text-text-disabled">
                                        {{ $template['originalPrice'] }}
                                    </span>
                                    <span
                                        class="discount-badge bg-background-error px-2 pl-5 py-1 font-family-body text-[16px] font-bold text-text-error">
                                        {{ $template['discount'] }}%
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center justify-center py-16">
            <img src="{{ asset('images/catalog/no-card.svg') }}" alt="Template tidak ditemukan" class="mb-6" width="400">
            <h3 class="font-family-display text-xl font-bold text-text-primary mb-2">
                Template <span class="text-text-error">tidak ditemukan</span>
            </h3>
            <p class="font-family-body text-sm text-text-secondary text-center max-w-md mb-6">
                Kami tidak menemukan template yang sesuai dengan pencarian atau filter yang dipilih.
                Coba gunakan kata kunci lain atau atur ulang filter untuk melihat lebih banyak hasil.
            </p>
            <button wire:click="resetFilters"
                class="px-6 py-2.5 rounded-lg bg-background-brand text-text-inverse font-family-body text-sm font-semibold hover:opacity-80 transition-opacity">
                Reset Filter
            </button>
        </div>
    @endif
</section>
