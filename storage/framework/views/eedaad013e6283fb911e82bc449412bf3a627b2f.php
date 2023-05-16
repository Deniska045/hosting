<?php $__env->startSection('title', 'Товар'); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="card">
            <div class="card__title">
                <div class="icon">
                    <a href="#"><i class="fa fa-arrow-left"></i></a>
                </div>
            </div>
            <div class="card__body">
                <div class="half">
                    <div class="featured_text">
                        <h1><?php echo e($item->name); ?></h1>
                        <h3 class="price">Цена: <?php echo e($item->price); ?> р.</h3>
                    </div>
                    <div class="image">
                        <img src="<?php echo e($item->image); ?>" alt="">
                    </div>
                </div>
                <div class="half">
                    <div class="description">
                        <h3>Описания товара: </h3>
                        <p> <?php echo e($item->detail_information); ?></p>

                    </div>
                    <div class="reviews">
                        <h3>Количество товара: (<?php echo e($item->quantity); ?>) шт.</h3>
                    </div>
                </div>
            </div>
            <div class="card__footer">
                <div class="recommend">
                    <p>Рекомендация от</p>
                    <h2>Магазина Авто+</h2>
                </div>
                <div class="action">
                    <a href="<?php echo e(route('list')); ?>" class="btn btn-primary">Назад</a>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if($item->isAvailable()): ?>
                            <button data-id="<?php echo e($item->id); ?>" class="btn btn-primary addToCart">В корзину</button>
                        <?php else: ?>
                            <p style="color: red;">Нет в наличии</p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\teeesttdiplom\resources\views/pages/show.blade.php ENDPATH**/ ?>