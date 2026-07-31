<div>
    <livewire:home.hero />
    <livewire:home.carousel />
    <livewire:home.category />
    <livewire:home.templates title="Template" highlight="Terlaris" :templates="$bestSellingTemplates" />
    <livewire:home.templates title="Template" highlight="Terbaru" :templates="$newestTemplates" />
    <livewire:home.faq />
</div>
