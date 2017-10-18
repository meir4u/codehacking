@extends('layouts.admin')

@section('content')
<h1>Edit Users</h1>
<div class="row">
<div class="col-sm-3">
  <img height="50px" src="{{ $user->photo? $user->photo->file : '/images/no-profile-img.gif'}}" class="img-responsive img-rounded">
</div>
  <div class="col-sm-9">
    <div class='form-group'>
      {!! Form::model($user, [
          'method'=>'PATCH',
          'action'=>['AdminUsersController@update',$user->id],
          'files'=>true
          ]) !!}
        <div class='form-group'>
          {!! Form::label('name', 'Name' . ':') !!}
          {!! Form::text('name', null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('email', 'Email' . ':') !!}
          {!! Form::email('email', null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('role_id', 'Role' . ':') !!}
          {!! Form::select('role_id', $roles, null, ['placeholder' => 'Select User role...','class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('password', 'Password' . ':') !!}
          {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('photo_id', 'Photo' . ':') !!}
          {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('is_active', 'Status' . ':') !!}
          {!! Form::select('is_active', ['0' => 'No Active', '1' => 'Active'], Null, ['placeholder' => 'Select User Status...','class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::submit('Edit User',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
      {!! Form::close() !!}

      <div class='form-group'>
        {!! Form::open([
            'method'=>'DELETE',
            'action'=>['AdminUsersController@destroy',$user->id],
            ]) !!}
          <div class='form-group'>
            {!! Form::submit('Delete User',['class'=>'btn btn-danger col-sm-6']) !!}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@include('includes.form_error')

@stop
