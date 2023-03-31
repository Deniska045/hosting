@extends('app')

@section('title', 'Доставка')

@section('content')

    <h2 style="text-align: center">Доставка</h2>
    <div class="delivery">
        <img class="deliverypng" src="{{asset('/img/delivery3.png')}}" alt="">
        <img class="samopng" src="{{asset('/img/samo.png')}}" alt="">
        <div class="deliverysquare">
            <h3>Доставка почтой России</h3>
            <p>Доставка Почтой России по всем регионам.</p>
        </div>
        <div class="deliverysquare">
    <h3>Самовывоз Из Магазина</h3>
    <p>Вы всегда можете забрать ваш заказ из нашего магазина.Варгаши ул.Гайдара д.3</p>
        </div>
    </div>
@endsection

