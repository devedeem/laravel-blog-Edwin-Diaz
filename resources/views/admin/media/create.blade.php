@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
@endsection
@section('content')
<h1>Upload Media</h1>
{!! Form::open(['method'=>'POST','action'=>'AdminMediaController@store','class'=>'form-group w-50 mx-auto dropzone']) !!}

{!! Form::close() !!}



@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>

@endsection