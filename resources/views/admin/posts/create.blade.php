@extends('layouts.admin')

@section('content')
@include('includes.tinyeditor')



    <h1>Create Post</h1>
<div class=" mx-auto">
      <div class="user-image"  id="user_image">
        <img class="fa fa-user" src="{{!empty($post->photo) ? $post->photo->file : ""}}" alt="">
        {{--            <div class="overlay" id="overlay">--}}
        {{--                <i class="fas fa-user"></i>--}}
        {{--            </div>--}}
      </div>
    {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','class'=>'form-group  mx-auto','files'=>true]) !!}
  @csrf
    @include('includes.form_errors')

  <div class="form-group">
    {!! Form::label('title','Title') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('category_id','Category') !!}
    {!! Form::select('category_id',[''=>'Choose Category']+$categories,null,['class'=>'form-control']) !!}
  </div >
  <div class="form-group">
    {!! Form::label('photo_id','Photo') !!}
    {!! Form::file('photo_id',['id'=>'image','class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('body','Post Content') !!}
    {!! Form::textarea('body',null,['class'=>'form-control my-editor','rows'=>10]) !!}
  </div>
    {!! Form::submit('Create',['class'=>'btn btn-outline-dark']) !!}
    {!! Form::close() !!}
</div>
@endsection