<?php

namespace App\Http\Controllers\admin;

use App\country;
use App\movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{   
    function __construct()
    {
        $this->middleware(function($request, $next){
            session(['module_active' =>'country']);
            return $next($request);
        });
    }

    function  list()
    {
        $country = country::latest()->paginate('10');

        return view('Admin.country.list', compact('country'));
    }

    function  add()
    {
        return view('Admin.country.add');
    }


    function store(Request $req)
    {
        $req->validate(
            [
                'title' => 'required|min:3|max:255|unique:countries',
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
        country::create(
            [
                'title' => $req->input('title'),
                'slug' => $req->input('slug'),
                'description' => $req->input('description'),
                'status' => $req->input('status'),
            ]
        );

        return redirect()->route('country.list')->with('status', 'Bạn đã thêm tên quốc gia thành công!');
    }


    function edit(Request $req)
    {
        $id = $req->id;
        $item_country = country::find($id);
        return view('Admin.country.update', compact('item_country'));
    }


    function delete(Request $req)
    {
        $id = $req->id;
        country::destroy($id);
        return redirect()->route('country.list')->with('status', 'Đã xóa quốc gia thành công!');
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

       country::where('id',$id)->update([
        'title' => $req->input('title'),
        'slug' => $req->input('slug'),
        'description' => $req->input('description'),
        'status' => $req->input('status')

       ]);
       return redirect()->route('country.list')->with('status', 'Đã cập nhật thành công');
    }

    function ajax(){
        $movie_id = $_GET['movie_id'];
        $country_id = $_GET['country_id'];
        //update
        movie::where('id',$movie_id)->update([
            'country_id'=>$country_id
        ]);
        
    }
}
