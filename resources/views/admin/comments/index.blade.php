@extends('layouts.admin')


@section('content')



    @if(count($comments) > 0)

        <h1>Comments</h1>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Comment ID</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th>Post title</th>
                    <th>View replies</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->body}}</td>
                        <td><a href="{{route('home.post', $comment->post->id)}}">{{$comment->post->title}}</a></td>
                        <td><a href="{{route('replies.show', $comment->id)}}">View replies (

                                {{ count(\App\CommentReply::where('comment_id', $comment->id)->get())}}


                                )</a></td>
                        <td>

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id ]]) !!}

                            @if($comment->is_active==1)
                                {!! Form::hidden('is_active', 0) !!}
                                {!! Form::submit('Aproved', ['class'=>'btn btn-success']) !!}


                            @else($comment->is_active==0)
                                    {!! Form::hidden('is_active', 1) !!}
                                    {!! Form::submit('Unaproved', ['class'=>'btn btn-danger']) !!}

                            @endif
                            {!! Form::close() !!}

                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>





                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

        @else

            <h1 class="text-center">No Comments</h1>

    @endif




    @endsection