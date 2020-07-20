<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name'];


    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function setNameAttribute($name)
    {
        return $this->attributes['name']= strtoupper($name);
    }

    public function getNameAttribute($name)
    {
        return $this->attributes['name']= strtoupper($name);
    }
}
