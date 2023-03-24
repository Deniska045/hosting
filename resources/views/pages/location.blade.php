@extends('app')

@section('title', 'Где нас найти?')

@section('content')
    <div class="location">
        <h2>Наш адрес: <p style="color: gray"> р.п.Варгаши ул.Гайдара, д.3</p></h2>
        <h2>Наш телефон <p style="color: gray">
                +7 (908) 831-12-04</p></h2>
        <div style="position:relative;overflow:hidden; margin-left: 10%"><a
                href="https://yandex.ru/maps/11158/kurgan-oblast/?utm_medium=mapframe&utm_source=maps"
                style="color:#eee;font-size:12px;position:absolute;top:0px;">Курганская область</a><a
                href="https://yandex.ru/maps/11158/kurgan-oblast/house/ulitsa_gaydara_3/YkwYfgRlS0wHQFtvfX95cXVmZw==/?ll=65.835793%2C55.381094&utm_medium=mapframe&utm_source=maps&z=17"
                style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Гайдара, 3 на карте Курганской
                области — Яндекс Карты</a>
            <iframe
                src="https://yandex.ru/map-widget/v1/?ll=65.835793%2C55.381094&mode=whatshere&whatshere%5Bpoint%5D=65.835290%2C55.380953&whatshere%5Bzoom%5D=17&z=17"
                width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
        </div>
    </div>

@endsection
