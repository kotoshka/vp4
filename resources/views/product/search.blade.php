@extends('layouts.app')
@section('content')
    <div class="content-main__container">
        <div class="products-columns">
            @foreach($findProducts as $product)
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product">
                        <a href="{{route('cart.index', ['id' => $product->id])}}" class="products-columns__item__title-product__link">{{$product->name}}</a>
                    </div>
                    <div class="products-columns__item__thumbnail">
                        <a href="{{route('cart.index', ['id' => $product->id])}}" class="products-columns__item__thumbnail__link">
                            <img src="/{{$product->photo}}" alt="{{$product->name}}" class="products-columns__item__thumbnail__img">
                        </a>
                    </div>
                    <div class="products-columns__item__description">
                        <span class="products-price">{{$product->price}}</span>
                        <a href="javascript:void(0);" class="btn btn-blue buy-btn">Купить</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="content-footer__container">
        {{ $findProducts->links() }}
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