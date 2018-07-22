@extends('layouts.admin')


@section('content')



    @if(count($replies) > 0)

        <h1>Comments</h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Reply ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post title</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            </thead>

            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}">{{$reply->comment->post->id}}</a></td>
                    <td>

                    {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id ]]) !!}

                    @if($reply->is_active==1)
                        {!! Form::hidden('is_active', 0) !!}
                        {!! Form::hidden('comment_id', $reply->comment->id) !!}
                        {!! Form::submit('Approved', ['class'=>'btn btn-success']) !!}


                    @else($reply->is_active==0)
                        {!! Form::hidden('is_active', 1) !!}
                        {!! Form::hidden('comment_id', $reply->comment->id) !!}
                        {!! Form::submit('Unapproved', ['class'=>'btn btn-danger']) !!}

                    @endif
                    {!! Form::close() !!}

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
                        {!! Form::hidden('comment_id', $reply->comment->id) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>





                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else

        <h1 class="text-center">No Replies</h1>

    @endif




@endsection