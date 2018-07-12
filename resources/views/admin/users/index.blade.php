@extends('layouts.admin')

@section('content')

    <h1>Users</h1>

     <div class="container">
         <table class="table table-hover">
             <thead>
             <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Role</th>
                 <th>Active</th>
                 <th>Created at</th>
                 <th>Updated at</th>
                 <th>Photo id</th>
             </tr>
             </thead>
             <tbody>

             @if($users)

                @foreach($users as $user)
                     <tr>
                     <td>{{$user->id}}</td>
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                     <td>{{$user->role->name}}</td>
                     <td>{{$user->is_active==1 ? 'Active': 'Not active'}}
                     </td>
                     <td>{{$user->created_at->diffForHumans()}}</td>
                     <td>{{$user->updated_at->diffForHumans()}}</td>
                     <td>{{$user->photo_id}}</td>
                     </tr>
                @endforeach

             @endif

             </tbody>
             </table>
         </div>




    @stop