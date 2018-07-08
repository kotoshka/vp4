@extends('layouts.app')
@section('content')
    @if(Auth::check() && Auth::user()->role === 1)
        <a href="/category/create">Добавить категорию</a>
    @endif
    <div class="content-main__container">
        <div class="news-list__container">
            @foreach ($categories as $category)
                <div class="news-list__item">
                    <div class="news-list__item__thumbnail"><img src="/{{$category->photo}}"></div>
                    <div class="news-list__item__content">
                        <div class="news-list__item__content__news-title">{{$category->name}}</div>
                        <div class="news-list__item__content__news-content">
                            {{$category->description}}
                        </div>
                        @if(Auth::check() && Auth::user()->role === 1)
                            <a href="/category/delete?id={{$category->id}}">Удалить категорию</a>
                            <a href="/category/edit?id={{$category->id}}">Редактировать категорию</a>
                        @endif
                    </div>
                    <div class="news-list__item__content__news-btn-wrap">
                        <a href="/category/detail?id={{$category->id}}" class="btn btn-brown">Посмотреть товары категории</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    <div class="content-bottom"></div>
    </div>
@endsection