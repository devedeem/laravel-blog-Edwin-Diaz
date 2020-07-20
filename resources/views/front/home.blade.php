@extends('layouts.blog-home')

@section('posts')
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Dashboard</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

@if(count($posts)>0)

     <div class="row">
         @foreach($posts as $post)
             <div class="col-md-6">
                 <div class="shadow p-5">
                     <h2>
                         <a href="{{route('home.post',$post->slug)}}">{{$post->title}}</a>
                     </h2>
                     <p class="lead">
                         by <a href="index.php">{{$post->user->name}}</a>
                     </p>
                     <p><span class="fa fa-clock-o"></span> Posted {{$post->created_at ?$post->created_at->diffForHumans():''}}</p>
                     <hr>
                     <img  height="200" src="{{$post->photo->file}}" alt="">
                     <hr>
                     <p class="text-justify">{!!str_limit($post->body ,200)  !!}</p>
                     <a class="btn btn-primary" href="{{route('home.post',$post->slug)}}">Read More <span class="fa fa-angle-right "></span></a>

                 </div>
             </div>

         @endforeach

     </div>
@endif

@endsection
