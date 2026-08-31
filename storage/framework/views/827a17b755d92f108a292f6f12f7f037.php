<section class="px-16 py-12">
    <div class="flex items-center justify-between mb-8">
        <h1 class="font-family-display text-3xl font-bold text-text-primary"><?php echo e($title); ?>

            <span class="text-text-brand"><?php echo e($highlight); ?></span>
        </h1>
        <a href="#"
            class="flex items-center gap-1 font-family-body text-sm font-medium text-text-brand hover:text-interactive-primary-background-hover transition-colors">
            Lihat Semua
            <iconify-icon icon="material-symbols:chevron-right" width="16" height="16"></iconify-icon>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php
                $statusConfig = match ($template['status']) {
                    'tersedia' => ['label' => 'Tersedia', 'class' => 'bg-background-success text-text-success'],
                    'akan_datang' => ['label' => 'Akan Datang', 'class' => 'bg-background-warning text-text-warning'],
                    'tidak_tersedia' => ['label' => 'Tidak Tersedia', 'class' => 'bg-background-error text-text-error'],
                    default => ['label' => $template['status'], 'class' => 'bg-background-subtle text-text-secondary'],
                };
            ?>
            <a href="<?php echo e(route('product', Str::slug($template['name']))); ?>"
                wire:navigate
                class="group bg-surface-default rounded-xl shadow-sm transition-all hover:shadow-md overflow-hidden">
                <div class="relative h-62.5 overflow-hidden">
                    <img src="<?php echo e($template['thumbnail']); ?>" alt="<?php echo e($template['name']); ?>"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    <span
                        class="absolute bottom-3 right-3 rounded-full px-3 py-1 font-family-body text-xs font-medium <?php echo e($statusConfig['class']); ?>">
                        <?php echo e($statusConfig['label']); ?>

                    </span>
                </div>
                <div class="p-4">
                    <h3 class="font-family-body text-lg text-text-primary">
                        <?php echo e($template['name']); ?></h3>
                    <span
                        class="inline-block mt-2 rounded-full bg-background-info px-3 py-0.5 font-family-body text-xs font-medium text-text-secondary">
                        <?php echo e($template['category']); ?>

                    </span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($template['status'] === 'tersedia'): ?>
                        <div class="mt-10 flex items-center gap-2">
                            <span
                                class="font-family-display text-lg font-bold <?php echo e($template['originalPrice'] ? 'text-text-brand' : 'text-text-primary'); ?>">
                                <?php echo e($template['price']); ?>

                            </span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($template['originalPrice']): ?>
                                <span class="font-family-body text-sm text-text-tertiary line-through">
                                    <?php echo e($template['originalPrice']); ?>

                                </span>
                                <span
                                    class="discount-badge bg-background-error px-2 pl-5 py-1 font-family-body text-xs font-medium text-text-error">
                                    <?php echo e($template['discount']); ?>%
                                </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section><?php /**PATH /var/www/html/dev/red_shop/storage/framework/views/livewire/views/b062d803.blade.php ENDPATH**/ ?>