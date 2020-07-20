@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
<div class="row">
    <div class="col-md-6">
        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store','class'=>'form-group w-75 mx-auto']) !!}
        @csrf
        <div class="form-group">
            {!! Form::label('title','Category_Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('Create Category',['class'=>'btn btn-outline-dark']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-6">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Category_id</th>
                <th>Category_Name</th>
                <th>Created_at</th>
                <th>Update_at</th>
                <th><i class="fa fa-edit text-info"></i></th>
                <th><i class="fa fa-times text-danger"></i></th>
            </tr>
            </thead>
            <tbody>

            @if(count($categories))

                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans():''}}</td>
                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans():''}}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}"><i class="fa fa-edit text-info"></i></a></td>
                        <td>
                            {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id],'class'=>'form-group w-50 mx-auto']) !!}
                            {!! Form::submit('',['class'=>'btn fa text-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>


                @endforeach
            @endif

            </tbody>
        </table>
    </div>

</div>


@endsection