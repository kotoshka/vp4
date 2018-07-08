@extends('layouts.app')
@section('content')
    <div class="content-middle">
        <form action="{{route('product.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="text" name="name" required placeholder="Название товара" value="{{$product->name}}">
            <input type="text" name="price" required placeholder="Цена товара" value="{{$product->price}}">
            <input type="text" name="category" placeholder="Категория товара" value="{{$product->category_id}}">
            <textarea name="description" placeholder="Описание товара">{{$product->description}}</textarea>
            <input type="file" name="photo">
            <img src="/{{$product->photo}}" width="100px">
            <input type="submit" value="Сохранить">
        </form>
    </div>
    <div class="content-bottom"></div>
    </div>
@endsection