<x-filament-widgets::widget class="welcome-widget">
    <section class="welcome-card">
        <div class="welcome-glow welcome-glow-one" aria-hidden="true"></div>
        <div class="welcome-glow welcome-glow-two" aria-hidden="true"></div>

        <div class="welcome-content">
            <div class="welcome-copy">
                <span class="welcome-eyebrow"><span></span> RED SHOP · TOKO ONLINE</span>
                <h2>Selamat datang, {{ $name }}.</h2>
                <p>Kelola inventaris website Anda dan pantau penjualan dengan mudah.</p>
            </div>

            <div class="welcome-status">
                <div class="welcome-status-icon" aria-hidden="true">↗</div>
                <div>
                    <span>Produk terbaru</span>
                    <strong>{{ $latestProject ?? 'Siap menambah produk' }}</strong>
                </div>
            </div>
        </div>

        <div class="welcome-mark" aria-hidden="true">
            <img src="{{ asset('images/logo/red_logo.svg') }}" alt="">
        </div>
    </section>

    <section class="dashboard-overview" aria-label="Ikhtisar toko online">
        <div class="dashboard-overview-heading">
            <div>
                <span class="section-kicker">IKHTISAR TOKO</span>
                <h3>Performa bisnis Anda dalam satu tampilan</h3>
            </div>
            <span class="overview-date">{{ now()->translatedFormat('l, d F Y') }}</span>
        </div>

        <div class="overview-metrics">
            <div class="overview-metric">
                <span>Website Dijual</span>
                <strong>{{ $projectCount }}</strong>
            </div>
            <div class="overview-metric">
                <span>Kategori</span>
                <strong>{{ $memberCount }}</strong>
            </div>
            <div class="overview-metric">
                <span>Tech Stack</span>
                <strong>{{ $skillCount }}</strong>
            </div>
            <div class="overview-metric">
                <span>Kanal Kontak</span>
                <strong>{{ $contactCount }}</strong>
            </div>
        </div>
    </section>

    <section class="dashboard-shortcuts" aria-labelledby="shortcut-title">
        <div class="dashboard-shortcuts-heading">
            <span class="section-kicker">AKSES CEPAT</span>
            <h3 id="shortcut-title">Kelola toko Anda</h3>
        </div>

        <div class="shortcut-grid">
            @foreach ($quickLinks as $link)
                <a wire:navigate href="{{ $link['url'] }}" class="shortcut-card shortcut-card-{{ $link['tone'] }}">
                    <div>
                        <strong>{{ $link['label'] }}</strong>
                        <span>{{ $link['description'] }}</span>
                    </div>
                    <span class="shortcut-arrow" aria-hidden="true">
                        <x-filament::icon
                            icon="heroicon-o-arrow-long-right"
                            class="w-5 h-5"
                        />
                    </span>
                </a>
            @endforeach
        </div>
    </section>
</x-filament-widgets::widget>
