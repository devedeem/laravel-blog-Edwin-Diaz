@extends('layouts.admin')

@section('content')
@include('includes.tinyeditor')



    <h1>Edit Post</h1>

    <div class=" mx-auto">
    <div class="user-image"  id="user_image">
        <img class="fa fa-user" src="{{!empty($post->photo) ? $post->photo->file : ""}}" alt="">
        {{--            <div class="overlay" id="overlay">--}}
        {{--                <i class="fas fa-user"></i>--}}
        {{--            </div>--}}
    </div>



    {!! Form::model($post,['method'=>'POST','action'=>['AdminPostsController@update',$post->id],'class'=>'form-group  mx-auto','files'=>true]) !!}
    @csrf
    @method("PATCH")
    @include('includes.form_errors')

    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id','Category') !!}
        {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
    </div >
    <div class="form-group">
        {!! Form::label('photo_id','Photo') !!}
        {!! Form::file('photo_id',['id'=>'image','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body','Post Content') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>25]) !!}
    </div>
        {!! Form::submit('Update',['class'=>'btn btn-outline-dark']) !!}
        {!! Form::close() !!}
    </div>
@endsection