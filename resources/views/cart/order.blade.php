@extends('layouts.app')
@section('content')
    @if ($products)
        <div class="cart-product-list">
            @foreach($products as $product)
                <div class="cart-product-list__item">
                    <div class="cart-product__item__product-photo"><img src="/{{$product->photo}}"
                                                                        class="cart-product__item__product-photo__image">
                    </div>
                    <div class="cart-product__item__product-name">
                        <div class="cart-product__item__product-name__content"><a href="#">{{$product->name}}</a></div>
                    </div>
                    <div class="cart-product__item__cart-date">
                        <div class="cart-product__item__cart-date__content">14.12.2016</div>
                    </div>
                    <div class="cart-product__item__product-price"><span class="product-price__value">{{$product->price}}
                            рублей</span></div>
                </div>
            @endforeach
            <div class="cart-product-list__result-item">
                <div class="cart-product-list__result-item__text">Итого</div>
                <div class="cart-product-list__result-item__value">{{$totalCartSum}} рублей</div>
            </div>
        </div>
        <div class="content-footer__container">
            <div class="btn-buy-wrap">
                <a href="#order" class="btn-buy-wrap__btn-link order-btn">Перейти к оплате</a>
            </div>
        </div>
        </div>
        <div class="content-bottom"></div>
        </div>
        <div id="order">
            <h2>Заказ</h2>
            <form id="f_contact" name="contact" action="/cart/ordermake" method="post">
                {{csrf_field()}}
                <input type="hidden" name="products" value="{{$products_ids}}">
                <input type="hidden" name="sum" value="{{$totalCartSum}}">
                <label for="f_email">Ваш E-mail</label><br>
                <input type="text" name="email" value="{{$email}}"><br>
                <button id="f_send">Заказать</button>
            </form>
        </div>
    @endif
    @if ($empty_cart)
        {{$empty_cart}}
    @endif
@endsection