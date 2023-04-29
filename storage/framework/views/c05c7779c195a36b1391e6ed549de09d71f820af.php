<?php $__env->startSection('title', 'Создание категории'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="mt-2">Создание категории</h2>

<form method="post" action="<?php echo e(route('admin.categories.create')); ?>">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label class="form-label">Название категории</label>
        <input type="text" name="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\AvtoDiplom\resources\views/admin/categories/create.blade.php ENDPATH**/ ?>