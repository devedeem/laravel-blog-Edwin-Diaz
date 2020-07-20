@extends('layouts.admin')

@section('content')

    @if(Session::has('approved'))
        <div class="alert alert-success">
            {{session('approved')}}
        </div>
    @endif

    @if(Session::has('remove'))
        <div class="alert alert-danger">
            {{session('remove')}}
        </div>
    @endif
    @if(count($replies)>0)
        <h1>Comments</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Status</th>
                <th>Content</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>View Post</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>




            @foreach($replies as $reply)
                <tr>


                    <td>{{$reply->id}}</td>
                    <td><img height="50" src="{{$reply->file}}" alt=""></td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->created_at}}</td>
                    <td>{{$reply->updated_at}}</td>
                    <td ><a class="text-primary btn" href="{{route('home.post',$reply->post->id)}}">View Post</a></td>
                    <td>
                        @if($comment->is_active ==1)
                            {!! Form::model($reply,['method'=>'POST','action'=>['PostCommentsController@update',$reply->id]]) !!}
                            @csrf
                            @method("PATCH")
                            <input type="hidden" name="is_active" value="0">
                            {!! Form::submit('Un-Approve',['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}

                        @else
                            {!! Form::model($reply,['method'=>'POST','action'=>['PostCommentsController@update',$reply->id]]) !!}
                            @csrf
                            @method("PATCH")
                            <input type="hidden" name="is_active" value="1">
                            {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::model($reply,['method'=>'DELETE','action'=>['PostCommentsController@destroy',$reply->id]]) !!}
                        @csrf
                        <input type="hidden" name="is_active" value="1">
                        {!! Form::submit('Trash',['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else

        <h1 class="text-center">No Comments</h1>
    @endif

@endsection