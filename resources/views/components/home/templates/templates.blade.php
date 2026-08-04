<section class="px-16 py-12">
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-family-display text-3xl font-bold text-text-primary">{{ $title }}
            <span class="text-text-brand">{{ $highlight }}</span>
        </h1>
        <a href="#"
            class="flex items-center gap-1 font-family-body text-sm font-medium text-text-brand hover:text-interactive-primary-background-hover transition-colors">
            Lihat Semua
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
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
                class="group bg-surface-default rounded-xl shadow-sm transition-all hover:shadow-md overflow-hidden">
                <div class="relative h-62.5 overflow-hidden">
                    <img src="{{ $template['thumbnail'] }}" alt="{{ $template['name'] }}"
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
                        class="inline-block mt-2 rounded-full bg-background-info px-3 py-0.5 font-family-body text-xs font-medium text-text-secondary">
                        {{ $template['category'] }}
                    </span>
                    @if ($template['status'] === 'tersedia')
                        <div class="mt-10 flex items-center gap-2">
                            <span
                                class="font-family-display text-lg font-bold {{ $template['originalPrice'] ? 'text-text-brand' : 'text-text-primary' }}">
                                {{ $template['price'] }}
                            </span>
                            @if ($template['originalPrice'])
                                <span class="font-family-body text-sm text-text-tertiary line-through">
                                    {{ $template['originalPrice'] }}
                                </span>
                                <span
                                    class="discount-badge bg-background-error px-2 pl-5 py-1 font-family-body text-xs font-medium text-text-error">
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
