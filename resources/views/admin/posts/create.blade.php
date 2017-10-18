@extends('layouts.admin')

@section('content')
<h1>Create Post</h1>
<div class="row">
  <div class="col-sm-12">
    <div class='form-group'>
      {!! Form::open([
          'method'=>'POST',
          'action'=>'AdminPostsController@store',
          'files'=>true
          ]) !!}
        <div class='form-group'>
          {!! Form::label('title', 'Title' . ':') !!}
          {!! Form::text('title', null,['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('body', 'Body' . ':') !!}
          {!! Form::textarea('body', null,['class'=>'form-control','rows'=>3]) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('category_id', 'Category' . ':') !!}
          {!! Form::select('category_id',[''=>'select category'] /*$categories*/, 1, ['placeholder' => 'Select Category...','class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('user_id', 'User' . ':') !!}
          {!! Form::select('user_id', $users, null, ['placeholder' => 'Select User...','class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
          {!! Form::label('photo_id', 'Photo' . ':') !!}            
          {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
        </div>

        <div class='form-group'>
          {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@include('includes.form_error')

@stop
