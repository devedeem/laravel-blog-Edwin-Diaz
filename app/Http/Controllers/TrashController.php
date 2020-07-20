<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    //

    public function trashcomments()
    {
        $comments = Comment::onlyTrashed()->get();
        return view('trash.comments.index',compact('comments'));
    }

    public function restorecomment($id)
    {
        Comment::withTrashed()->whereId($id)->restore();
        return redirect('admin/comments');
    }






}
