<div class="flex-1">
    {{-- Tentang Template --}}
    <h2 class="font-family-display text-4xl font-bold text-text-primary mb-4">Tentang Template</h2>
    <p class="font-family-body text-lg text-text-secondary leading-relaxed">
        {{ $about }}
    </p>

    {{-- Fitur Utama --}}
    <h3 class="font-family-display text-3xl font-bold text-text-primary mt-8 mb-4">Fitur Utama</h3>
    <ul class="space-y-3">
        @foreach ($features as $feature)
            <li class="flex items-start gap-3">
                <iconify-icon icon="material-symbols:check-circle" class="text-brand-primary mt-0.5" width="24" height="24"></iconify-icon>
                <span class="font-family-body text-[16px] text-text-secondary">{{ $feature }}</span>
            </li>
        @endforeach
    </ul>

    {{-- Teknologi --}}
    <h3 class="font-family-display text-xl font-bold text-text-primary mt-8 mb-4">Teknologi</h3>
    <div class="flex flex-wrap gap-3">
        @foreach ($techStacks as $tech)
            <span
                class="flex items-center gap-2 rounded-lg px-3 py-2 font-family-body text-xs font-semibold"
                style="background-color: {{ $tech['color'] }}1a; color: {{ $tech['color'] }};">
                <iconify-icon icon="devicon:{{ $tech['slug'] }}" width="18" height="18"></iconify-icon>
                {{ $tech['label'] }}
            </span>
        @endforeach
    </div>
</div>
