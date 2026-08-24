<div>
    <livewire:home.hero />
    <livewire:home.carousel />
    <livewire:home.category />
    <livewire:home.templates title="Template" highlight="Terlaris" :templates="$this->bestSellingTemplates" />
    <livewire:home.templates title="Template" highlight="Terbaru" :templates="$this->newestTemplates" />
    <livewire:home.faq />
</div>
