@extends('layouts.admin')

@section('content')
    @if(count($users))
        <h1 class="text-danger">Trash Items</h1>
    @else
        <h1 class="alert-danger text-center">No Trash Item</h1>
    @endif
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id <i class="fa fa-arrow-up"></i></th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created_At</th>
            <th>Deleted_At</th>
            <th><i class="fa text-success"></i></th>
            <th><i class="fa text-danger"></i></th>
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
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->deleted_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('user.restore',$user->id)}}">
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