<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $fillable = [
        'title', 'description', 'status','slug'
    ];
    function movie_genre(){
        return $this->hasMany('App\movie','genre_id');
    }
    function genre_mov(){
        return $this->hasMany('App\movie','movie_genre','movie_id','genre_id');
    }
}
