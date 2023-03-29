@extends('app')

@section('title', 'Регистрация')

@section('content')

    <h3 style="text-align: center">Регистрация</h3>
    <div class="login-page">
        <div class="form">
            <form class="register-form">
                @method('post')
                @csrf
                <input type="text" name="name" placeholder="Имя">
                <input type="text" name="surname" placeholder="Фамилия">
                <input type="text" name="patronymic" placeholder="Отчество">
                <input type="text" name="login" placeholder="Логин">
                <input type="password" name="password" placeholder="Пароль" />
                <input type="password" name="password_repeat" placeholder="Повторите пароль" />
                <button>Зарегистрироваться</button>
                <p class="message">Уже есть аккаунт? <a href="{{route('login')}}">Войти</a><br><a
                        href="{{route('home')}}">Главная</a></p>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
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
@endpush
