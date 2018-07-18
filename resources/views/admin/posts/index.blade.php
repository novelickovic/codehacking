@extends('layouts.admin')


@section('content')

    <h1>All Posts</h1>


    <table class="table table-hover">
        <thead>
        <tr>
            <td>Id</td>
            <td>User</td>
            <td>Category</td>
            <td>Photo</td>
            <td>Title</td>
            <td>Body</td>
            <td>Created at</td>
            <td>Updated at</td>
        </tr>
        </thead>
        <tbody>


        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category? $post->category->name : 'Uncategorized'}}</td>
                    <td><img src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/100x100'}}" alt="" height="40"></td>
                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body, 20)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
                </tbody>
            @endforeach
        @endif
    </table>



    @endsection