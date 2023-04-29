@extends('app')

@section('title', 'Главная')

@section('content')
    <div class="new">
        <marquee direction="right">
            <h2>5 новинок магазина</h2>
        </marquee>
    </div>
    <div class="indexgrid">
        @forelse($items as $index => $item)
            <div class="card" style="width: 18rem;">
                <a href="{{route('show', $item)}}">
                    <img src="{{$item->image}}" class="card-img-top"
                         alt="{{$item->name}}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Название товара: {{$item->name}}</h5>
                    <p class="card-text">Цена товара: {{$item->price}}<span class="rub">Р</span></p>
                    <p class="card-text">Колличетсво товара: {{$item->quantity}} шт.</p>
                    @auth
                        @if($item->isAvailable())
                            <button data-id="{{$item->id}}" class="btn btn-primary addToCart">В корзину</button>
                        @else
                            <p style="color: red">Нет в наличии</p>
                        @endif
                    @endauth
                </div>
            </div>
    </div>
    @empty
    @endforelse

@endsection
