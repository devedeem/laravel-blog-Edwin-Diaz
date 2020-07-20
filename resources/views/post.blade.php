@extends('layouts.blog-post')
@section('content')
    @if(Session::has('reply-comment'))
        <div class="alert alert-success">
            {{session('reply-comment')}}
        </div>
    @endif
    <a href="{{route('/')}}">Home <i class="fa fa-angle-right"></i></a><span class="text-light">Post</span>
    <!-- Blog Post -->
    <!-- Title -->
    <h1>{{$post->title}}</h1>
    <!-- Author -->
    <p class="lead">
        by
    <div class="user-pic"><img class="fa fa-user" src="{{!empty($post->user->photo)? $post->user->photo->file:'You have No profile pic'}}" alt=""></div>
    <a href="#" class="lead">{{$post->user->name}}</a>
    </p>
    <hr>
    <!-- Date/Time -->
    <p><span class="far fa-clock-o"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
    <hr>
    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">
    <hr>
    <!-- Post Content -->
    <p class="lead "><b><h2>{!! Str::limit($post->body,50) !!}??</h2></b></p>
{{--    <p class="text-justify">{{$post->body}}</p>--}}
    <div class="container col-sm-12">
        <p>
            {!! $post->body !!}
        </p>
    </div>
    <br>
    <hr>
<div >    <!-- Blog Comments -->
    <!-- Comments Form -->
    @if(Auth::check())
        <div class="well">
            @if(Session::has('comment'))
                <div class="alert alert-success">
                    {{session('comment')}}
                </div>
            @endif
            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store','class'=>'form-group  mx-auto']) !!}
            <div class="form-group">
                <div class="form-group">
                    <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control">
                </div>
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
            </div>
            {!! Form::submit('Comment',['class'=>'btn btn-outline-dark']) !!}
            {!! Form::close() !!}
        </div>
    @else
        <h3>Leave Feedback or Comment</h3>
        <a class="btn btn-default" href="{{ route('register') }}">{{ __('Register') }}</a>
        <a class="btn btn-default" href="{{ route('login') }}">{{ __('Login') }}</a>
    @endif
    <hr>
    <!-- Posted Comments -->
    <!-- Comment -->
    @if(count($comments)>0)
        @foreach($comments as $comment)
            @if($comment->is_active==1)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="64" class="media-object rounded" src="{{$comment->file}}" alt="">
                    </a>
                    <div class="media-body">


                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        <p> {{$comment->body}}</p>


                    @if(count($comment->replies)>=0)
                        @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)
                                <!-- Nested Comment -->
                                    <div class="media" >
                                        <a class="pull-left" href="#">
                                            <img height="64" src="{{$reply->file}}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$reply->author}}
                                                <small>{{$reply->created_at->diffForHumans()}}</small>
                                            </h4>
                                            <p>
                                                {{$reply->body}}
                                            </p>
                                        </div>
                                    </div>
                                    <!-- End Nested Comment -->
                                @endif
                            @endforeach
                        @endif
                        @if(Auth::check())

                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply','class'=>'form-group  mx-auto',]) !!}
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}" class="form-control">
                                </div>
                                {!! Form::label('body','Reply:') !!}
                                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                            </div>
                            {!! Form::submit('Reply',['class'=>'btn btn-outline-dark']) !!}
                            {!! Form::close() !!}

                        @else
                            <h3>Reply Comment</h3>
                            <a class="btn btn-default" href="{{ route('register') }}">{{ __('Register') }}</a>
                            <a class="btn btn-default" href="{{ route('login') }}">{{ __('Login') }}</a>

                        @endif
                    </div>



                </div>
            @endif
        @endforeach
    @endif

</div>
@endsection

@section('categories')
    @if(count($categories)>0)
        @foreach($categories as $category)
            <li>
                <a href="#">{{$category->name}}</a>
            </li>
        @endforeach
    @endif

@endsection
