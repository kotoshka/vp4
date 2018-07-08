@extends('layouts.app')
@section('content')
    @if(Auth::check() && Auth::user()->role === 1)
        <a href="/product/delete?id={{$product->id}}">Удалить товар</a>
        <a href="/product/edit?id={{$product->id}}">Изменить товар</a>
    @endif
            <div class="content-main__container">
                <div class="product-container">
                    <div class="product-container__image-wrap"><img src="/{{$product->photo}}" class="image-wrap__image-product"></div>
                    <div class="product-container__content-text">
                        <div class="product-container__content-text__title">{{$product->name}}</div>
                        <div class="product-container__content-text__price">
                            <div class="product-container__content-text__price__value">
                                Цена: <b>{{$product->price}}</b>
                                руб
                            </div><a href="{{route('cart.index', ['id' => $product->id])}}" class="btn btn-blue buy-btn">Купить</a>
                        </div>
                        <div class="product-container__content-text__description">
                            {{$product->description}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-bottom">
            <div class="line"></div>
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="products-columns">
                    @foreach ($lastProducts as $lastProduct)
                        <div class="products-columns__item">
                            <div class="products-columns__item__title-product">
                                <a href="/product/?id={{$lastProduct->id}}" class="products-columns__item__title-product__link">{{$lastProduct->name}}</a>
                            </div>
                            <div class="products-columns__item__thumbnail">
                                <a href="/product/?id={{$lastProduct->id}}" class="products-columns__item__thumbnail__link">
                                    <img src="/{{$lastProduct->photo}}" alt="{{$lastProduct->name}}" class="products-columns__item__thumbnail__img">
                                </a>
                            </div>
                            <div class="products-columns__item__description">
                                <span class="products-price">{{$lastProduct->price}}</span>
                                <a href="javascript:void(0);" class="btn btn-blue buy-btn">Купить</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection