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
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="public/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
</head>
<body class="">
<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
        </svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{route('list')}}" class="nav-link px-2 link-secondary">Каталог</a></li>
        <li><a href="{{route('request')}}" class="nav-link px-2 link-dark">Запрос по VIN</a></li>
        <li><a href="{{route('delivery')}}" class="nav-link px-2 link-dark">Доставка</a></li>
        <li><a href="{{route('about')}}" class="nav-link px-2 link-dark">О нас</a></li>
        <li><a href="{{route('location')}}" class="nav-link px-2 link-dark">Где нас найти?</a></li>
    </ul>

    <div class="col-md-3 text-end">
        @auth
            <i class="bi bi-basket"></i>
            <a href="{{route('cart')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-basket"
                     viewBox="0 0 16 16">
                    <path
                        d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </a>
            <i class="bi bi-cart"></i>
            <a href="{{route('orders')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cart"
                     viewBox="0 0 16 16">
                    <path
                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
            </a>
            <i class="bi bi-box-arrow-right"></i>
            <a href="{{route('logout')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                     class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd"
                          d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </a>
        @else
            <a href="{{route('login')}}" class="btn btn-outline-primary me-2">Войти</a>
            <a href="{{route('register')}}" class="btn btn-primary">Зарегистрироваться</a>
        @endauth
    </div>
</header>
<div class="logo">
    <a href="{{route('home')}}"><img src="{{asset('/img/Logo.png')}}" class="rounded float-end" alt="..."></a>
</div>
<div class="m-4">
    @yield('content')
</div>

<script src="{{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
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
<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{route('home')}}" class="nav-link px-2 text-muted">Главная </a></li>
        <li class="nav-item"><a href="{{route('list')}}" class="nav-link px-2 text-muted">Каталог</a></li>
        <li class="nav-item"><a href="{{route('request')}}" class="nav-link px-2 text-muted">Запрос по VIN</a></li>
        <li class="nav-item"><a href="{{route('delivery')}}" class="nav-link px-2 text-muted">Доставка</a></li>
        <li class="nav-item"><a href="{{route('about')}}" class="nav-link px-2 text-muted">О нас</a></li>
        <li class="nav-item"><a href="{{route('location')}}" class="nav-link px-2 text-muted">Где нас найти?</a></li>
    </ul>
    <p class="text-center text-muted">© 2023 Company, Inc</p>
</footer>

</body>

</html>
