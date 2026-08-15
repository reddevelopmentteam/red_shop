<div>
    <livewire:catalog.header :key="'header'" :kategori="$kategori" />
    <main class="px-16">
        <livewire:catalog.toolbar :key="'toolbar'"
            :page="$currentPage"
            :kategori="$kategori"
            :counts="$this->getFilterCounts()"
            :total="$this->getTotalTemplates()"
            :appliedTypes="$appliedTypes"
            :appliedStatuses="$appliedStatuses"
            :appliedPrice="$appliedPrice"
            :appliedTechs="$appliedTechs"
            :appliedLicences="$appliedLicences"
            :sort="$sort" />
        @if ($this->showFeatured())
            <livewire:catalog.main.template-featured :key="'template-featured'" />
        @endif
        <livewire:catalog.main.template-all :key="'template-all'" :templates="$this->getPageTemplates()" />
        <livewire:catalog.main.pagination :key="'pagination'" :page="$currentPage" :totalPages="$this->getTotalPages()" />
    </main>
</div>
