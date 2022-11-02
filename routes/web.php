<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\paymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect()->route('login');
// });

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/admin', 'DashboardController@show')->name('dashboard');
    Route::get('/dashboard', 'DashboardController@show')->name('dashboard');

    Route::namespace('admin')->group(function () {
        Route::get('/category/list', 'CategoriesController@list')->name('category.list');
        Route::get('/category/add', 'CategoriesController@add')->name('category.add');
        Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
        Route::get('/category/delete/{id}', 'CategoriesController@delete')->name('category.delete');
        Route::post('/category/store', 'CategoriesController@store')->name('category.store');
        Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');
        //ajax category
        Route::get('/category_choose','CategoriesController@ajax')->name('category.choose');

        Route::get('/genre/list', 'GenreController@list')->name('genre.list');
        Route::get('/genre/add', 'GenreController@add')->name('genre.add');
        Route::get('/genre/edit/{id}', 'GenreController@edit')->name('genre.edit');
        Route::get('/genre/delete/{id}', 'GenreController@delete')->name('genre.delete');
        Route::post('/genre/store', 'GenreController@store')->name('genre.store');
        Route::post('/genre/update/{id}', 'GenreController@update')->name('genre.update');

        Route::get('/country/list', 'CountryController@list')->name('country.list');
        Route::get('/country/add', 'CountryController@add')->name('country.add');
        Route::get('/country/edit/{id}', 'CountryController@edit')->name('country.edit');
        Route::get('/country/delete/{id}', 'CountryController@delete')->name('country.delete');
        Route::post('/country/store', 'CountryController@store')->name('country.store');
        Route::post('/country/update/{id}', 'CountryController@update')->name('country.update');
        //ajax country
        Route::get('/country_choose','CountryController@ajax')->name('country.choose');

        Route::get('/movie/list', 'MovieController@list')->name('movie.list');
        Route::get('/movie/add', 'MovieController@add')->name('movie.add');
        Route::get('/movie/edit/{id}', 'MovieController@edit')->name('movie.edit');
        Route::get('/movie/delete/{id}', 'MovieController@delete')->name('movie.delete');
        Route::post('/movie/store', 'MovieController@store')->name('movie.store');
        Route::post('/movie/update/{id}', 'MovieController@update')->name('movie.update');
         //ajax film_hot
         Route::get('/film_choose','MovieController@ajax')->name('film_hot.choose');
         Route::get('/top_views','MovieController@ajax_top_views')->name('top_views.choose');
         //change image by ajax
         Route::post('/change_image','MovieController@change_image_ajax')->name('change-image-ajax');
         //ajax movie_episode_admin
         Route::post('/movie_episode_admin','MovieController@movie_episode_ajax')->name('movie_episode_admin'); 

        Route::get('episode/add','episodeController@index')->name('episode.index');
        Route::get('episode/list/{id}','episodeController@list')->name('episode.add_list');
        Route::get('episode/edit/{id}','episodeController@edit')->name('episode.edit');
        Route::get('/episode/delete/{id}','episodeController@delete')->name('episode.delete');
        Route::get('/episode_select','episodeController@episode_select')->name('episode_select');
        Route::post('/store/{id}','episodeController@store')->name('episode.store');
        Route::post('/episode/update/{id}','episodeController@update')->name('episode.update');

        //info web
        Route::get('/info/add','InfoController@add')->name('info.add');
        Route::get('/info/list','InfoController@list')->name('info.list');
        Route::get('/info/delete/{id}','InfoController@delete')->name('info.delete');
        Route::post('/info/store','InfoController@store')->name('info.store');

        
    });
  
});
//giao dien nguoi dung

Route::namespace('user')->group(function () {
    Route::get('/','HomeController@index')->name('user.home');
    Route::get('/danh-muc','HomeController@category')->name('user.category');
    Route::get('/quoc-gia/{slug}','HomeController@country')->name('user.country');
    Route::get('/the-loai/{slug}','HomeController@genre')->name('user.genre');
    Route::get('/phim-le','HomeController@odd_movie')->name('user.odd_movie');
    Route::get('/phim-moi','HomeController@new_movie')->name('user.new_movie');
    Route::get('/phim-bo','HomeController@series_movie')->name('user.series_movie');
    Route::get('/chieu-rap','HomeController@theater_movie')->name('user.theater_movie');
    Route::get('/phim/{slug}','HomeController@movie')->name('user.movie');
    Route::get('/xem-phim/{slug}/{season}','HomeController@watch')->name('user.watch');
    Route::get('/year/{y}','HomeController@year')->name('user.year');
    Route::post('/search','HomeController@search')->name('movie.search');
    Route::post('/add-rating','HomeController@add_rating')->name('add-rating');

    Route::get('/loc-phim','HomeController@filter')->name('user.filter');
  
});


