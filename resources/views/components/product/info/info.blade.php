<div class="w-80 shrink-0 flex flex-col justify-center">
    <h1 class="font-family-display text-2xl font-bold text-text-primary mb-3">
        {{ $template['name'] }}
    </h1>

    @php
        $statusConfig = match ($template['status']) {
            'tersedia' => ['label' => 'Tersedia', 'class' => 'bg-background-success text-text-success'],
            'akan_datang' => ['label' => 'Akan Datang', 'class' => 'bg-background-warning text-text-warning'],
            'tidak_tersedia' => ['label' => 'Tidak Tersedia', 'class' => 'bg-background-error text-text-error'],
            default => ['label' => $template['status'], 'class' => 'bg-background-subtle text-text-secondary'],
        };
    @endphp

    <span class="inline-block rounded-2xl px-4 py-3 w-fit font-family-body text-xs font-medium {{ $statusConfig['class'] }}">
        {{ $statusConfig['label'] }}
    </span>

    @if ($template['status'] === 'tersedia' && $template['price'])
        <div class="mt-6">
            @if ($template['originalPrice'])
                <div class="flex flex-col items-start gap-2">
                    <span class="font-family-display text-5xl font-bold text-text-brand">
                        <span class="font-normal">Rp</span>{{ ltrim($template['price'], 'Rp') }}
                    </span>
                    <span class="font-family-body text-sm text-text-disabled">
                        <span class="font-normal">Rp</span>{{ ltrim($template['originalPrice'], 'Rp') }}
                        <span class="discount-badge bg-background-error px-2 pl-5 py-1 font-family-body text-xs text-text-error">
                            -{{ $template['discount'] }}%
                        </span>
                    </span>
                </div>
            @else
                <span class="font-family-display text-5xl font-bold text-text-primary">
                    <span class="font-normal">Rp</span>{{ ltrim($template['price'], 'Rp') }}
                </span>
            @endif
        </div>
    @endif

    {{-- WhatsApp Button --}}
    <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan template {{ $template['name'] }}"
        target="_blank"
        class="mt-6 flex items-center justify-center gap-2 w-full py-3 rounded-lg bg-background-brand text-text-inverse font-family-body text-sm font-semibold hover:opacity-80 transition-opacity">
        <iconify-icon icon="mdi:whatsapp" width="20" height="20"></iconify-icon>
        Pesan via WhatsApp
    </a>

    {{-- Other Options --}}
    <p class="mt-2 text-center font-family-body text-xs text-text-tertiary">Opsi lain</p>
    <div class="mt-2 flex gap-2">
        <a href="https://instagram.com/redshop" target="_blank"
            class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-lg border border-border-brand font-family-body text-xs font-medium text-text-brand hover:border-brand-primary hover:text-text-brand transition-colors">
            <iconify-icon icon="mdi:instagram" width="16" height="16"></iconify-icon>
            Instagram
        </a>
        <a href="mailto:redshop@example.com"
            class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-lg border border-border-brand font-family-body text-xs font-medium text-text-brand hover:border-brand-primary hover:text-text-brand transition-colors">
            <iconify-icon icon="mdi:gmail" width="16" height="16"></iconify-icon>
            Gmail
        </a>
    </div>
    <div class="mt-4 p-px bg-divider-default rounded-full"></div>

    {{-- Live Demo Button --}}
    <a href="{{ $template['demoLink'] }}" target="_blank"
        class="mt-4 flex items-center justify-center gap-2 w-full py-3 rounded-lg bg-background-error text-brand-primary font-family-body text-sm font-semibold hover:bg-brand-primary hover:text-white transition-colors">
        <iconify-icon icon="mdi:web" width="18" height="18"></iconify-icon>
        Live Demo
        <iconify-icon icon="material-symbols:arrow-outward-outline-rounded" width="18" height="18"></iconify-icon>
    </a>
</div>
