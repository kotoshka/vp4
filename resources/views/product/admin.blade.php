@extends('layouts.app')
@section('content')
    <a href="{{route('product.create')}}" class="btn btn-primary">Create</a>
    <table class="table table-bordered">
        <tr>
            <td>Post title</td>
            <td>Category id</td>
            <td>Controls</td>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->category_id}}</td>
                <td>
                    <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn-default">Edit</a>
                    <a href="{{route('product.delete', ['id' => $product->id])}}" class="btn-danger">delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection