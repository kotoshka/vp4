@extends('layouts.app')
@section('content')
    <div class="content-main__container">
        <div class="cart-product-list">
            @foreach ($orders as $order)
                <div class="cart-product-list__item">
                    <div class="cart-product__item__product-photo"><img src="img/cover/game-1.jpg"
                                                                        class="cart-product__item__product-photo__image">
                    </div>
                    <div class="cart-product__item__product-name">
                        <div class="cart-product__item__product-name__content"><a href="#">Заказ № {{$order->id}}</a>
                        </div>
                    </div>
                    <div class="cart-product__item__cart-date">
                        <div class="cart-product__item__cart-date__content">{{$order->created_at}}</div>
                    </div>
                    <div class="cart-product__item__product-price"><span class="product-price__value">{{$order->sum}}
                            рублей</span></div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="content-footer__container">
        {{ $orders->links() }}
    </div>
    </div>
    <div class="content-bottom"></div>
    </div>
@endsection