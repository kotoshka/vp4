@extends('layouts.app')
@section('content')
    <a href="{{route('category.create')}}" class="btn btn-primary">Create</a>
    <table class="table table-bordered">
        <tr>
            <td>Post title</td>
            <td>Controls</td>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{route('product.edit', ['id' => $category->id])}}" class="btn-default">Edit</a>
                    <a href="{{route('product.delete', ['id' => $category->id])}}" class="btn-danger">delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection