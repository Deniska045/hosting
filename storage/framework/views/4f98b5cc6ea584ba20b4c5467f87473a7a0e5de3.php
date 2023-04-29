<?php $__env->startSection('title', 'Корзина'); ?>

<?php $__env->startSection('content'); ?>
    
    
    
    
    
    
    
    
    
    

    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    

    
    
    
    
    
    <div class="cart_title" style="text-align: center;">Корзина<small></small></div>

    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="cart_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cart_container">
                            <div class="cart_items">
                                <ul class="cart_list">
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="<?php echo e($item['item']['image']); ?>"
                                                                          class="card-img-top"
                                                                          alt="<?php echo e($item['item']['image']); ?>"></div>
                                        <div
                                            class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Имя</div>
                                                <div class="cart_item_text"><?php echo e($item['item']['name']); ?></div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Колличество</div>
                                                <div class="cart_item_text"><?php echo e($item['count']); ?></div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Цена</div>
                                                <div
                                                    class="cart_item_text"><?php echo e($item['item']['price']); ?>Р                                              </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        Корзина пуста

    <?php endif; ?>
    <div class="order_total">
        <div class="order_total_content text-md-right">
            <div class="order_total_title">Финальная цена:</div>
            <div class="order_total_amount"><?php echo e($finalPrice); ?> Р</div>
        </div>
    </div>
    <form class="order">
        <?php echo method_field('post'); ?>
        <?php echo csrf_field(); ?>
        <div class="passwordcart">

            <label for="exampleInputPassword1" class="form-label">Пароль для подтверждения
                заказа</label>
            <input required type="password" name="password" class="form-control"
                   id="exampleInputPassword1">
        </div>
        <button type="submit" class="button cart_button_checkout">Оформить</button>
        <a href="<?php echo e(route('list')); ?>" class="button cart_button_clear">Продолжить
            просмотр товаров</a>
    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('.editCart').click(function () {
            const itemId = $(this).data('id')
            const count = Number($(this).data('count'))
            addToCart(itemId, count, true)
        })

        document.querySelector('.order').onsubmit = function (e) {
            e.preventDefault();

            $.post('/order/create', $('.order').serializeArray(), data => {
                if (data.error) return alert(data.error)
                location.href = '/orders'
            }).fail(err => alert('неизвестная ошибка'))
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\AvtoDiplom\resources\views/pages/cart.blade.php ENDPATH**/ ?>