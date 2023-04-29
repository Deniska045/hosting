<?php $__env->startSection('title', 'Заказы'); ?>

<?php $__env->startSection('content'); ?>
    <h2 style="text-align: center">Ваши заказы</h2>
    <div class="ddd">
        <div class="dasd">
            <div class="d-flex">
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="cards">
                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-2" style="width: 18rem;">
                                <img src="<?php echo e($orderItem['item']['image']); ?>" class="card-img-top"
                                     alt="<?php echo e($orderItem['item']['name']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($orderItem['item']['name']); ?></h5>
                                    <p class="card-text"><?php echo e($orderItem['price'] * $orderItem['count']); ?> <span
                                            class="rub">Р</span></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div style="margin-left: 25%;">Статус: <?php echo e($order->status); ?></div>
                        <?php if($order->status === 'Новый'): ?>
                            <a href="<?php echo e(route('deleteOrder', $order)); ?>" class="danger">Удалить</a>
                        <?php elseif($order->status === 'Отменён'): ?>
                            <p>Причина отмены заказа: <?php echo e($order->description); ?></p>
                        <?php endif; ?>
                        <?php if($order->toArray(null)["pay"]?? '' && $order->status === "Подтвержден" ): ?>

                            <a style="color: #1c7430" href="<?php echo e($order->toArray(null)["pay"]); ?>">Оплатить</a>

                        <?php endif; ?>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="margin-left: 10%;" role="alert">
                        Вы еще не сделали ни одного заказа
                    </div

                <?php endif; ?>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\AvtoDiplom\resources\views/pages/orders.blade.php ENDPATH**/ ?>