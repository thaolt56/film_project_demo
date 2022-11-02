@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
       
        <div class="card-header font-weight-bold">
            Thêm thông tin web phim
        </div>
        <div class="card-body">
            <form action="{{route('info.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Tên web</label>
                    <input class="form-control" type="text" name="title">
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
              
                <div class="form-group">
                    <label for="description">Nội dụng thông tin</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                    @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Chọn ảnh logo web:</label>
                    <input type="file" class="form-control-file mb-2" id="image" name="image" value="">
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                @enderror
                </div>
                <div class="form-group">
                    <label for="copy_right">copy right@</label>
                    <input class="form-control" type="text" name="copy_right">
                    @error('copy_right')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                



                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>


@endsection
