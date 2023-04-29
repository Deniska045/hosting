@extends('app')

@section('title', 'Заказы')

@section('content')
    <h2 style="text-align: center">Ваши заказы</h2>
    <div class="ddd">
        <div class="dasd">
            <div class="d-flex">
                @forelse($orders as $order)
                    <div class="cards">
                        @foreach($order->items as $orderItem)
                            <div class="mb-2" style="width: 18rem;">
                                <img src="{{$orderItem['item']['image']}}" class="card-img-top"
                                     alt="{{$orderItem['item']['name']}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$orderItem['item']['name']}}</h5>
                                    <p class="card-text">{{$orderItem['price'] * $orderItem['count']}} <span
                                            class="rub">Р</span></p>
                                </div>
                            </div>
                        @endforeach

                        <div style="margin-left: 25%;">Статус: {{$order->status}}</div>
                        @if($order->status === 'Новый')
                            <a href="{{route('deleteOrder', $order)}}" class="danger">Удалить</a>
                        @elseif($order->status === 'Отменён')
                            <p>Причина отмены заказа: {{$order->description}}</p>
                        @endif
                        @if($order->toArray(null)["pay"]?? '' && $order->status === "Подтвержден" )

                            <a style="color: #1c7430" href="{{$order->toArray(null)["pay"]}}">Оплатить</a>

                        @endif
                    </div>

                @empty
                    <div style="margin-left: 10%;" role="alert">
                        Вы еще не сделали ни одного заказа
                    </div

                @endforelse


            </div>
        </div>
    </div>
@endsection
