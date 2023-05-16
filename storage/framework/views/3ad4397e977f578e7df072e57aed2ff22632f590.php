<?php $__env->startSection('title', 'Главная'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="new">
            <marquee direction="right">
                <h2>5 новинок магазина</h2>
            </marquee>
        </div>
        <div class="row mt-5 ml-5">
            <div class="col">
                <div class="d-flex flex-wrap">
                    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="card" style="width: 18rem;">
                            <a href="<?php echo e(route('show', $item)); ?>">
                                <img src="<?php echo e($item->image); ?>" class="card-img-top"
                                     alt="<?php echo e($item->name); ?>">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">Название товара: <?php echo e($item->name); ?></h5>
                                <p class="card-text">Цена товара: <?php echo e($item->price); ?><span class="rub">Р</span></p>
                                <p class="card-text">Колличетсво товара: <?php echo e($item->quantity); ?> шт.</p>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if($item->isAvailable()): ?>
                                        <button data-id="<?php echo e($item->id); ?>" class="btn btn-primary addToCart">В корзину</button>
                                    <?php else: ?>
                                        <p style="color: red">Нет в наличии</p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\teeesttdiplom\resources\views/pages/index.blade.php ENDPATH**/ ?>