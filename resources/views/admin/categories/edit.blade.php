@extends('layouts.admin')

@section('content')
<h1>Update Category</h1>

<div class="col-md-6">
    {!! Form::model($category,['method'=>'POST','action'=>['AdminCategoriesController@update',$category->id],'class'=>'form-group w-75 mx-auto']) !!}
    @csrf
    @method("PATCH")
    <div class="form-group">
        {!! Form::label('title','Category_Name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    {!! Form::submit('Update Category',['class'=>'btn btn-outline-dark']) !!}
    {!! Form::close() !!}
</div>


@endsection