<?php $__env->startSection('title', 'Доставка'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo e(asset('/img/delivery3.png')); ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Доставка почтой России</h5>
                <p class="card-text">Доставка Почтой России по всем регионам.</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo e(asset('/img/samo.png')); ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Самовывоз Из Магазина</h5>
                <p class="card-text">Вы всегда можете забрать ваш заказ из нашего магазина.Варгаши ул.Гайдара д.3</p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\AvtoDiplom\resources\views/pages/delivery.blade.php ENDPATH**/ ?>