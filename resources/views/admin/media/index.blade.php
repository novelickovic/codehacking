@extends('layouts.admin')


@section('content')

    <h1>Media</h1>
    @if(Session::has('deleted_image'))

        <p class="bg bg-danger">{{session('deleted_image')}}</p>

    @endif


    @if($photos)

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img src="{{$photo->file}}" alt="" height="50"></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy', $photo->id]]) !!}

                        {!! Form::submit('Delete picture', ['class'=>'btn btn-danger']) !!}

                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
            </tbody>


        </table>

    @endif


    @endsection