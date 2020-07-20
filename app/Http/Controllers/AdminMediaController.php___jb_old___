<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    //

    public function index()
    {
        $photos = Photo::all();

        return view('admin.media.index' , compact('photos'));

    }


    public function create()
    {
        return view('admin.media.create');
    }


    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = time().$file->getClientOriginalName();

        $file->move('users/profile', $name);

        Photo::create(['file'=>$name]);

        return redirect('admin/media');
    }


    public function show($id)
    {
        $photo = Photo::findOrFail($id);

        return view('admin.media.index', compact('photo'));
    }

    public function destroy($id)
    {

        $photo = Photo::findOrFail($id);
        $photo->delete();

    }




    public function deleteMedia(Request $request)
    {
//        return "this works";
//        dd($request);

        if (isset($request->delete_single))
        {
            $this->destroy($request->photo);

            return redirect()->back();
        }

        if (isset($request->delete_all) && !empty($request->checkBoxArray))
        {
            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo)
            {
                $photo->delete();
            }

            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }






    }

}
