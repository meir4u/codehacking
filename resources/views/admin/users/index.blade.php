@extends('layouts.admin')

@section('content')
  <h1>Users</h1>

@include('includes.delete')

  <h2>New table</h2>
  <p></p>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
  @if($users)
    @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><img height="50px" src="{{$user->photo ? $user->photo->file : '/images/no-profile-img.gif'}}"></td>
        <td><a href="{{ route('users.edit',$user->id) }}" >{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active? 'Active' : 'NotActive'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
        <td>
            {!! Form::open([
                'method'=>'DELETE',
                'action'=>['AdminUsersController@destroy',$user->id],
                ]) !!}
                {!! Form::submit('Delete User',['class'=>'btn btn-xs btn-danger col-sm-6']) !!}
            {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  @endif
    </tbody>
  </table>
@stop
