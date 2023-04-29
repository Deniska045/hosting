<?php $__env->startSection('title', 'Регистрация'); ?>

<?php $__env->startSection('content'); ?>

    <h3 style="text-align: center">Регистрация</h3>
    <div class="login-page">
        <div class="form">
            <form class="register-form">
                <?php echo method_field('post'); ?>
                <?php echo csrf_field(); ?>
                <input type="text" name="name" placeholder="Имя">
                <input type="text" name="surname" placeholder="Фамилия">
                <input type="text" name="patronymic" placeholder="Отчество">
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="password" placeholder="Пароль" />
                <input type="password" name="password_repeat" placeholder="Повторите пароль" />
                <button>Зарегистрироваться</button>
                <p class="message">Уже есть аккаунт? <a href="<?php echo e(route('login')); ?>">Войти</a><br><a
                        href="<?php echo e(route('home')); ?>">Главная</a></p>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>

        document.querySelector('.register-form').onsubmit = function (e) {
            e.preventDefault()

            $('form input').removeClass('is-invalid').parent().find('span').text('')

            $.post('/register', $('.register-form').serializeArray(), data => {
                location.href = '/'
            }).fail(err => {
                const {errors} = err.responseJSON
                for (const key in errors) {
                    $(`input[name="${key}"]`).addClass('is-invalid').parent().find('span').text(errors[key][0])
                }
            })

        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\AvtoDiplom\resources\views/pages/register.blade.php ENDPATH**/ ?>