<div class="flex gap-4 w-full items-start">
    {{-- Thumbnails --}}
    <div class="max-h-132 overflow-y-auto mt-1">
        <div class="flex flex-col gap-3 shrink-0 items-start">
            @foreach ($images as $index => $image)
                <button wire:click="selectImage('{{ $image }}')"
                    class="rounded-lg overflow-hidden border-4 transition-all {{ $selectedImage === $image ? 'border-brand-primary' : 'border-border-subtle' }}">
                    <img src="{{ $image }}" alt="{{ $templateName }} thumbnail {{ $index + 1 }}"
                        class="w-50 object-cover">
                </button>
            @endforeach
        </div>
    </div>

    {{-- Main Image --}}
    <div class="flex-1 rounded-xl overflow-hidden relative" x-data="{ lightboxOpen: false }">
        @if ($selectedImage)
            <img src="{{ $selectedImage }}" alt="{{ $templateName }}" class="w-full h-auto object-cover rounded-xl border-4 border-border-subtle">

            {{-- Fullscreen button --}}
            <button @click="lightboxOpen = true"
                class="absolute bottom-4 right-4 flex items-center justify-center w-10 h-10 rounded-full bg-background-error/80 hover:bg-background-error transition-colors cursor-pointer">
                <iconify-icon icon="material-symbols:zoom-out-map-rounded" width="20" height="20" class="text-text-error"></iconify-icon>
            </button>

            {{-- Lightbox modal --}}
            <div x-show="lightboxOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                @click="lightboxOpen = false" @keydown.escape.window="lightboxOpen = false"
                x-cloak
                class="fixed inset-0 z-999 flex items-center justify-center bg-black/80 p-8">
                <button @click.stop="lightboxOpen = false"
                    class="absolute top-6 right-6 flex items-center justify-center w-10 h-10 rounded-full bg-white/20 hover:bg-white/40 transition-colors cursor-pointer">
                    <iconify-icon icon="material-symbols:close" width="24" height="24" class="text-white"></iconify-icon>
                </button>
                <img @click.stop src="{{ $selectedImage }}" alt="{{ $templateName }}"
                    class="max-w-full max-h-full object-contain rounded-lg">
            </div>
        @else
            <div class="w-full h-80 bg-background-subtle rounded-xl flex items-center justify-center">
                <span class="font-family-body text-sm text-text-tertiary">Tidak ada gambar</span>
            </div>
        @endif
    </div>
</div>
