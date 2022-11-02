<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\movie;
use App\genre;
use App\country;
use App\Category;
use App\movie_genre;
use App\episode;
use App\rating;
use App\Info;
use DB;

class HomeController extends Controller
{
    function index()
    {   $meta_title = Info::find(3)->title;
        $meta_description = Info::find(3)->description;

        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $film_hot = movie::where('film_hot', 1)->where('status', 1)->withCount('mov_episode')->latest()->get();
        $category = Category::with( //dung nested trong laravel
            ['movie_cat' => function ($q) {
                $q->withCount('mov_episode');
            }]
        )->where('status', 1)->get();
        // dd($category);
        return view('user.index', compact('film_hot', 'category', 'list_resolution', 'list_sub','meta_title','meta_description'));
    }

    function category()
    {
        return view('user.category');
    }

    function country($slug)
    {
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
        $country = country::where('slug', $slug)->first();
        $movie_country = movie::where('country_id', $country->id)->where('status',1)->withCount('mov_episode')->latest()->paginate('10');
        
        $meta_title = $country->title;
        $meta_description = $country->description;
        return view('user.country', compact('country','movie_country','list_resolution','list_sub','meta_title','meta_description'));
    }

    function genre($slug)
    {   
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
        $genre = genre::where('slug', $slug)->first();
        $genre_id = $genre->id;

        $meta_title ='Phim '. $genre->title;
        $meta_description = $genre->description;
       
        $movie_genre = movie_genre::where('genre_id', $genre_id)->get();
        $list_movie_id = [];
        foreach ($movie_genre as $item) {
            $list_movie_id[] = $item->movie_id;
        }
        $list_movie = movie::whereIn('id', $list_movie_id)->where('status',1)->withCount('mov_episode')->latest()->paginate('10');
        // dd($list_movie);
        return view('user.genre', compact('genre', 'list_resolution', 'list_sub','list_movie','meta_title','meta_description'));
    }
    function year($y)
    {   
        $meta_title = 'Phim năm:'.$y;
        $meta_description = 'Phim năm:'.$y;

        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $list_movie_year = movie::where('year', $y)->where('status',1)->withCount('mov_episode')->latest()->paginate(16);
        // dd($list_movie_year);
        return view('user.year', compact('list_movie_year', 'y','list_sub','list_resolution','meta_title','meta_description'));
    }
    function movie($slug)
    {
        $film_hot = movie::where('film_hot', 1)->where('status', 1)->latest()->get();
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
        $movie = movie::withCount('mov_episode')->where('status', 1)->where('slug', $slug)->first();
        $movie_id = $movie->id;

        $meta_title = 'Phim: '.$movie->title;
        $meta_description = 'Phim: '. $movie->description;

        $list_episode = episode::where('movie_id', $movie_id)->orderBy('season', 'ASC')->get();
        $list_season_current = [];
        foreach ($list_episode as $episode) {
            $list_season_current[] = $episode->season;
        }
        
        $rating = rating::where('movie_id',$movie_id)->avg('rating');
        $rating = round($rating);
        $count_rating = rating::where('movie_id',$movie_id)->count();
        $count_views = $movie->count_views;
        $count_views = $count_views + 1;
        movie::where('id',$movie_id)->update(['count_views'=>$count_views]);//cap nhat count_views vao database
       
        $list_related = movie::where('country_id', $movie->country_id)->where('slug','!=',$slug)->inRandomOrder()->limit(10)->get();
        return view('user.movie', compact('movie', 'list_related', 
        'list_resolution', 'list_sub', 'film_hot', 'movie_id', 
        'list_season_current','rating','count_rating','meta_title','meta_description',
    ));
    }
    function watch($slug,$season)
    {   
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
        $film_hot = movie::where('film_hot', 1)->where('status', 1)->latest()->get();
        $e = substr($season,4,10);//tap phim
        
        $movie_watch = movie::where('status', 1)->where('slug', $slug)->first();
        $meta_title = 'Xem phim: '.$movie_watch->title;
        $meta_description = 'Xem phim: '. $movie_watch->description;

        $movie_id = $movie_watch->id;
        $list_episode = episode::where('movie_id', $movie_id)->orderBy('season', 'ASC')->get();
        $watch_season = episode::where('movie_id',$movie_id)->where('season',$e)->first();

        $list_related = movie::where('genre_id', $movie_watch->genre_id)->whereNotIn('slug', [$slug])->inRandomOrder()->limit(10)->get();

        return view('user.watch', compact('movie_watch','list_resolution', 'list_sub','film_hot', 'list_related', 'list_episode','watch_season','e','meta_title','meta_description',));
    }

    function search(Request $req)
    {
        if ($req->ajax()) {
            $key = $req->get('key');
            $search_movie = movie::where('title', 'LIKE', '%' . $key . '%')->take(5)->get();

            return view('user.search', compact('search_movie',));
        }
    }


    function odd_movie(){
        $meta_title = 'Xem phim lẻ';
        $meta_description = 'Xem phim lẻ';
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
       
        $list_movie_odd = movie::where('episode',1)->where('status',1)->withCount('mov_episode')->latest()->paginate(16);
       
      return view('user.odd_movie',compact('list_movie_odd','list_resolution','list_sub','meta_title','meta_description',));
    }

    function series_movie(){
        $meta_title = 'Xem phim bộ';
        $meta_description = 'Xem phim bộ';
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
       
        $list_movie_series = movie::where('episode','>',1)->where('status',1)->withCount('mov_episode')->latest()->paginate(16);
      
      return view('user.series_movie',compact('list_movie_series','list_resolution','list_sub','meta_title','meta_description',));
    }
    function theater_movie(){
        $meta_title = 'Xem phim chiếu rạp';
        $meta_description = 'Xem phim chiếu rạp';
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
       $cat_theater = Category::where('slug','chieu-rap')->where('status',1)->first();
       $cat_id = $cat_theater->id;

        $list_movie_theater = movie::where('category_id',$cat_id)->where('status',1)->withCount('mov_episode')->latest()->paginate(16);
      
      return view('user.theater_movie',compact('list_movie_theater','list_resolution','list_sub','meta_title','meta_description',));
    }
    function new_movie(){
        $meta_title = 'Xem phim mới';
        $meta_description = 'Xem phim mới';
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
        $list_new_movie = movie::where('status',1)->withCount('mov_episode')->latest()->paginate(16);
   
        return view('user.new_movie',compact('list_new_movie','list_resolution','list_sub','meta_title','meta_description',));
    }

    //loc phim
    function filter(Request $req){
        $meta_title = 'Lọc phim';
        $meta_description = 'Lọc phim';
        $list_sub = ['Thuyết minh', 'Phụ đề'];
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
       $sort = $_GET['sort'];
      $genre_filter = $_GET['genre'];
      $country_filter = $_GET['country'];
      $year_filter = $_GET['year'];
      if($sort=="" && $genre_filter=="" && $country_filter=="" && $year_filter==""){
        return redirect()->back();
      }else{
        $movie_filter=movie::withCount('mov_episode');
        if($sort){
            $movie_filter= $movie_filter->orderBy($sort,'ASC');
        }elseif($genre_filter){
            $movie_filter = $movie_filter->where('genre_id',$genre_filter);
        }elseif($country_filter){
            $movie_filter = $movie_filter->where('country_id',$country_filter);
        }elseif($year_filter){
            $movie_filter = $movie_filter->where('year',$year_filter);
        }
        $result = $movie_filter->paginate(12);
        return view('user.filter',compact('result','list_resolution','list_sub','genre_filter','meta_title','meta_description'));
       
      }
    

    }

    function add_rating(Request $req){
        $index = $req->input('index');
        $movie_id = $req->input('movie_id');
        //kiem tra da ton tai ip_address
        $ip_address = $req->ip();
        $count_ip = rating::where('movie_id',$movie_id)->where('ip-address',$ip_address)->count();
        if($count_ip == 0){
            //create vao rating table
            rating::create([
                'movie_id'=>$movie_id,
                'rating' =>$index,
                'ip-address' =>$ip_address,
            ]);

            echo 'done';
        }else{
            echo 'exist';
        }
    }
}
