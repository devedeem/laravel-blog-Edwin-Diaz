<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentReply extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [

        'comment_id',
        'file',
        'is_active',
        'author',
        'email',
        'body'
    ];

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

}
