<div class="flex justify-between px-8 py-2.5 shadow-md bg-background-default items-center mt-2.5 rounded-xl gap-20">
    <div id="left">
        <img src={{ asset('images/logo/brand.png') }} alt="brand">
    </div>
    <div id="middle">
        <menu class="flex gap-4">
            <li><a href="#" class="hover:text-text-link font-family-body text-lg text-text-secondary">Katalog</a>
            </li>
            <li class="relative" x-data="{ open: false }" @click.away="open = false">
                <a href="#" @click.prevent="open = !open"
                    :class="open ? 'text-text-brand' : ''"
                    class="flex items-center gap-1 hover:text-text-brand font-family-body text-lg text-text-secondary">
                    Kategori
                    <span class="transition-transform duration-200" :class="open && 'rotate-180'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path fill="currentColor" d="m12 15.4l-6-6L7.4 8l4.6 4.6L16.6 8L18 9.4z" />
                        </svg>
                    </span>
                </a>

                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-1" @click="open = false"
                    class="absolute left-10 -translate-x-1/2 top-full mt-8 w-64 bg-blend-overlay rounded-xl shadow-lg z-50 overflow-hidden">

                    <div class="px-4 pt-4 pb-3">
                        <h3 class="font-family-display text-sm text-text-secondary">Unggulan</h3>
                    </div>

                    <div class="flex flex-col gap-1 px-4">
                        <a href="#"
                            class="flex items-center justify-between transition-colors group">
                            <span
                                class="font-family-body text-text-primary group-hover:text-text-link">Portfolio</span>
                            <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                            </svg>
                        </a>
                        <a href="#"
                            class="flex items-center justify-between transition-colors group">
                            <span class="font-family-body text-text-primary group-hover:text-text-link">Landing
                                Page</span>
                            <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                            </svg>
                        </a>
                        <a href="#"
                            class="flex items-center justify-between transition-colors group">
                            <span
                                class="font-family-body text-text-primary group-hover:text-text-link">Dashboard</span>
                            <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                            </svg>
                        </a>
                        <a href="#"
                            class="flex items-center justify-between transition-colors group">
                            <span
                                class="font-family-body text-text-primary group-hover:text-text-link">E-Commerce</span>
                            <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                            </svg>
                        </a>
                    </div>

                    <div class="mt-3 mx-5 border-t border-border-subtle"></div>

                    <div class="px-5 py-3 flex justify-end">
                        <a href="#"
                            class="flex items-center gap-2 font-family-body font-medium text-text-brand hover:text-interactive-primary-background-hover transition-colors">
                            Lihat Semua
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </li>
            <li><a href="#" class="hover:text-text-link font-family-body text-lg text-text-secondary">License</a>
            </li>
            <li><a href="#" class="hover:text-text-link font-family-body text-lg text-text-secondary">Support</a>
            </li>
        </menu>
    </div>
    <div id="right" x-data="{ open: false }" @click.away="open = false"
        class="relative">
        <div class="flex items-center px-4 py-2.5 pr-15 border border-border-subtle rounded-lg focus-within:border-brand-primary transition-colors">
            <input type="search" id="searchAll"
                @focus="open = true" @blur="open = false"
                placeholder="Cari landing page, portofolio"
                class="border-0 placeholder:text-text-placeholder focus:outline-0 focus:ring-0 w-full">
            <span class="absolute right-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path fill="#dc2626"
                        d="m19.6 21l-6.3-6.3q-.75.6-1.725.95T9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l6.3 6.3zM9.5 14q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14" />
                </svg>
            </span>
        </div>

        {{-- Suggestions dropdown --}}
        <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-1"
            class="absolute left-0 top-full mt-6 w-full bg-surface-default border border-border-subtle rounded-xl shadow-lg z-50 overflow-hidden">

            <div class="px-4 pt-4 pb-3">
                <h3 class="font-family-display text-sm text-text-secondary">Sugesti</h3>
            </div>

            <div class="flex flex-col gap-1 px-4 pb-3">
                <a href="#"
                    class="flex items-center justify-between transition-colors group">
                    <span class="font-family-body text-text-primary group-hover:text-text-link">Portfolio</span>
                    <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                    </svg>
                </a>
                <a href="#"
                    class="flex items-center justify-between transition-colors group">
                    <span class="font-family-body text-text-primary group-hover:text-text-link">Landing Page</span>
                    <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                    </svg>
                </a>
                <a href="#"
                    class="flex items-center justify-between transition-colors group">
                    <span class="font-family-body text-text-primary group-hover:text-text-link">Dashboard</span>
                    <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                    </svg>
                </a>
                <a href="#"
                    class="flex items-center justify-between transition-colors group">
                    <span class="font-family-body text-text-primary group-hover:text-text-link">E-Commerce</span>
                    <svg class="w-4 h-4 text-text-tertiary group-hover:text-text-brand"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7v10" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
