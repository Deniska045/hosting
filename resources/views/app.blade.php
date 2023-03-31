<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body class="container">
<header>
    <div class="welcome">
        <div class="avto">
            <h4>Добро пожаловать в магазин Авто+</h4>
        </div>
        <div class="sign">
            @auth
                <a class="nav-link" href="{{route('cart')}}">Корзина /</a>
                <a class="nav-link" href="{{route('orders')}}">Мои заказы</a>
                <a class="logout" href="{{route('logout')}}">Выход</a>
            @else
                <div class="signinup">
                    <img src="{{asset('/img/signin.png')}}" alt="">
                </div>
                <a class="nav-link" href="{{route('login')}}">Войти /</a>
                <a class="nav-link" href="{{route('register')}}">Регистрация</a>
            @endauth
        </div>
    </div>
</header>
<hr>
<div class="headers">
    <div class="img">
        <div class="telephone">
            <img src="{{asset('/img/images.jfif')}}" alt="">
        </div>
        <div class="number">
            <h2>+7 (908) 831-12-04</h2>
        </div>
        <div class="logo">
            <a href="{{route('home')}}"> <img src="{{asset('/img/Logo.png')}}" alt=""></a>
        </div>
        <div class="time">
            <img src="{{asset('/img/time.jpg')}}" alt="">
            <h3>Ежедненвно c 8:00 до 19:00</h3>
        </div>

    </div>
</div>

<div class="square">
    <div class="sguareeee">
        <a class="nav-link" href="{{route('list')}}">Каталог</a>
        <a class="nav-link" href="{{route('request')}}">Запрос по VIN</a>
        <a class="nav-link" href="{{route('delivery')}}">Доставка</a>
        <a class="nav-link" href="{{route('about')}}">О нас</a>
        <a class="nav-link" href="{{route('location')}}">Где нас найти?</a>
    </div>
</div>


<div class="m-4">
    @yield('content')
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@stack('scripts')
<script>
    const addToCart = (itemId, count = 1, reload = false) => {
        $.post('/cart/' + itemId, {count}, data => {
            // alert(data.message);
            if (reload) location.reload();
        }).fail(err => alert('Ошибка при добавлении товара'))
    }

    $('.addToCart').click(function () {
        const itemId = $(this).data('id');
        addToCart(itemId)
    })


</script>

<footer>

    <div class="footerclient">
        <h3>Клиентам</h3>
        <a class="nav-link" href="{{route('home')}}">Главная</a><br>
        <a class="nav-link" href="{{route('list')}}">Каталог</a><br>
        <a class="nav-link" href="{{route('request')}}">Запрос по VIN</a><br>
        <a class="nav-link" href="{{route('delivery')}}">Доставка</a><br>
        <a class="nav-link" href="{{route('about')}}">О нас</a><br>
        <a class="nav-link" href="{{route('location')}}">Где нас найти?</a><br>
         </div>
    <div class="vk">
        <h3>Мы в соц сетях</h3>
        <a href="https://vk.com/autoplus45?ysclid=lf5r3j93g6371964416">
            <img src="{{asset('public/img/vk.png')}}" alt="">
        </a>
    </div>
    <div class="footerclient">
    <h3>Личный кабинет</h3>
    <a class="nav-link" href="{{route('cart')}}">Корзина</a> <br>
    <a class="nav-link" href="{{route('orders')}}">Мои заказы</a>
    </div>
</footer>
</body>

</html>
