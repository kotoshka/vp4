@extends('layouts.app')
@section('content')
    <div class="content-middle">
        <form action="/product/store" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="text" name="name" required placeholder="Название товара">
            <input type="text" name="price" required placeholder="Цена товара">
            <input type="text" name="category" placeholder="Категория товара" value="<?=$_GET['category_id']?>">
            <textarea name="description" placeholder="Описание товара"></textarea>
            <input type="file" name="image">
            <input type="submit" value="Добавить">
        </form>
    </div>
    <div class="content-bottom"></div>
    </div>
@endsection