@extends('layouts.admin')

@section('content')
<h1>All Posts</h1>

@include('includes.delete')

<h2>New table</h2>
<p></p>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Photo</th>
      <th>User</th>
      <th>Category</th>
      <th>Title</th>
      <th>Created</th>
      <th>Updated</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
@if($posts)
  @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td><img height="50px" src="{{$post->photo ? $post->photo->file : '/images/no-profile-img.gif'}}"></td>
      <td>{{$post->user->name}}</td>
      <td>{{$post->category->name}}</td>
      <td><a href="{{ route('posts.edit',$post->id) }}" >{{$post->title}}</a></td>
      <td>{{$post->created_at->diffForHumans()}}</td>
      <td>{{$post->updated_at->diffForHumans()}}</td>
      <td>
          {!! Form::open([
              'method'=>'DELETE',
              'action'=>['AdminPostsController@destroy',$post->id],
              ]) !!}
              {!! Form::submit('Delete Post',['class'=>'btn btn-xs btn-danger col-sm-6']) !!}
          {!! Form::close() !!}
      </td>
    </tr>
  @endforeach
@endif
  </tbody>
</table>

@stop
