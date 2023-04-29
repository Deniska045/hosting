<?php $__env->startSection('title', 'Товары'); ?>

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('admin.items.createPage')); ?>" class="btn btn-success b-2 mt-2" style="margin-left: 40%"">Создать товар</a>

    <div class="d-flex flex-wrap">
        <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card me-2" style="width: 18rem;">
                <img src="<?php echo e($item->image); ?>" class="card-img-top" alt="<?php echo e($item->name); ?>">
                <div class="card-body ">
                    <h5 class="card-title"><?php echo e($item->name); ?></h5>
                    <p class="card-text"><?php echo e($item->quantity); ?> шт.</p>
                    <a href="<?php echo e(route('admin.items.updatePage', $item)); ?>" class="btn btn-primary">Редактировать</a>
                    <a href="<?php echo e(route('admin.items.delete', $item)); ?>" class="btn btn-danger">Удалить</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="alert alert-primary" role="alert">
                Товаров нет
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\AvtoDiplom\resources\views/admin/items/index.blade.php ENDPATH**/ ?>