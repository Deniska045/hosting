<?php $__env->startSection('title', 'Все заказы'); ?>

<?php $__env->startSection('content'); ?>

<form method="get">
    <?php echo method_field('post'); ?>
    <?php echo csrf_field(); ?>
    <select class="form-select mb-2" name="status" aria-label="Default select example">
        <option value="">Все</option>
        <?php $__currentLoopData = [
            'Новый' => 'Новый',
            'Подтверждён' => 'Подтверждён',
            'Отменён' => 'Отменён',
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php if($key === $status): ?> selected <?php endif; ?> value="<?php echo e($key); ?>"><?php echo e($name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button type="submit" class="btn btn-primary w-100">Поиск</button>
</form>

<div class="d-flex flex-wrap">

    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="p-4 card">
            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-2" style="width: 18rem;">
                    <img src="<?php echo e($orderItem['item']['image']); ?>" class="card-img-top" alt="<?php echo e($orderItem['item']['name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($orderItem['item']['name']); ?></h5>
                        <p class="card-text"><?php echo e($orderItem['price'] * $orderItem['count']); ?> р.</p>
                        <p class="card-text">Количество товара: <?php echo e($orderItem['count']); ?> </p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="mb-2">Статус: <?php echo e($order->status); ?></div>
            <div class="mb-2">Дата: <?php echo e($order->created_at); ?></div>
            <div class="mb-2">Всего товаров: <?php echo e(collect($order->items)->sum('count')); ?></div>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->id === $order->user_id): ?>
                        <p>ФИО покупателя: <?php echo e($user->surname); ?> <?php echo e($user->name); ?> <?php echo e($user->patronymic); ?></p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($order->status === 'Новый'): ?>
                    <a href="<?php echo e(route('admin.orders.confirm', $order)); ?>" class="btn btn-success mb-4">Подтвердить заказ</a>

                    <h3>ИЛИ</h3>

                    <form action="<?php echo e(route('admin.orders.cancel', $order)); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Причина отмены заказа</label>
                            <input required type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Отменить</button>
                    </form>
            <?php endif; ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div>
            Еще нет ни одного заказа
        </div
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\AvtoDiplom\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>