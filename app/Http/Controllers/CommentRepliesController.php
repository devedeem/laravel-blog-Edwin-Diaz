<?php

namespace App\Http\Controllers;


use App\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function createReply(Request $request)
    {
        //
        //
        $user = Auth::user();

        $data = [
            'file' => $user->photo->file,
            'comment_id'=>$request->comment_id,
            'author'=>$user->name,
            'email'=>$user->email,
            'body'=>$request->body,
        ];

        CommentReply::create($data);
        $request->session()->flash('reply-comment','Your reply has been sent successfully');
        return redirect()->back();
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
        $replies = CommentReply::where('comment_id',$id)->get();

        return view('admin.comments.replies.show',compact('replies'));

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
        $reply = CommentReply::findOrFail($id);
        if ($request->is_active ==1)
        {
            Session::flash('approved','Reply has been published');
        }
        else{
            Session::flash('remove','Reply has been removed');
        }

        $reply->update($request->all());

        return redirect('admin/comments/');
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
        return "this is wokkindg";
    }
}
