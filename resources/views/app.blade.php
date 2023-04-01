<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Магазин автозапчастей - @yield('title')</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
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
            <img src="{{asset('/img/pngwing.com.png')}}" alt="">
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
            <img src="{{asset('img/vk.png')}}" alt="">
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
