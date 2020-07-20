<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{

    use SoftDeletes;



    protected $directory = '/users/profile/';

    //
    protected $fillable = ['file'];



    public function user()
    {
        return $this->hasone('App\User');
    }

    public function getFileAttribute($photo)
    {
            return $this->directory .$photo;
    }
}
