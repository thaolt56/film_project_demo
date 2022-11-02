<?php

namespace App\Http\Controllers\admin;


use App\Category;
use App\movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{   
    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' =>'category']);
            return $next($request);
        });
    }
    function  list()
    {
        $Category = Category::latest()->paginate('10');

        return view('Admin.category.list', compact('Category'));
    }

    function  add()
    {
        return view('Admin.category.add');
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
        Category::create(
            [
                'title' => $req->input('title'),
                'slug' => $req->input('slug'),
                'description' => $req->input('description'),
                'status' => $req->input('status'),
            ]
        );

        return redirect()->route('category.list')->with('status', 'Bạn đã thêm danh mục phim thành công!');
    }


    function edit(Request $req)
    {
        $id = $req->id;
        $item_category = Category::find($id);
        return view('Admin.category.update', compact('item_category'));
    }


    function delete(Request $req)
    {
        $id = $req->id;
        Category::destroy($id);
        return redirect()->route('category.list')->with('status', 'Đã xóa danh mục phim thành công!');
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

       Category::where('id',$id)->update([
        'title' => $req->input('title'),
        'slug' => $req->input('slug'),
        'description' => $req->input('description'),
        'status' => $req->input('status')

       ]);
       return redirect()->route('category.list')->with('status', 'Đã cập nhật thành công');
    }

    function ajax(){
        $movie_id = $_GET['movie_id'];
        $category_id = $_GET['category_id'];
        //update
        movie::where('id',$movie_id)->update([
            'category_id'=>$category_id
        ]);
        
    }
}
