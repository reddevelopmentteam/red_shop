<div class="relative -mt-20">
    <div class="grid grid-cols-2 min-h-screen">
        <div class="bg-conic-90 from-red-300 from-0% to-background-default to-100%"></div>
        <div class="bg-conic-270 from-background-default from-0 to-red-300 to-100%"></div>
    </div>
    <div class="absolute -bottom-1 left-0 w-full h-48 bg-linear-to-b from-transparent to-white"></div>
    <div class="absolute inset-0 flex flex-col justify-center mt-15 items-center px-43.75">
        <div id="headline" class="flex flex-col gap-4 items-center">
            <div>
                <h1 class="font-family-display text-7xl text-text-primary text-center font-bold">Template Website Modern
                    <span class="text-red-600">Siap Pakai</span> untuk Anda
                </h1>
            </div>
            <div>
                <p class="text-center font-family-body text-text-secondary text-lg max-w-2xl">Temukan berbagai template
                    website berkualitas tinggi yang dirancang untuk developer, freelancer,
                    bisnis, dan agensi. Hemat waktu pengembangan dengan desain yang modern dan responsif.</p>
            </div>
        </div>
        <div id="cta" class="flex gap-4 mt-22.25">
            {{-- searchbar --}}
            <div x-data="{ open: false }" @click.away="open = false" class="relative bg-white shadow-lg rounded-xl">
                <input type="search" id="searchALl" placeholder="Cari landing page, portofolio, dashboard..."
                    @focus="open = true" @blur="open = false"
                    class="border-0 placeholder:text-text-placeholder px-6 py-4 min-w-137 rounded-xl focus:outline-0 focus:ring-0">
                <span class="absolute right-4 mt-4 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path fill="#dc2626"
                            d="m19.6 21l-6.3-6.3q-.75.6-1.725.95T9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l6.3 6.3zM9.5 14q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14" />
                    </svg>

                </span>

                {{-- search  suggestion --}}
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-1"
                    class="absolute left-0 top-full mt-2 w-full bg-surface-default border border-border-subtle rounded-xl shadow-md z-50 overflow-hidden">

                    <div class="px-4 pt-4 pb-2">
                        <h3 class="font-family-display text-sm text-text-secondary mb-2">Sugesti Cepat</h3>
                        <div class="flex flex-col gap-1">
                            <a href="#"
                                class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                                <span
                                    class="font-family-body text-sm text-text-primary group-hover:text-text-link">Portfolio</span>
                                <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                                </svg>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                                <span
                                    class="font-family-body text-sm text-text-primary group-hover:text-text-link">Landing
                                    Page</span>
                                <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                                </svg>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                                <span
                                    class="font-family-body text-sm text-text-primary group-hover:text-text-link">Dashboard</span>
                                <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                                </svg>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between transition-colors group px-1 py-1.5 rounded-lg">
                                <span
                                    class="font-family-body text-sm text-text-primary group-hover:text-text-link">E-Commerce</span>
                                <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="mx-4 border-t border-border-subtle"></div>

                    <div class="px-4 pt-3 pb-4">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-family-display text-sm text-text-secondary">Kategori Pilihan</h3>
                            <a href="#"
                                class="flex items-center gap-1 font-family-body text-sm font-medium text-text-brand hover:text-interactive-primary-background-hover transition-colors">
                                Lihat Semua
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                        <div class="flex overflow-x-auto gap-3 snap-x snap-mandatory scroll-smooth pb-2">
                            <a href="#"
                                class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                                <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                    style="background-image: url('https://picsum.photos/200?random=1'); background-size: cover; background-position: center;">
                                    <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                    <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">
                                        Portfolio</p>
                                    <p class="font-family-body text-xs text-text-inverse relative z-10">12 template</p>
                                </div>
                            </a>
                            <a href="#"
                                class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                                <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                    style="background-image: url('https://picsum.photos/200?random=2'); background-size: cover; background-position: center;">
                                    <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                    <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">
                                        Landing Page</p>
                                    <p class="font-family-body text-xs text-text-inverse relative z-10">8 template</p>
                                </div>
                            </a>
                            <a href="#"
                                class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                                <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                    style="background-image: url('https://picsum.photos/200?random=3'); background-size: cover; background-position: center;">
                                    <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                    <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">
                                        Dashboard</p>
                                    <p class="font-family-body text-xs text-text-inverse relative z-10">6 template</p>
                                </div>
                            </a>
                            <a href="#"
                                class="snap-start shrink-0 w-[calc(50%-0.375rem)] flex items-center gap-3 rounded-xl border border-border-subtle hover:border-border-hover hover:shadow-sm transition-all group">
                                <div class="min-w-0 w-full h-20.5 flex flex-col justify-between relative overflow-hidden rounded-lg p-3"
                                    style="background-image: url('https://picsum.photos/200?random=4'); background-size: cover; background-position: center;">
                                    <div class="absolute inset-0 bg-black/60 rounded-lg"></div>
                                    <p class="font-family-body text-sm font-medium text-text-inverse relative z-10">
                                        E-Commerce</p>
                                    <p class="font-family-body text-xs text-text-inverse relative z-10">10 template</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex justify-center items-center gap-2.5 bg-background-brand rounded-xl px-6 py-4 cursor-pointer shadow-md">
                <button class="text-interactive-destructive-text-default font-family-label text-lg cursor-pointer">
                    Lihat Katalog
                </button>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path fill="#fff"
                        d="M2 20.5v-8h8v8zm2-2h4v-4H4zM5.5 10L11 1l5.5 9zm3.55-2h3.9L11 4.85zm12.525 14.95l-2.65-2.65q-.525.35-1.137.525T16.5 21q-1.875 0-3.187-1.312T12 16.5t1.313-3.187T16.5 12t3.188 1.313T21 16.5q0 .65-.175 1.263t-.5 1.137l2.65 2.65zm-3.3-4.675Q19 17.55 19 16.5t-.725-1.775T16.5 14t-1.775.725T14 16.5t.725 1.775T16.5 19t1.775-.725M11 8" />
                </svg>
                <span>
            </div>
        </div>
        <div id="feature"
            class="flex justify-between px-6 py-4 rounded-xl bg-surface-default mt-17.5 gap-10 shadow-md">
            {{--  --}}
            <div class="flex gap-2.5 justify-center items-center min-w-60">
                <div class="p-3 bg-background-error rounded-full">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="36.67" height="36.67" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="#dc2626"
                                d="m8.8 10.95l2.15-2.175l-1.4-1.425l-1.1 1.1l-1.4-1.4l1.075-1.1L7 4.825L4.825 7zm8.2 8.225L19.175 17l-1.125-1.125l-1.1 1.075l-1.4-1.4l1.075-1.1l-1.425-1.4l-2.15 2.15zm-.775-12.75l1.4 1.4l1.4-1.4L17.6 5zM7.25 21H3v-4.25l4.375-4.375L2 7l5-5l5.4 5.4l3.775-3.8q.3-.3.675-.45t.775-.15t.775.15t.675.45L20.4 4.95q.3.3.45.675T21 6.4t-.15.763t-.45.662l-3.775 3.8L22 17l-5 5l-5.375-5.375z" />
                        </svg>
                    </span>
                </div>
                <div>
                    <h2 class="text-text-primary font-family-body text-lg">Design Modern</h2>
                    <p class="text-text-secondary font-family-body text-sm">Tampilan profesional dan elegan</p>
                </div>
            </div>
            {{--  --}}
            <div class="flex gap-2.5 justify-center items-center min-w-60">
                <div class="p-3 bg-background-error rounded-full">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="36.67" height="36.67" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="#dc2626"
                                d="M11 20H3q-.425 0-.712-.288T2 19t.288-.712T3 18h8q.425 0 .713.288T12 19t-.288.713T11 20m-6-3q-.825 0-1.412-.587T3 15V6q0-.825.588-1.412T5 4h14q.825 0 1.413.588T21 6h-5.5q-1.45 0-2.475 1.025T12 9.5V16q0 .425-.288.713T11 17zm10.5 3q-.625 0-1.062-.437T14 18.5v-9q0-.625.438-1.062T15.5 8h5q.625 0 1.063.438T22 9.5v9q0 .625-.437 1.063T20.5 20zm2.5-7.5q.325 0 .538-.225t.212-.525q0-.325-.213-.537T18 11q-.3 0-.525.213t-.225.537q0 .3.225.525T18 12.5" />
                        </svg>
                    </span>
                </div>
                <div>
                    <h2 class="text-text-primary font-family-body text-lg">Responsif</h2>
                    <p class="text-text-secondary font-family-body text-sm">Optimal di semua perangkat</p>
                </div>
            </div>
            {{--  --}}
            <div class="flex gap-2.5 justify-center items-center min-w-60">
                <div class="p-3 bg-background-error rounded-full">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="36.67" height="36.67" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="#dc2626"
                                d="M10.475 22q-.7 0-1.312-.3t-1.038-.85l-5.45-6.925l.475-.5q.5-.525 1.2-.625t1.3.275L7.5 14.2V6q0-.425.288-.712T8.5 5t.725.288t.3.712v5H17q1.25 0 2.125.875T20 14v4q0 1.65-1.175 2.825T16 22zm-6.3-13.5q-.325-.55-.5-1.187T3.5 6q0-2.075 1.463-3.537T8.5 1t3.538 1.463T13.5 6q0 .675-.175 1.313t-.5 1.187l-1.725-1q.2-.35.3-.712T11.5 6q0-1.25-.875-2.125T8.5 3t-2.125.875T5.5 6q0 .425.1.788t.3.712z" />
                        </svg>
                    </span>
                </div>
                <div>
                    <h2 class="text-text-primary font-family-body text-lg">Mudah Digunakan</h2>
                    <p class="text-text-secondary font-family-body text-sm">Struktur rapi dan mudah kostumisasi</p>
                </div>
            </div>
            {{--  --}}
            <div class="flex gap-2.5 justify-center items-center min-w-60">
                <div class="p-3 bg-background-error rounded-full">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="36.67" height="36.67" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="#dc2626"
                                d="M12 22q-3.475-.875-5.738-3.988T4 11.1V5l8-3l8 3v6.1q0 3.8-2.262 6.913T12 22m0-2.1q2.425-.75 4.05-2.963T17.95 12H12V4.125l-6 2.25v5.175q0 .175.05.45H12z" />
                        </svg>
                    </span>
                </div>
                <div>
                    <h2 class="text-text-primary font-family-body text-lg">Lisensi Jelas</h2>
                    <p class="text-text-secondary font-family-body text-sm">Tanpa biaya tersembunyi. Syarat mudah
                        dipahami.</p>
                </div>
            </div>
        </div>
    </div>
</div>
