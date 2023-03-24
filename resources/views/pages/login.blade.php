@extends('app')

@section('title', 'Авторизация')

@section('content')
    <h2 style="text-align: center">Авторизация</h2>
    <div class="login-page">
        <div class="form">
            <form class="login">
                @method('post')
                @csrf
                <input placeholder="Логин" required type="text" name="login">
                <span class="text-danger"></span>
                <input placeholder="Пароль" required type="password" name="password">
                <span class="text-danger"></span>
                <button type="submit" class="btn btn-primary">Войти</button>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
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
@endpush
