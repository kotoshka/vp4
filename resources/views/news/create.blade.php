@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="content-top">
            <h3 class="title">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</h3>
            <div class="slider"><img src="img/slider.png" alt="Image" class="image-main"></div>
        </div>
        <div class="content-middle">
            <form action="/news/store" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="text" name="title" placeholder="Название новости">
                <textarea name="content" placeholder="Текст новости"></textarea>
                <input type="file" name="image">
                <input type="submit" value="Добавить">
            </form>
        </div>
        <div class="content-bottom"></div>
    </div>
@endsection