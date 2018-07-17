@extends('layouts.admin')


@section('content')
    @if(Session::has('no'))
        <p class="bg bg-danger">{{session('no')}}</p>
    @endif
    <h1>Admin</h1>


    @endsection