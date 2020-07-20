@extends('layouts.admin')

@section('content')

    @if(Session::has('delete_user'))

    <div class="alert alert-danger fa fa-warning">
        {{Session('delete_user')}}
    </div>

    @endif
    @if(Session::has('restore_user'))

        <div class="alert alert-success fa fa-check">
            {{Session('restore_user')}}
        </div>

    @endif
    @if(Session::has('updated'))

        <div class="alert alert-success fa fa-check">
            {{Session('updated')}}
        </div>

    @endif


    <h1>Users</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Id<i class="fa fa-arrow-up"></i></th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created_At</th>
            <th>Updated_At</th>
            <th><i class="fa fa-trash text-danger"></i></th>
        </tr>
        </thead>
    <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{route('users.edit',$user->id)}}"><div class="user-pic"><img class="fa fa-user" src="{{!empty($user->photo)? $user->photo->file:'You have No profile pic'}}" alt=""></div></a></td>
                    <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{!empty($user->role)? $user->role->name:'User has no Role'}}</td>
{{--                    <td>{{ !empty($user->role) ? $user->role->name:'no role slected' }}</td>--}}
                    <td>{{$user->is_active==1? 'active':'Offline'}}</td>
{{--                    <td>--}}
{{--                        @if($user->is_active==1)--}}
{{--                            Active--}}
{{--                        @else--}}
{{--                            Offline--}}
{{--                        @endif--}}

{{--                    </td>--}}
                    <td>{{$user->created_at ? $user->created_at->diffForHumans():'Null'}}</td>
                    <td>{{$user->updated_at ?$user->updated_at->diffForHumans():'Null'}}</td>
                    <td>
                            {!! Form::open(['method'=>'DELETE','action'=>['AdminUserController@destroy',$user->id]]) !!}
                            {!! Form::submit('',['class'=>'btn  fa fa-trash-alt text-danger','data-toggle'=>'tooltip','title'=>'Move To Trash']) !!}
                            {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
</table>





@endsection