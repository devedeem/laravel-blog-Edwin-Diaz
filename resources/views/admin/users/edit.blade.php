@extends('layouts.admin')

@section('content')
    <div class=" w-50 mx-auto ">
        <div class="h1">
            Edit User
        </div>
        <div class="user-image"  id="user_image">
            <img class="fa fa-user" src="{{!empty($user->photo) ? $user->photo->file : ""}}" alt="">
{{--            <div class="overlay" id="overlay">--}}
{{--                <i class="fas fa-user"></i>--}}
{{--            </div>--}}
        </div>
        {!! Form::model($user,['method'=>'POST','action'=>['AdminUserController@update',$user->id],'class'=>'form-group','files'=>true]) !!}
        @method("PATCH")
        @csrf
        @include('includes.form_errors')
        <div class="form-group hidden">
            {{--{!! Form::label('file','File') !!}--}}
            {!! Form::file('photo_id',['id'=>'image','class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div >
        <div class="form-group">
            {!! Form::label('role_id','Role') !!}
            {!! Form::select('role_id',[''=>'Choose One Option']+$roles,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active','Status') !!}
            {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('Update',['class'=>'btn btn-default']) !!}
        {!! Form::close() !!}

    </div>


@endsection