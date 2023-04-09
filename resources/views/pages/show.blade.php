@extends('app')

@section('title', 'Товар')

@section('content')
    <div class="cardtovar">
        <img src="{{$item->image}}" alt="{{$item->name}}">
        <div class="m-2">
            <h2 class="mb-2">Название товара: {{$item->name}}</h2>
            <p class="mb-1">Цена: {{$item->price}} р.</p>
            <p class="mb-1">Год выпуска: {{$item->model_year}}</p>
            <p class="mb-1">Модель товара: {{$item->model_type}}</p>
            <p class="mb-1">Количество товара: {{$item->quantity}}</p>
            @auth
                @if($item->isAvailable())
                    <button data-id="{{$item->id}}" class="btn btn-primary addToCart">В корзину</button>
                @else
                    <p style="color: red;">Нет в наличии</p>
                @endif
            @endauth
        </div>
    </div>
@endsection
