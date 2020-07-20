@extends('layouts.admin')

@section('content')
    @if(Session::has('restore_post'))

        <div class="alert alert-success">
            {{Session('restore_post')}}
        </div>

    @endif
    @if(Session::has('trash_post'))

        <div class="alert alert-danger">
            {{Session('trash_post')}}
        </div>

    @endif

    @if(Session::has('update_post'))

        <div class="alert alert-success">
            {{Session('update_post')}}
        </div>

    @endif


<h1>Posts</h1>









        <table class="table table-hover">
            <thead>
            <tr>

                <th><i class="fa fa-edit text-info"></i></th>
                <th>Post_id<i class="fa fa-arrow-up"></i></th>
                <th>Photo_id</th>
                <th>User_id</th>
                <th>Category_id</th>
                <th>Title</th>
                <th>Body</th>
                <th>View Post</th>
                <th>View Comments</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            @if(count($posts)>0)
                @foreach($posts as $post)
                    <tr>

                        <td><a href="{{route('posts.edit',$post->id)}}"><i class="fa fa-edit text-info" data-toggle="tooltip" title="Edit Post"></i></a></td>
                        <td>{{$post->id}}</td>
                        <td><img height="50" src="{{$post->photo ? $post->photo->file :'http://placehold.it/400*400'}}" alt=""></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category ? $post->category->name:""}}</td>
                        <td>{{$post->title}}</td>
                        <td data-toggle="tooltip" title="{{$post->body}}">{{Str::limit($post->body , 10)}}</td>
                        <td><a href="{{route('home.post',$post->slug)}}">view post</a></td>
                        <td><a href="{{route('comments.show',$post->id)}}">view comments</a></td>
                        <td>{{$post->created_at ? $post->created_at->diffForhumans():'Null'}}</td>
                        <td>{{$post->updated_at ? $post->updated_at->diffForhumans():'Null'}}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id],'class'=>'form-group w-50 mx-auto']) !!}
                            {!! Form::submit('',['class'=>'btn fa text-danger', 'data-toggle'=>'tooltip', 'title'=>'Move To Trash']) !!}
                            {!! Form::close() !!}
                        </td>

                    </tr>
                @endforeach

            @endif

            </tbody>
        </table>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
{{--<div class="col-md-8 offset-5 mx-auto ">--}}
{{--    {{$posts->render()}}--}}
{{--</div>--}}


@endsection