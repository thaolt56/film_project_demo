<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    protected $fillable = [
        'title', 'slug', 'description','country_id','category_id','genre_id','movie_image','status',
        'film_hot','name_eng','resolution','sub','year','time_movie','tags','episode','trailer','count_views',
        'top_views',
    ];

    function category_show(){
        return $this->belongsTo('App\Category','category_id');
    }
    function country_show(){
        return $this->belongsTo('App\country','country_id');
    }
    function genre_show(){
        return $this->belongsTo('App\genre','genre_id');
    }
    function mov_genre(){
        return $this->belongsToMany('App\genre','movie_genre','movie_id','genre_id');
    }
    function mov_episode(){
        return $this->hasMany('App\episode','movie_id');
    }

}
