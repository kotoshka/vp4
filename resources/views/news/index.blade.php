@extends('layouts.app')
@section('content')
            @guest
                Чтобы добавлять новости необходимо авторизоваться на сайте.
            @else
                <a href="/news/create">Добавить новость</a>
            @endguest
            <div class="content-main__container">
                <div class="news-list__container">
                    @foreach ($posts as $post)
                        <div class="news-list__item">
                            <div class="news-list__item__thumbnail"><img src="/{{$post->image}}"></div>
                            <div class="news-list__item__content">
                                <div class="news-list__item__content__news-title">{{$post->title}}</div>
                                <div class="news-list__item__content__news-date">{{$post->created_at}}</div>
                                <div class="news-list__item__content__news-content">
                                    {{$post->content}}
                                </div>
                            </div>
                            <div class="news-list__item__content__news-btn-wrap">
                                <a href="/news/detail?id={{$post->id}}" class="btn btn-brown">Подробнее</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
@endsection