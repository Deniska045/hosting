@extends('app')

@section('title', 'Товар')

@section('content')
    <main>
        <div class="card">
            <div class="card__title">
                <div class="icon">
                    <a href="#"><i class="fa fa-arrow-left"></i></a>
                </div>
            </div>
            <div class="card__body">
                <div class="half">
                    <div class="featured_text">
                        <h1>{{$item->name}}</h1>
                        <h3 class="price">Цена: {{$item->price}} р.</h3>
                    </div>
                    <div class="image">
                        <img src="{{$item->image}}" alt="">
                    </div>
                </div>
                <div class="half">
                    <div class="description">
                        <h3>Описания товара: </h3>
                        <p> {{$item->detail_information}}</p>

                    </div>
                    <div class="reviews">
                        <h3>Количество товара: ({{$item->quantity}}) шт.</h3>
                    </div>
                </div>
            </div>
            <div class="card__footer">
                <div class="recommend">
                    <p>Рекомендация от</p>
                    <h2>Магазина Авто+</h2>
                </div>
                <div class="action">
                    @auth
                        @if($item->isAvailable())
                            <button data-id="{{$item->id}}" class="btn btn-primary addToCart">В корзину</button>
                        @else
                            <p style="color: red;">Нет в наличии</p>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </main>

@endsection
