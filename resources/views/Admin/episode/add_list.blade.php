
@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    
    @if (session('status'))
    <div class="alert alert-primary" role="alert">
        {{session('status')}}
    </div>
    @endif
    
    @if (session('status_error'))
    <div class="alert alert-warning" role="alert">
        {{session('status_error')}}
    </div>
    @endif
    <div class="card">
       
        <div class="card-header font-weight-bold">
           Thêm tập phim
        </div>
        <div class="card-body">
            <form action="{{route('episode.store',$movie->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="movie_id">Chọn phim</label>
                    <select disabled  class="form-control select_movie" id="movie_id" name="movie_id">
                        <option  value="{{$movie->id}}">{{$movie->title}}</option>
                    
                     
                    </select>
                    {{-- @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label for="link_movie">link phim</label>
                    <input class="form-control" type="text" name="link_movie" id="link_movie" value="">
                    {{-- @error('slug')
                    <small class="text-danger">{{$message}}</small>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label for="season">Chọn tập phim</label>
                    <select  class="form-control" id="season" name="season">
                        <option value="">Chọn tập phim</option>
                       @if ($movie->episode > 1)
                           @for($t=1;$t<=$movie->episode;$t++)
                            <option value='{{$t}}'>Tập {{$t}}</option>
                           @endfor
                       @else
                            <option value='HD'>Tập HD</option>
                            <option value='FullHD'>Tập FullHD</option>
                            <option value='Cam'>Tập Cam</option>
                            <option value='FullCam'>Tập FullCam</option>
                            
                       @endif
                    </select>
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm tập phim</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <span class="m-0 ">Chỉnh sửa tập phim: {{$movie->title}}</span>
            
            {{-- <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div> --}}
        </div>
        <div class="card-body">
         @if (isset($episodes))
         <table class="table table-striped table-checkall">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Ảnh đại diện</th>
                    <th scope="col">tập phim</th>
                    <th scope="col">link phim</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $t = 0;
                 ?>
               @foreach ($episodes as $item)
               <?php
               $t+=1;
                ?>
               <tr>
                <td>{{$t}}</td>
                <td>{{$item->episode_mov->title}}</td>
                <td><img width="60px" src="{{asset($item->episode_mov->movie_image)}}" alt=""></td>
                <td>{{$item->season}}</td>
                <td>{!!$item->link_movie!!}</td>
               
               
                <td>{{date('d/m/Y', strtotime($item->created_at))}}</td>
                <td>
                    <a href="{{route('episode.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="edit"><i class="far fa-eye"></i></a>
                    <a href="{{route('episode.delete',$item->id)}}" onclick="return confirm('Bạn có chắc xóa bản ghi này không?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
               @endforeach
               


            </tbody>
        </table>
         @else
         <td>Không tồn tại dữ liệu trang</td>
         @endif
        
         {{-- {{$episodes -> links()}} --}}
            
        </div>

        
    </div>
</div>

@endsection
