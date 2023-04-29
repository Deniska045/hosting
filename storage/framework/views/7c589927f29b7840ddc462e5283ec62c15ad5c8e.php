<?php $__env->startSection('title', 'Категории'); ?>

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('admin.categories.createPage')); ?>" class="btn btn-success mb-2 mt-2" style="margin-left: 40%">Создать категорию</a>

    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card ">
            <div class="card-body">
                <?php echo e($category->name); ?>

                <a href="<?php echo e(route('admin.categories.delete', $category)); ?>" class="btn btn-danger ml-4">Удалить</a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="alert alert-primary" role="alert">
            Категорий нет
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\AvtoDiplom\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>