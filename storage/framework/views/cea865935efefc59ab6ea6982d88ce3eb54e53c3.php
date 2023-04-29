<?php $__env->startSection('title', 'Создание товара'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="mt-2">Создание товара</h2>

<form method="post" action="<?php echo e(route('admin.items.create')); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label class="form-label">Название товара</label>
        <input required type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Год производства товара</label>
        <input required type="date" name="model_year" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Страна производства товара</label>
        <input required type="text" name="model_country" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Подробное описаание товара</label>
        <input required type="text" name="detail_information" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Модель товара</label>
        <input required type="text" name="model_type" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Цена товара</label>
        <input required type="number" name="price" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Количество товара</label>
        <input required type="number" name="quantity" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Категория товара</label>
        <select required name="category_id" class="form-select" aria-label="Default select example">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-3">
        <h5 class="mb-2">Изображение товара</h5>
        <input required name="image" type="file" accept="image/jpeg,image/png,image/jpg,image/bpm" class="form-control" id="inputGroupFile02">
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\AvtoDiplom\resources\views/admin/items/create.blade.php ENDPATH**/ ?>