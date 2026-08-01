<section class="px-44 py-6">
    <div class="grid grid-cols-2 gap-4 items-start">
        <div>
            <h1 class="font-family-display text-[96px] font-bold text-text-primary leading-20">Masih
                <span class="text-text-brand">Ragu?</span>
            </h1>
            <p class="mt-4 font-family-body text-lg text-text-secondary max-w-md">Berikut beberapa pertanyaan
                yang sering ditanyakan sebelum membeli template.</p>
            <img src="{{ asset('images/home/footer_img.svg') }}" alt="FAQ illustration" class="mt-8 max-w-105.25">
        </div>

        <div x-data="{ open: null }" class="flex flex-col gap-4">
            @foreach ($faqs as $index => $faq)
                <div class="bg-surface-default rounded-xl border border-border-default shadow-sm overflow-hidden">
                    <button type="button" @click="open = (open === {{ $index }}) ? null : {{ $index }}"
                        class="w-full flex items-center justify-between gap-4 px-6 py-4 text-left">
                        <span
                            class="font-family-display font-bold text-lg text-text-primary">{{ $faq['question'] }}</span>
                        <div class="bg-transparent p-1 rounded-full border-4 border-brand-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"
                                class="shrink-0 transition-transform duration-200"
                                :class="open === {{ $index }} && 'rotate-180'">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path fill="#dc2626" d="m12 15.4l-6-6L7.4 8l4.6 4.6L16.6 8L18 9.4z" />
                            </svg>
                        </div>
                    </button>
                    <div x-show="open === {{ $index }}" x-collapse>
                        <p class="px-6 pb-4 font-family-body text-base text-text-secondary">{{ $faq['answer'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
