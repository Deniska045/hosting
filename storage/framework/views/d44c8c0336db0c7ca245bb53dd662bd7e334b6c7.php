<?php $__env->startSection('title', 'Каталог'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="d-flex flex-wrap ml-5">
                    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="card " style="width: 18rem;">
                            <a href="<?php echo e(route('show', $item)); ?>"><img src="<?php echo e($item->image); ?>" class="card-img-top"
                                                                    alt="<?php echo e($item->name); ?>"></a>
                            <div class="card-body">
                                <h5 class="card-title">Название товара: <?php echo e($item->name); ?></h5>
                                <p class="card-text">Цена товара: <?php echo e($item->price); ?><span class="rub">Р</span></p>
                                <p class="card-text">Колличетсво товара: <?php echo e($item->quantity); ?> шт.</p>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if($item->isAvailable()): ?>
                                        <button data-id="<?php echo e($item->id); ?>" class="btn btn-primary addToCart">В корзину</button>
                                    <?php else: ?>
                                        Нет в наличии
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div role="alert">
                            Товары не найдены
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\teeesttdiplom\resources\views/pages/list.blade.php ENDPATH**/ ?>