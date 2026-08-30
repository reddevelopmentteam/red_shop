<div >
    <livewire:product.header.breadcrumbs
        :key="'breadcrumbs'"
        :category="$template['category']"
        :name="$template['name']" />

    <div class="px-16 pb-12">
        <div class="flex gap-8">
            <livewire:product.preview
                :key="'preview'"
                :images="$template['images']"
                :selectedImage="$selectedImage"
                :templateName="$template['name']" />

            <livewire:product.info
                :key="'info'"
                :template="$template" />
        </div>

        <hr class="my-10 border-border-default">

        <div class="flex gap-12">
            <livewire:product.about
                :key="'about'"
                :about="$template['about']"
                :features="$template['features']"
                :techStacks="$template['techStacks']" />

            <livewire:product.info-table
                :key="'info-table'"
                :template="$template" />
        </div>
    </div>
</div>
