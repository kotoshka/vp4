@extends('layouts.app')
@section('content')
        <div class="content-middle">
            <form action="{{route('news.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="text" name="title" placeholder="Название новости" value="{{$post->title}}">
                <textarea name="content" placeholder="Текст новости">{{$post->content}}</textarea>
                <input type="file" name="image">
                <img src="/{{$post->image}}" width="100px">
                <input type="submit" value="Сохранить">
            </form>
        </div>
        <div class="content-bottom"></div>
    </div>
@endsection