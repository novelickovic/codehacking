@extends('layouts.admin')





@section('content')

    <h1>Categories</h1>


    @if($categories)

        <div class="col-sm-6">

            <div class="row">
                @include('includes.form_error')
            </div>

            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

            <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::submit('Create category', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}


        </div>


        <div class="col-sm-6">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No created time'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>




    @endif





    @endsection