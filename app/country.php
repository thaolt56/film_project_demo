<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $fillable = [
        'title', 'description', 'status','slug'
    ];
}
