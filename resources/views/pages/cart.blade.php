@extends('app')

@section('title', 'Корзина')

@section('content')
    <h2 style="text-align: center">Корзина</h2>
    <div class="sdsadas">
    <div class="fas">
        <div class="finalprice">
            <h3>Финальная цена: {{$finalPrice}}</h3>
            <br>
            <form class="order">
                @method('post')
                @csrf
                <div class="passwordcart">

                    <label for="exampleInputPassword1" class="form-label">Пароль для подтверждения заказа</label> <br>
                    <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="success">Оформить</button>

            </form>
        </div>
    </div>
        <div class="dasdsdfgdg">
    <div class="basket">
        <div class="tovar">
            @forelse($items as $item)
                <div class="card" style="width: 18rem;">
                    <img src="{{$item['item']['image']}}" class="card-img-top" alt="{{$item['item']['image']}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$item['item']['name']}}</h5>
                        <p class="card-text">Цена за одну штуку: {{$item['item']['price'] }}</p>
                        <p class="card-text">Колличество: {{$item['count']}} шт.</p>
                        <button data-id="{{$item['item']['id']}}" data-count="1" class="btn btn-success editCart">+
                        </button>
                        <button data-id="{{$item['item']['id']}}" data-count="-1" style="background-color: red"
                                class="btn btn-danger editCart">-
                        </button>
                    </div>
                </div>
        </div>
{{--<div class="cart">--}}
{{--    <img src="{{$item['item']['image']}}" alt="">--}}
{{--    <h5 class="cardss-title">Название{{$item['item']['name']}}</h5>--}}
{{--   <h5 class="cardss-title">Цена за одну штуку: {{$item['item']['price'] }}</h5>--}}
{{--    <button data-id="{{$item['item']['id']}}" data-count="1" class="btn btn-success editCart">+--}}
{{--                            </button>--}}
{{--                            <button data-id="{{$item['item']['id']}}" data-count="-1" style="background-color: red"--}}
{{--                                    class="btn btn-danger editCart">---}}
{{--                            </button>--}}
{{--</div>--}}
            @empty

                <div style="margin-left: 85px" role="alert">
                    Корзина пуста
                </div>
            @endforelse

        @endsection

    @push('scripts')
        <script>
            $('.editCart').click(function () {
                const itemId = $(this).data('id')
                const count = Number($(this).data('count'))
                addToCart(itemId, count, true)
            })

            document.querySelector('.order').onsubmit = function (e) {
                e.preventDefault();

                $.post('/order/create', $('.order').serializeArray(), data => {
                    if (data.error) return alert(data.error)
                    location.href = '/orders'
                }).fail(err => alert('неизвестная ошибка'))
            }
        </script>
    @endpush
