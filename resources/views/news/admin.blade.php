@extends('layouts.app')
@section('content')
    <a href="{{route('news.create')}}" class="btn btn-primary">Create</a>
    <table class="table table-bordered">
        <tr>
            <td>Post title</td>
            <td>Controls</td>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>
                    <a href="{{route('news.edit', ['id' => $post->id])}}" class="btn-default">Edit</a>
                    <a href="{{route('news.delete', ['id' => $post->id])}}" class="btn-danger">delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection