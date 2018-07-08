@extends('layouts.app')
@section('content')
            @if(Auth::check() && Auth::user()->role === 1)
                <a href="/news/delete?id={{$post->id}}">Удалить новость</a>
                <a href="/news/edit?id={{$post->id}}">Изменить новость</a>
            @endif
            <div class="content-main__container">
                <div class="news-block content-text">
                    <h3 class="content-text__title">
                        {{$post->title}}
                    </h3><img src="/{{$post->image}}" alt="{{$post->title}}" class="alignleft img-news" height="">
                    {{$post->content}}
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
                                <a href="/product/index?id={{$lastProduct->id}}" class="products-columns__item__title-product__link">{{$lastProduct->name}}</a>
                            </div>
                            <div class="products-columns__item__thumbnail">
                                <a href="/product/index?id={{$lastProduct->id}}" class="products-columns__item__thumbnail__link">
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