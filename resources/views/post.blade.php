@extends('layouts.blog-post')



@section('content')



    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{!! $post->body !!}</p>





    @if(Session::has('created_comment'))

        <p class="bg bg-success">{{session('created_comment')}}</p>


        @endif

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->

    @if(Auth::check())
    <div class="well">
        <h4>Leave a Comment:</h4>


        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}


        {{--<input type="hidden" name="post_id" id="{{$post->id}}">--}}
        {!! Form::hidden('post_id', $post->id) !!}

        <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}

        </div>
        {!! Form::close() !!}

    </div>

    @endif




    <hr>

    <!-- Posted Comments -->

    @if(count($comments)>0)

    @foreach($comments as $comment)
        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" height="64" src="{{$comment->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                {{$comment->body}}


            @if(count($comment->replies)>0)
            <!-- Nested Comment -->

                @foreach($comment->replies as $reply)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{$reply->photo}}" alt="" height="40">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$reply->body}}
                        </div>
                    </div>

                @endforeach
            @endif
            </div>
            <!-- End Nested Comment -->
                {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                <div class="form-group">
                    {!! Form::label('body', 'Write a reply') !!}
                    {!! Form::textarea('body',null, ['class'=>'form-control', 'rows'=>1 ]) !!}
                    {!! Form::hidden('comment_id', $comment->id) !!}
                </div>
                <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
                </div>
             </div>

        @endforeach

    @endif





@endsection


@section('sidebar_categories')

    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                @foreach($categories as $category)
                    <li><a href="{{$category->id}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    @endsection
