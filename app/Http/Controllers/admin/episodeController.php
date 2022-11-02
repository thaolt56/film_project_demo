<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\movie;
use App\episode;

class episodeController extends Controller
{
    // function index(){
    //     $list_movie = movie::latest()->get();
       
    //     return view('admin.episode.add',compact('list_movie'));
    // }

    // function episode_select(){
    //     $id = $_GET['id'];
    //     $movie = movie::find($id);
    //     $episode = $movie->episode;
    //     $out_put = ' <option value="">Chọn tập phim</option>';
    //     if($episode > 1){
    //         for($t=1; $t<=$episode; $t++){
    //             $out_put.= "<option value='$t'>Tập $t</option>";
    //         }
    //         echo $out_put;
    //     }
    //     else{
    //         $out_put.= "<option value='HD'>Tập HD</option>";
    //         $out_put.= "<option value='FullHD'>Tập FullHD</option>";
    //         $out_put.= "<option value='Cam'>Tập Cam</option>";
    //         $out_put.= "<option value='FullCam'>Tập FullCam</option>";
    //         echo $out_put;
    //     }
        
    // }

    function store(Request $req,$id){
      
             $req->validate(
            [
                'link_movie' => 'required',
                'season' => 'required'

            ],
            [
                'required' => ':attribute không được để trống',
             
            ],
            [
                'link_movie' => 'link phim',
                'season' => 'tập phim'
            ]
        );
        $season = $req->input('season');
        //kiem tra tap trung nhau
        $check_season = episode::where('movie_id',$id)->where('season',$season)->count();
        if($check_season == 0){
            episode::create(
                [
                    'movie_id' => $id,
                    'link_movie' => $req->input('link_movie'),
                    'season' => $req->input('season'),
                   
                ]
            );
           
            return redirect()->route('episode.add_list',$id)->with('status', 'Bạn đã thêm tập phim thành công!');
        }else{
            return redirect()->route('episode.add_list',$id)->with('status_error', 'Tập phim đã có, xin kiểm tra lại!');
        }
        
    }

    function list($id){
        $movie = movie::where('id',$id)->first();

        $episodes = episode::where('movie_id',$id)->get();
       
        return view('admin.episode.add_list',compact('episodes','movie'));
    }

    function edit($id){
        $episode = episode::where('id',$id)->first();
       $movie_id = $episode->movie_id;
      
       $movie = movie::where('id',$movie_id)->first();
      
       
      return view('admin.episode.edit',compact('movie_id','movie','id','episode'));
    }

    function update(Request $req){
        $id = $req ->id;
        $episode = episode::where('id',$id)->first();
        $movie_id = $episode->movie_id;
        
        $req->validate(
            [
              
                'link_movie' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',             
            ],
            [               
                'link_movie' => 'link phim',               
            ]
        );
        episode::where('id',$id)->update(
            [
                // 'movie_id' => $req->input('movie_id'),
                'link_movie' => $req->input('link_movie'),
                // 'season' => $req->input('season'),               
            ]
        );

        return redirect()->route('episode.add_list',$movie_id)->with('status', 'Bạn đã cập nhật thành công!');
    }

    function delete($id){
      
       episode::where('id',$id)->delete();
       return redirect()->back()->with('status', 'Bạn đã xóa thành công!');
    }

}