@extends('layouts.admin')

@section('content')
<h1>Create User</h1>

<div class='form-group'>
  {!! Form::open([
      'method'=>'POST',
      'action'=>'AdminUsersController@store',
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
      {!! Form::label('file', 'File' . ':') !!}
      {!! Form::file('file', null,['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
      {!! Form::label('is_active', 'Active' . ':') !!}
      {!! Form::select('is_active', ['0' => 'No Active', '1' => 'Active'], 0, ['placeholder' => 'Select User Status...','class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
      {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
</div>

@include('includes.form_error')

@stop
