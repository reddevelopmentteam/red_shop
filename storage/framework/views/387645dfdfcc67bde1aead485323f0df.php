<div class="lg:col-span-3 bg-surface-default border border-border-default px-6 py-4 rounded-xl">
    <h2 class="font-family-display text-2xl font-bold mb-6">Kirim Pesan</h2>
    <p class="text-text-secondary mb-6 text-[16px]">Isi form di bawah ini dan tim kami akan segera merespon Anda.</p>

    <form wire:submit.prevent="kirimPesan" class="space-y-4">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <label class="block text-[16px] font-medium text-text-primary mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" wire:model="nama" required
                       class="w-full px-3 py-2.5 bg-background-default border border-border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-brand-primary placeholder:text-text-placeholder"
                       placeholder="Contoh: Erling Haaland">
            </div>
            <div>
                <label class="block text-[16px] font-medium text-text-primary mb-1">Email <span class="text-red-500">*</span></label>
                <input type="email" wire:model="email" required
                       class="w-full px-3 py-2.5 bg-background-default border border-border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-brand-primary placeholder:text-text-placeholder"
                       placeholder="Contoh: haaland@Gmail.com">
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <label class="block text-[16px] font-medium text-text-primary mb-1">Jenis Pertanyaan <span class="text-red-500">*</span></label>
                <select wire:model="jenisPertanyaan" required class="w-full px-3 py-2.5 bg-background-default border border-border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-brand-primary placeholder:text-text-placeholder">
                    <option value="">-- Pilih Jenis Pertanyaan --</option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $questionTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <option value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
            </div>
            <div>
                <label class="block text-[16px] font-medium text-text-primary mb-1">Nama Template (Opsional)</label>
                <input type="text" wire:model="namaTemplate"
                       class="w-full px-3 py-2.5 bg-background-default border border-border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-brand-primary placeholder:text-text-placeholder"
                       placeholder="Contoh: SaaS Landing Page">
            </div>
        </div>

        <div>
            <label class="block text-[16px] font-medium text-text-primary mb-1">Pesan <span class="text-red-500">*</span></label>
            <textarea wire:model="pesan" rows="4" required
                      class="w-full px-3 py-2.5 bg-background-default border border-border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-brand-primary placeholder:text-text-placeholder"
                      placeholder="Tulis pesan Anda di sini..."></textarea>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg flex items-center gap-2">
                <iconify-icon icon="mdi:check-circle" width="20" height="20"></iconify-icon>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div>
            <button type="submit"
                    class="px-8 py-3 w-full rounded-lg bg-brand-primary text-white font-semibold hover:bg-brand-secondary transition-colors inline-flex justify-center items-center gap-2">
                Kirim Pesan
                <iconify-icon icon="material-symbols:send-outline" width="18" height="18"></iconify-icon>
            </button>
        </div>
    </form>
</div><?php /**PATH /var/www/html/dev/red_shop/storage/framework/views/livewire/views/1b8aa976.blade.php ENDPATH**/ ?>