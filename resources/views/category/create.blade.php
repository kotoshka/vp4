@extends('layouts.app')
@section('content')
        <div class="content-middle">
            <form action="/category/store" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="text" name="name" placeholder="Название категории">
                <textarea name="description" placeholder="Описание категории"></textarea>
                <input type="file" name="image">
                <input type="submit" value="Добавить">
            </form>
        </div>
        <div class="content-bottom"></div>
    </div>
@endsection