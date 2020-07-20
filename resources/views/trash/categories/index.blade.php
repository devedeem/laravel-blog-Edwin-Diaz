@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    <div class="row">

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
                            <td><a href="{{route('categories.restore', $category->id)}}"><i class="fa text-success"></i></a></td>
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
        </div>

    </div>


@endsection