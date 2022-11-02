<?php

namespace App\Http\Controllers\admin;
use App\genre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' =>'genre']);
            return $next($request);
        });
    }

    function  list()
    {
        $genre = genre::latest()->paginate('5');

        return view('Admin.genre.list', compact('genre'));
    }


    function add(){
        return view('Admin.genre.add');
    }

    function store(Request $req)
    {
        $req->validate(
            [
                'title' => 'required|min:3|max:255|unique:categories',
                'description' => 'required',

            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhât :min kí tự ',
                'max' => ':attribute có độ dài nhiều nhất :max kí tự',
                'unique' => ':attribute đã tồn tại trong hệ thống!'
            ],
            [
                'title' => 'Tiêu đề',
                'description' => 'Nội dung'
            ]
        );
        genre::create(
            [
                'title' => $req->input('title'),
                'slug' => $req->input('slug'),
                'description' => $req->input('description'),
                'status' => $req->input('status'),
            ]
        );

        return redirect()->route('genre.list')->with('status', 'Bạn đã thêm thể loại phim thành công!');
    }

    function edit(Request $req)
    {
        $id = $req->id;
        $item_genre = genre::find($id);
        return view('Admin.genre.update', compact('item_genre'));
    }


    function delete(Request $req)
    {
        $id = $req->id;
        genre::destroy($id);
        return redirect()->route('genre.list')->with('status', 'Đã xóa thể loại phim thành công!');
    }

    function update(Request $req)
    {
        $id = $req->id;

        $req->validate(
            [
                'title' => 'required|min:3|max:255',
                'description' => 'required',

            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhât :min kí tự ',
                'max' => ':attribute có độ dài nhiều nhất :max kí tự',
                
            ],
            [
                'title' => 'Tiêu đề',
                'description' => 'Nội dung'
            ]
        );

       genre::where('id',$id)->update([
        'title' => $req->input('title'),
        'slug' => $req->input('slug'),
        'description' => $req->input('description'),
        'status' => $req->input('status')

       ]);
       return redirect()->route('genre.list')->with('status', 'Đã cập nhật thành công');
    }
}
