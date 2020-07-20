<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Auth::user()->post()->get();
//        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();

        if ($file = $request->file('photo_id'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('users/profile', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']= $photo->id;
        }

        $user->post()->create($input);
        return redirect('admin/posts');

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
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $input = $request->all();


        if ($file = $request->file('photo_id'))
        {
            if(!empty($file))
            {
                $name = time().$file->getClientOriginalName();

                $file->move('users/profile', $name);

                $photo = Photo::create(['file'=>$name]);

                $input['photo_id']= $photo->id;

//                unlink(public_path().$post->photo->file);
            }

        }
        Auth::user()->post()->whereId($id)->first()->update($input);
        Session::flash('update_post','Post has been updated successfully');
        return redirect('admin/posts');

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

        $user = Auth::user();
//          Post::findOrFail($id)->delete();
        $user->post()->whereId($id)->delete();
        Session::flash('trash_post','Post has been moved to trash');
        return redirect('admin/posts');

//     ////////////   deleting photo of post  /////////////////////////////////

//        $user = Auth::user()->post()->findOrFail($id);
//
//        unlink(public_path().$post->photo->file);

//        $user->delete();


//        Session::flash('trash_post','Post has been moved to trash');

//        return redirect('admin/posts');


    }

    public function trash()
    {
        $user = Auth::user();

       $posts= $user->post()->onlyTrashed()->get();

        return view('trash.posts.index', compact('posts'));
    }

    public function restore($id)
    {
        $user = Auth::user();

        $user->post()->onlyTrashed()->whereId($id)->restore();
        Session::flash('restore_post','Post has been restored.');
        return redirect('admin/posts');
    }

    public function error()
    {
        return view('errors/404');
    }








}
