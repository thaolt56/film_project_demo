@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
       
        <div class="card-header font-weight-bold">
            Thêm thể loại phim
        </div>
        <div class="card-body">
            <form action="{{route('genre.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="slug">Tên thể loại</label>
                    <input class="form-control" type="text" name="title" id="slug" onkeyup="ChangeToSlug()">
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input class="form-control" type="text" name="slug" id="convert_slug">
                    @error('slug')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Nội dụng thể loại</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                    @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="0" >
                        <label class="form-check-label" for="exampleRadios1">
                          Chờ duyệt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="1" checked>
                        <label class="form-check-label" for="exampleRadios2">
                          Công khai
                        </label>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>


@endsection
