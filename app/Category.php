<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'description', 'status','slug'
    ];
    function movie_cat(){
        return $this->hasMany('App\movie','category_id');
    }
}
