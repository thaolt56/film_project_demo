<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{   
    protected $table= 'ratings';
    protected $fillable = [
        'movie_id', 'rating', 'ip-address'
    ];
    
}
