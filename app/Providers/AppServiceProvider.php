<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\genre;
use App\country;
use App\movie;
use App\Info;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   $info_web = Info::find(3);
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
        $list_film_hot = movie::where('film_hot',1)->where('status',1)->whereNotIn('resolution',[5])->latest()->take(5)->get();
        $day_top_views = movie::where('top_views',1)->where('status',1)->whereNotIn('resolution',[5])->latest()->take(5)->get();
        $week_top_views = movie::where('top_views',2)->where('status',1)->whereNotIn('resolution',[5])->latest()->take(5)->get();
        $month_top_views = movie::where('top_views',3)->where('status',1)->whereNotIn('resolution',[5])->latest()->take(5)->get();
        $list_genre = genre::all();
        $list_country =country::all();
        $list_trailer = movie::where('status', 1)->where('resolution',5)->get();
        view::share(compact('list_genre','list_country','list_trailer','list_film_hot',
        'list_resolution','info_web','day_top_views','week_top_views','month_top_views'));
        
    }
}
