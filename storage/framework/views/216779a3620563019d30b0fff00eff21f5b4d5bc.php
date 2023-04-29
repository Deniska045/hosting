<?php $__env->startSection('title', 'Авторизация'); ?>

<?php $__env->startSection('content'); ?>
    <h2 style="text-align: center">Авторизация</h2>
    <div class="login-page">
        <div class="form">
            <form class="login">
                <?php echo method_field('post'); ?>
                <?php echo csrf_field(); ?>
                <input placeholder="Логин" required type="text" name="login">
                <span class="text-danger"></span>
                <input placeholder="Пароль" required type="password" name="password">
                <span class="text-danger"></span>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.querySelector('.login').onsubmit = function (e) {
            e.preventDefault();
            $('form input').removeClass('is-invalid').parent().find('span').text('')
            $.post('/login', $('.login').serializeArray(), data => {
                location.href = '/'
            }).fail(err => {
                const {errors} = err.responseJSON;
                for (let key in errors) {
                    $(`input[name="${key}"]`).addClass('is-invalid').parent().find('span').text(errors[key][0])
                }
            })
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\AvtoDiplom\resources\views/pages/login.blade.php ENDPATH**/ ?>