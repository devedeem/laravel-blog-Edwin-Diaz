<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $users = User::all();
        return view('admin.users.index' ,compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //

        if(trim($request->password)=='')
        {
            $input = $request->except('password');
        }
        else
        {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }


        if ($file = $request->file('photo_id'))
        {
            $name = time().$file->getClientOriginalName();

            $file ->move('users/profile',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']= $photo->id;
        }

        User::create($input);

        return redirect('admin/users');


//        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        return view('admin.users.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::pluck('name','id')->all();
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user','roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //

        $user = User::findOrFail($id);

        if(trim($request->password)=='')
        {
            $input = $request->except('password');
        }
        else
        {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }


        if ($file = $request->file('photo_id')) {
            if (!empty($file)){
                $name = time() . $file->getClientOriginalName();
            $file->move('users/profile', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
//           unlink(public_path().$user->photo->file);
            }
        }

        $user->update($input);
        Session::flash('updated','User account has been updated successfully');
        return redirect('admin/users');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        User::findOrFail($id)->delete();
        Session::flash('delete_user','User has been moved to trash.');
        return redirect('admin/users');

        //deleting photos with user

//        $user = User::findOrFail($id);
//
//        unlink(public_path().$user->photo->file);
//        $user->delete();
//
//        Session::flash('delete_user','User has been moved to trash.');
//        return redirect('admin/users');



    }


    //trash retreiving

    public function trash()
    {
        $users = User::onlyTrashed()->get();

        return view('trash/users/index',compact('users'));
    }

    public function restore($id)
    {
//        return $id;
         User::onlyTrashed()->whereId($id)->restore();

        Session::flash('restore_user','User has been restored.');

         return redirect('admin/users');

    }

    public function error()
    {
        return view('errors/404');
    }




}
