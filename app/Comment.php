<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [

        'file',
        'post_id',
        'is_active',
        'author',
        'email',
        'body',

    ];


    public function post()
    {
        return $this->belongsTo('App\Post');
    }


    public function replies()
    {
        return $this->hasMany('App\CommentReply');
    }





}
