@extends('layouts.app')
@section('content')
    Сменить email аджминистратора, текущий email: {{$admin_email}}
    <form action="/order/email" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" name="email" required placeholder="Email администратора">
        <input type="submit" value="Добавить">
    </form>
    <table class="table table-bordered">
        <tr>
            <td>order id</td>
            <td>user email</td>
            <td>sum</td>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user_email}}</td>
                <td>{{$order->sum}}</td>
            </tr>
        @endforeach
    </table>
@endsection