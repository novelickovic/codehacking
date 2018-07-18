@extends('layouts.admin')

@section('content')

    <div class="row">
        @include('includes.form_error')
    </div>

    <div class="row">


        <div class="col-sm-6">
            {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

            <div class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit category', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id ]]) !!}
            {!! Form::submit('Delete category', ['class'=>'btn btn-danger col-sm-6']) !!}
            {!! Form::close() !!}
        </div>




    </div>







    @endsection