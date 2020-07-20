@extends('layouts.admin')

@section('content')
    <div>
        <a href="{{route('posts.index')}}"><b>Go to Posts</b></a>
    </div>
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
    @if(count($comments)>0)
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




            @foreach($comments as $comment)
                <tr>


                    <td>{{$comment->id}}</td>
                    <td><img height="50" src="{{$comment->file}}" alt=""></td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>{{$comment->updated_at}}</td>
                    <td ><a class="text-primary btn" href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
                    <td><a href="{{route('replies.show',$comment->id)}}">Replies</a></td>
                    <td>
                        @if($comment->is_active ==1)
                            {!! Form::model($comment,['method'=>'POST','action'=>['PostCommentsController@update',$comment->id]]) !!}
                            @csrf
                            @method("PATCH")
                            <input type="hidden" name="is_active" value="0">
                            {!! Form::submit('Un-Approve',['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}

                        @else
                            {!! Form::model($comment,['method'=>'POST','action'=>['PostCommentsController@update',$comment->id]]) !!}
                            @csrf
                            @method("PATCH")
                            <input type="hidden" name="is_active" value="1">
                            {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        <a href="{{route('restore.comment',$comment->id)}}"><button class="btn btn-success" >Restore</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else

        <h1 class="text-center">No Comments</h1>
    @endif

@endsection