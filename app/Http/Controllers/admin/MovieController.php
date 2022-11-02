<?php


namespace App\Http\Controllers\admin;

use App\country;
use App\genre;
use App\Category;
use App\episode;
use App\movie;
use App\movie_genre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{   
    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' =>'movie']);
            return $next($request);
        });
    }
    function list()
    {   
        $list_category = Category::all();
        $list_country = country::all();
        $list_movie = movie::withCount('mov_episode')->latest()->paginate('20');
        
        return view('Admin.Movie.list', compact('list_movie','list_category','list_country'));
    }

    function add()
    {
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam', 'Trailer'];
        $list_country = country::all();
        $list_genre = genre::all();
        $list_category = Category::all();

        return view('Admin.Movie.add', compact('list_country', 'list_genre', 'list_category', 'list_resolution'));
    }
    function store(Request $req)
    {   
        // dd($req->input());
       $genre =  $req->input('genre');
     
        $req->validate(
            [
                'title' => 'required|string|unique:movies|max:255',
                'name_eng' => 'required',
                'slug' => 'required',
                'time' => 'required',
                'desc' => 'required',

                'status' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'category' => 'required',
                'country' => 'required',
                'genre' => 'required',
                'film_hot' => 'required',
                'status' => 'required',
                'resolution' =>'required',
                'sub' => 'required',
                'year' =>'required',
                
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute có độ dài nhiều nhất :max kí tự hoặc (Kb)',
                'unique' => ':attribute đã tồn tại trong hệ thống!',
                'image' => ':attribute Không đúng dịnh dạng ảnh',
                // 'image_detail' => ':attribute Không đúng dịnh dạng ảnh',
            ],
            [
                'title' => 'Tên phim',
                'slug' => 'slug',
                'desc' => 'Mô tả ngắn phim',
                'status' => 'Trạng thái',
                'category' => 'Danh mục',
                'country' => 'Quốc gia',
                'genre' => 'Thể loại',
                'image' => 'Ảnh',
                'film_hot' => 'Phim hot',
                'name_eng' => 'Tên phim tiếng anh',
                'resolution' =>'Phân giải',
                'sub' => 'sub',
                'year' =>'Năm',
                'time' =>'Thời gian phim',
                'season' =>'Tập phim',
                'trailer' =>'trailer',
               
            ]
        );

        // validation -> image
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move('public/upload/movie_images', $file_name);
            $path_image = 'upload/movie_images/' . $file_name;
        }


       $movie =  movie::create([
            'title' => $req->input('title'),
            'name_eng' => $req->input('name_eng'),
            'slug' => $req->input('slug'),
            'top_views' => $req->input('top_views'),
            'time_movie' => $req->input('time'),
            'description' => $req->input('desc'),
            'tags' => $req->input('tags'),
            'status' => $req->input('status'),
            'movie_image' =>  $path_image,
            'category_id' => $req->input('category'),
            'country_id' => $req->input('country'),
            'genre_id' => $genre[0],
            'film_hot' => $req->input('film_hot'),
            'resolution' =>$req->input('resolution'),
            'sub' => $req->input('sub'),
            'year' => $req->input('year'),
            'episode' => $req->input('episode'),
            'trailer' => $req->input('trailer'),
            'count_views' => rand(10,999),
        ]);
        $movie->mov_genre()->attach($genre);
        return redirect()->route('movie.list')->with('status', 'Bạn thêm mới phim thành công');
    }

    function delete(Request $req)
    {
        $id =  $req->id;
        $movie = movie::find($id);

        $image_path = $movie->movie_image;
        // if (isset($image_path)) {
        //     unlink('public/' . $image_path);
        // }
        movie::find($id)->delete();

        return redirect()->route('movie.list')->with('status', 'Bạn đã xóa phim thành công');
    }

    function edit(Request $req)
    {
        $id = $req->id;
        $movie = movie::find($id);
        $list_country = country::all();
        $list_genre = genre::all();
        
        $genres = $movie->mov_genre;
        
         $list_category = Category::all();
        $list_resolution = ['SD', 'HD', 'FullHD', 'Cam', 'HDCam'];
        return view('Admin.Movie.update', compact('movie', 'list_category', 'list_country', 'list_genre','list_resolution','genres'));
    }

    function update(Request $req)
    {
        $id = $req->id;
        $movie_update = movie::find($id);
        $genre =  $req->input('genre');
        $req->validate(
            [
                'title' => 'required|string|unique:movies,title,' . $id . ',id|max:255',
                'name_eng' => 'required',
                'slug' => 'required',
                'time' => 'required',
                'desc' => 'required',

                'status' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'category' => 'required',
                'country' => 'required',
                'film_hot' => 'required',
                'genre' => 'required',
                'status' => 'required',
                'resolution' =>'required',
                'sub' =>'required',
                'year' =>'required',
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute có độ dài nhiều nhất :max kí tự hoặc (Kb)',
                'unique' => ':attribute đã tồn tại trong hệ thống!',
                'image' => ':attribute Không đúng dịnh dạng ảnh',
                // 'image_detail' => ':attribute Không đúng dịnh dạng ảnh',
            ],
            [
                'title' => 'Tên phim',
                'slug' => 'slug',
                'desc' => 'Mô tả ngắn phim',
                'status' => 'Trạng thái',
                'category' => 'Danh mục',
                'country' => 'Quốc gia',
                'genre' => 'Thể loại',
                'image' => 'Ảnh',
                'film_hot' => 'Phim hot',
                'name_eng' => 'Tên phim tiếng anh',
                'resolution' =>'Phân giải',
                'sub' => 'sub',
                'year' =>'Năm',
                'time' =>'Thời gian phim',
                'episode' =>'Tập phim',
                'trailer' =>'trailer',


            ]
        );

        if ($req->hasFile('image')) {
            unlink('public/' . $movie_update->movie_image);
            $file = $req->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move('public/upload/movie_images', $file_name);
            $path_image = 'upload/movie_images/' . $file_name;
        } else {
            $path_image = $movie_update->movie_image;
        }

       movie::where('id', $id)->update([
            'title' => $req->input('title'),
            'name_eng' => $req->input('name_eng'),
            'slug' => $req->input('slug'),
            'top_views' => $req->input('top_views'),
            'time_movie' => $req->input('time'),
            'description' => $req->input('desc'),
            'tags' => $req->input('tags'),
            'status' => $req->input('status'),
            'movie_image' =>  $path_image,
            'category_id' => $req->input('category'),
            'country_id' => $req->input('country'),
            'genre_id' => $genre[0],
            'film_hot' => $req->input('film_hot'),
            'resolution' =>$req->input('resolution'),
            'sub' =>$req->input('sub'),
            'year' =>$req->input('year'),
            'episode' =>$req->input('episode'),
            'trailer' =>$req->input('trailer'),
        ]);
        $movie_update->mov_genre()->sync($genre);//thao ra update lai
        return redirect()->route('movie.list')->with('status', 'Cập nhật phim thành công');
    }

    function ajax(){
        $movie_id = $_GET['movie_id'];
        $film_hot = $_GET['film_hot'];
        //update
        movie::where('id',$movie_id)->update([
            'film_hot'=>$film_hot
        ]);
        
    }
    function ajax_top_views(){
        $movie_id = $_GET['movie_id'];
        $top_views = $_GET['top_views'];
        //update
        movie::where('id',$movie_id)->update([
            'top_views'=>$top_views
        ]);
        
    }

    function change_image_ajax(Request $req){
        $movie_id = $req->movie_id;
        $file_image = $req->file('file');

        if($file_image){
            //xoa anh cu
            $movie = movie::find($movie_id);
            unlink('public/'.$movie->movie_image);

            //them anh moi
            $get_name_image = $file_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,999).'.'.$file_image->getClientOriginalExtension();
            $file_image->move('public/upload/movie_images', $new_image);

            movie::where('id', $movie_id)->update([
                'movie_image' => "upload/movie_images/".$new_image

            ]);

        }
       
    }

    function movie_episode_ajax(Request $req){
        $movie_id = $req->movie_id;
        $movie_episode = $req->movie_episode;
       
       
        $movie = movie::find($movie_id);
        $movie_watch = episode::where('movie_id',$movie_id)->where('season',$movie_episode)->first();

        
        $out_put = [
            'title' => $movie->title.'--Tập '.$movie_episode,
            
            'desc' => $movie->description,
            'video' => $movie_watch->link_movie
        ];
      
    //    echo json_encode($out_put); khong the chay
    return response()->json($out_put);


    }
}
