<?php

namespace App;


use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //

    use Sluggable;

    use SluggableScopeHelpers;


    use SoftDeletes;


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'

            ]
        ];
    }





    protected $fillable = [

        'user_id',
        'category_id',
        'photo_id',
        'title',
        'body'


    ];




    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }




}
