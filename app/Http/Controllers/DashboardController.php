<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use App\genre;
use App\Category;

use App\movie;
use App\movie_genre;

class DashboardController extends Controller
{   
    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' =>'dashboard']);
            return $next($request);
        });
    }
    function show(){
        $count_category = Category::all()->count();
        $count_genre = genre::all()->count();
        $count_country = country::all()->count();
        $count_movie = movie::where('status',1)->count();
        
        $list_movie_top = movie::where('status',1)->orderBy('count_views','DESC')->take(10)->get();
      
        return view('Admin.Dashboard',compact('count_category','count_country','count_movie','count_genre','list_movie_top'));
    }
}
