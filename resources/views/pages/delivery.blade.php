@extends('app')

@section('title', 'Доставка')

@section('content')
    <div class="flex">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('/img/delivery3.png')}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Доставка почтой России</h5>
                <p class="card-text">Доставка Почтой России по всем регионам.</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('/img/samo.png')}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Самовывоз Из Магазина</h5>
                <p class="card-text">Вы всегда можете забрать ваш заказ из нашего магазина.Варгаши ул.Гайдара д.3</p>
            </div>
        </div>
    </div>
@endsection

