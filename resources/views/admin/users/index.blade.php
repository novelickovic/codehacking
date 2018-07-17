@extends('layouts.admin')


@section('content')


    @if(Session::has('deleted_user'))
        <p class="bg bg-danger">{{session('deleted_user')}}</p>
        @endif

    @if(Session::has('created_user'))
        <p class="bg bg-success">{{session('created_user')}}</p>
    @endif

    @if(Session::has('edited_user'))
        <p class="bg bg-primary">{{session('edited_user')}}</p>
    @endif

    <h1>Users</h1>

     <div class="container">
         <table class="table table-hover">
             <thead>
             <tr>
                 <th>Id</th>
                 <th>Photo</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Role</th>
                 <th>Active</th>
                 <th>Created at</th>
                 <th>Updated at</th>

             </tr>
             </thead>
             <tbody>

             @if($users)

                @foreach($users as $user)
                     <tr>
                         <td>{{$user->id}}</td>
                         <td><img src="{{$user->photo ? $user->photo->file : 'http://via.placeholder.com/100x100'}}" alt="" width="100"></td>
                         <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                         <td>{{$user->email}}</td>
                         <td>{{$user->role->name}}</td>
                         <td>{{$user->is_active==1 ? 'Active': 'Not active'}}
                         </td>
                         <td>{{$user->created_at->diffForHumans()}}</td>
                         <td>{{$user->updated_at->diffForHumans()}}</td>

                     </tr>
                @endforeach

             @endif

             </tbody>
             </table>
         </div>




    @stop