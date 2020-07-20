@extends('layouts.admin')

@section('content')
    @if(count($posts))
        <h1>Posts</h1>
    @else
        <h1 class="alert-danger text-center"> There is no item</h1>


    @endif
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
            <th>Created_at</th>
            <th>Deleted_at</th>
            <th><i class="fa text-success"></i></th>
            <th><i class="fa text-danger"></i></th>
        </tr>
        </thead>
        <tbody>

        @if(count($posts))
            @foreach($posts as $post)
                <tr>
                    <td><a href="{{route('posts.edit',$post->id)}}"><i class="fa fa-edit text-info" data-toggle="tooltip" title="Edit Post"></i></a></td>
                    <td>{{$post->id}}</td>
                    <td><img height="100" src="{{$post->photo ? $post->photo->file :'http://placehold.it/400*400'}}" alt=""></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->title}}</td>
                    <td data-toggle="tooltip" title="{{$post->body}}">{{Str::limit($post->body , 10)}}</td>
                    <td>{{$post->created_at ? $post->created_at->diffForhumans():'Null'}}</td>
                    <td>{{$post->deleted_at ? $post->deleted_at->diffForhumans():'Null'}}</td>
                    <td>
                        <a href="{{route('posts.restore',$post->id)}}">
                            <i class="fa text-success" data-toggle="tooltip" title="Restore"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('/error')}}">
                            <i class="fa text-danger"  data-toggle="tooltip" title="Delete Permanently"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

        @endif

        </tbody>
    </table>



@endsection