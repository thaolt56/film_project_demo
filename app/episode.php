<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class episode extends Model
{
    protected $fillable = [
        'movie_id','link_movie','season'
    ];

    
    function episode_mov(){
        return $this->belongsTo('App\movie','movie_id');
    }
}
