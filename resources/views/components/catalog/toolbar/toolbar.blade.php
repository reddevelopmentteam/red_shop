<div class="flex py-4 justify-between items-center">
    <div class="flex gap-6 items-center">
        <livewire:catalog.toolbar.filter :key="'filter'" :page="$page" :kategori="$kategori" :counts="$counts" />
        <livewire:catalog.toolbar.filter-chip :key="'filter-chip'"
            :kategori="$kategori"
            :appliedTypes="$appliedTypes"
            :appliedStatuses="$appliedStatuses"
            :appliedPrice="$appliedPrice"
            :appliedTechs="$appliedTechs"
            :appliedLicences="$appliedLicences" />
    </div>
    <div class="flex gap-6 items-center">
        <livewire:catalog.toolbar.total-template :key="'total-template'" :total="$total" />
        <livewire:catalog.toolbar.filter-by :key="'filter-by'" :sort="$sort" />
    </div>
</div>
