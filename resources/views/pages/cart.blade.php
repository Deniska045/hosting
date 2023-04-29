@extends('app')

@section('title', 'Корзина')

@section('content')
    {{--    <h2 style="text-align: center">Корзина</h2>--}}
    {{--    <div class="sdsadas">--}}
    {{--    <div class="fas">--}}
    {{--        <div class="finalprice">--}}
    {{--            <h3>Финальная цена: {{$finalPrice}}</h3>--}}
    {{--            <br>--}}
    {{--            <form class="order">--}}
    {{--                @method('post')--}}
    {{--                @csrf--}}
    {{--                <div class="passwordcart">--}}

    {{--                    <label for="exampleInputPassword1" class="form-label">Пароль для подтверждения заказа</label> <br>--}}
    {{--                    <input required type="password" name="password" class="form-control" id="exampleInputPassword1">--}}
    {{--                </div>--}}
    {{--                <button type="submit" class="success">Оформить</button>--}}

    {{--            </form>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--        <div class="dasdsdfgdg">--}}
    {{--    <div class="basket">--}}
    {{--        <div class="tovar">--}}
    {{--            @forelse($items as $item)--}}
    {{--                <div class="card" style="width: 18rem;">--}}
    {{--                    <img src="{{$item['item']['image']}}" class="card-img-top" alt="{{$item['item']['image']}}">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <h5 class="card-title">{{$item['item']['name']}}</h5>--}}
    {{--                        <p class="card-text">Цена за одну штуку: {{$item['item']['price'] }}</p>--}}
    {{--                        <p class="card-text">Колличество: {{$item['count']}} шт.</p>--}}
    {{--                        <button data-id="{{$item['item']['id']}}" data-count="1" class="btn btn-success editCart">+--}}
    {{--                        </button>--}}
    {{--                        <button data-id="{{$item['item']['id']}}" data-count="-1" style="background-color: red"--}}
    {{--                                class="btn btn-danger editCart">---}}
    {{--                        </button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--        </div>--}}

    {{--            @empty--}}

    {{--                <div style="margin-left: 85px" role="alert">--}}
    {{--                    Корзина пуста--}}
    {{--                </div>--}}
    {{--            @endforelse--}}
    {{--     --}}
    <div class="cart_title" style="text-align: center;">Корзина<small></small></div>

    @forelse($items as $item)
        <div class="cart_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cart_container">
                            <div class="cart_items">
                                <ul class="cart_list">
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{$item['item']['image']}}"
                                                                          class="card-img-top"
                                                                          alt="{{$item['item']['image']}}"></div>
                                        <div
                                            class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Имя</div>
                                                <div class="cart_item_text">{{$item['item']['name']}}</div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Колличество</div>
                                                <div class="cart_item_text">{{$item['count']}}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Цена</div>
                                                <div
                                                    class="cart_item_text">{{$item['item']['price']}}Р                                              </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty

        Корзина пуста

    @endforelse
    <div class="order_total">
        <div class="order_total_content text-md-right">
            <div class="order_total_title">Финальная цена:</div>
            <div class="order_total_amount">{{$finalPrice}} Р</div>
        </div>
    </div>
    <form class="order">
        @method('post')
        @csrf
        <div class="passwordcart">

            <label for="exampleInputPassword1" class="form-label">Пароль для подтверждения
                заказа</label>
            <input required type="password" name="password" class="form-control"
                   id="exampleInputPassword1">
        </div>
        <button type="submit" class="button cart_button_checkout">Оформить</button>
        <a href="{{route('list')}}" class="button cart_button_clear">Продолжить
            просмотр товаров</a>
    </form>

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
