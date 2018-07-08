@extends('layouts.app')
@section('content')
    <div class="content-middle">
        <form action="{{route('category.update', ['id' => $category->id])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="text" name="name" placeholder="Название категории" value="{{$category->name}}">
            <textarea name="description" placeholder="Описание категории">{{$category->description}}</textarea>
            <input type="file" name="photo">
            <img src="/{{$category->photo}}" width="100px">
            <input type="submit" value="Сохранить">
        </form>
    </div>
    <div class="content-bottom"></div>
    </div>
@endsection