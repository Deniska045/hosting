@extends('app')

@section('title', 'Каталог')

@section('content')

    <div class="indexgridlist">
        @forelse($items as $item)
            <div class="card " style="width: 18rem;">
                <a href="{{route('show', $item)}}"><img src="{{$item->image}}" class="card-img-top"
                                                        alt="{{$item->name}}"></a>
                <div class="card-body">
                    <h5 class="card-title">Название товара: {{$item->name}}</h5>
                    <p class="card-text">Цена товара: {{$item->price}}<span class="rub">Р</span></p>
                    <p class="card-text">Колличетсво товара: {{$item->quantity}} шт.</p>
                    @auth
                        @if($item->isAvailable())
                            <button data-id="{{$item->id}}" class="btn btn-primary addToCart">В корзину</button>
                        @else
                            Нет в наличии
                        @endif
                    @endauth

                </div>
            </div>
    </div>
    @empty
        <div role="alert">
            Товары не найдены
        </div>
    @endforelse

@endsection
