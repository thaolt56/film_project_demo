<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Info;
class InfoController extends Controller
{   
    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' =>'info']);
            return $next($request);
        });
    }

    function add(){
       return view('admin.Info.add');
    }
    function list(){
       $info = Info::paginate(10); 
       return view('admin.Info.list',compact('info'));
    }
    function store(Request $req){
        // dd($req->input());
        $req->validate(
            [
                'title' => 'required|min:3|max:255|unique:infos',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'description' => 'required',
                'copy_right' => 'required',

            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhât :min kí tự ',
                'max' => ':attribute có độ dài nhiều nhất :max kí tự',
                'unique' => ':attribute đã tồn tại trong hệ thống!',
                'image' => ':attribute Không đúng dịnh dạng ảnh',
            ],
            [
                'title' => 'Tiêu đề',
                'image' => 'Ảnh',
                'description' => 'Nội dung',
                'copy_right' => 'Copy_right',

            ]
        );
         // validation -> image
         if ($req->hasFile('image')) {
            $file = $req->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move('public/upload/movie_images', $file_name);
            $path_image = 'upload/movie_images/' . $file_name;
        }

        Info::create([
            'title' => $req->input('title'),
            'description' => $req->input('description'),
            'logo' => $path_image,

            'copy_right' => $req->input('copy_right'),

        ]);

        return redirect()->route('info.list')->with('status','Bạn đã thêm thông tin thành công!');
    }

    function delete($id){
        
        Info::where('id',$id)->delete();
        return redirect()->route('info.list')->with('status','Bạn đã del thông tin thành công!');
    }
}
