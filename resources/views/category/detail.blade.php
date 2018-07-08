@extends('layouts.app')
@section('content')
        @if(Auth::check() && Auth::user()->role === 1)
            <a href="/product/create?category_id={{$category->id}}">Добавить товар</a>
        @endif
            <div class="content-main__container">
                <div class="products-category__list">
                    @foreach($products as $product)
                        <div class="products-category__list__item">
                            <div class="products-category__list__item__title-product">
                                <a href="/product/?id={{$product->id}}">{{$product->name}}</a></div>
                            <div class="products-category__list__item__thumbnail">
                                <a href="/product/?id={{$product->id}}" class="products-category__list__item__thumbnail__link">
                                    <img src="/{{$product->photo}}" alt="{{$product->name}}">
                                </a>
                            </div>
                            <div class="products-category__list__item__description">
                                <span class="products-price">{{$product->price}}</span>
                                <a href="{{route('cart.index', ['id' => $product->id])}}" class="btn btn-blue">Купить</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="content-footer__container">
                {{ $products->links() }}
                <?/*
                <ul class="page-nav">
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
                    <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
                */?>
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
@endsection