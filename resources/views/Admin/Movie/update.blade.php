@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chỉnh sửa phim
        </div>
        <div class="card-body">
            <form action="{{route('movie.update',$movie->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="slug">Tên phim</label>
                            <input class="form-control" type="text" name="title" id="slug" onkeyup="ChangeToSlug()" value="{{$movie->title}}">
                            @error('title')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_eng">Tên phim tiếng anh</label>
                            <input class="form-control" type="text" name="name_eng" id=""  value="{{$movie->name_eng}}">
                            @error('name_eng')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input class="form-control" type="text" name="slug" id="convert_slug" value="{{$movie->slug}}">
                            @error('slug')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="time">Thời gian phim</label>
                            <input class="form-control" type="text" name="time" id="time" value="{{$movie->time_movie}}">
                            @error('time')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="desc">Mô tả phim</label>
                            <textarea name="desc" class="form-control" id="desc" cols="30" rows="10">{{$movie->description}}</textarea>
                            @error('desc')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tags">Tags Phim</label>
                            <input class="form-control" type="text" name="tags" id="tags" value="{{$movie->tags}}">
                            @error('tags')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="trailer">Trailer Phim</label>
                            <input class="form-control" type="text" name="trailer" id="trailer" value="{{$movie->trailer}}">
                           
                            @error('trailer')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image">Chọn ảnh đại diện phim:</label>
                            <input type="file" class="form-control-file mb-2" id="image" name="image" value="{{asset($movie->movie_image)}}">
                            <img width="80px" src="{{asset($movie->movie_image)}}" alt="">
                            @error('image')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                       
                    </div>
                </div>
              
               

                <div class="form-group">
                    <label for="category">Danh mục phim</label>
                    <select class="form-control" id="category" name="category" value="{{old('category')}}">
                        <option value="">Chọn danh mục</option>
                        @if ($list_category)
                            @foreach ($list_category as $item)
                                <option @if ($movie->category_id == $item->id)
                                    {{"selected = 'selected'"}}
                                    @endif value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                        
                    @endif
                       
                       
                    </select>
                    @error('category')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="country">Quốc gia</label>
                    <select class="form-control" id="country" name="country" value="{{old('country')}}">
                        <option value="">Chọn quốc gia</option>
                        @if ($list_country)
                        @foreach ($list_country as $item)
                            <option @if ($movie->country_id == $item->id)
                                {{"selected = 'selected'"}}
                                @endif value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                        
                        @endif
                       
                       
                    </select>

                    @error('country')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="genre">Thể loại phim</label>
                    <select class="form-control" id="genre" name="genre" value="{{old('genre')}}">
                        <option value="">Chọn thể loại</option>
                        @if ($list_genre)
                        @foreach ($list_genre as $item)
                            <option @if ($movie->genre_id == $item->id)
                                {{"selected = 'selected'"}}
                                @endif value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
                    @endif
                    
                    </select>
                    @error('genre')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div> --}}
                <label for="">Thể loại phim: </label>
                @foreach ($list_genre as $genre)
                <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input"
                      @foreach ($genres as $item)
                          {{$item->id == $genre->id ?'checked':''}}
                      @endforeach
                       name="genre[]" value="{{$genre->id}}">{{$genre->title}}
                    </label>
                  </div>
                @endforeach
             

                <div class="form-group">
                    <label for="genre">Độ phân giải</label>
                    <select class="form-control" id="resolution" name="resolution">
                        <option value="">Chọn phân giải</option>
                         @if ($list_resolution)
                            @foreach ($list_resolution as $k=>$v)
                            <option 
                            @if ($movie->resolution == $k)
                            {{"selected = 'selected'"}}
                            @endif
                             value="{{$k}}">{{$v}}</option>
                            @endforeach
                        
                        @endif
                       
                    
                    </select>
                    @error('genre')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
               <div class="row">
                   <div class="col-4">
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1"
                            @if ($movie->status == 1)
                            {{"checked = 'checked'"}}
                                
                            @endif
                            >
                            <label class="form-check-label" for="exampleRadios1">
                                Công khai
                                
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0"
                            @if ($movie->status == 0)
                            {{"checked = 'checked'"}}
                                
                            @endif
                            >
                            <label class="form-check-label" for="exampleRadios2">
                               Chờ duyệt
                            </label>
                        </div>
                        @error('status')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                   </div>
                  
                   <div class="col-4">
                    <div class="form-group">
                        <label for="">Phim nổi bật:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="film_hot" id="exampleRadios1" value="1"
                            @if ($movie->film_hot == 1)
                            {{"checked = 'checked'"}}
                                
                            @endif
                            >
                            <label class="form-check-label" for="exampleRadios1">
                                Có
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="film_hot" id="exampleRadios2" value="0"
                            @if ($movie->film_hot == 0)
                            {{"checked = 'checked'"}}
                                
                            @endif
                            >
                            <label class="form-check-label" for="exampleRadios2">
                                Không
                            </label>
                        </div>
                        {{-- @error('status')
                        <small class="text-danger">{{$message}}</small>
                        @enderror --}}
                    </div>
                   </div>

                   <div class="col-4">
                    <div class="form-group">
                        <label for="">Sub</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sub" id="exampleRadios1" value="1"
                            @if ($movie->sub == 1)
                            {{"checked = 'checked'"}}
                                
                            @endif
                            >
                            <label class="form-check-label" for="exampleRadios1">
                                Phụ đề
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sub" id="exampleRadios2" value="0"
                            @if ($movie->sub == 0)
                            {{"checked = 'checked'"}}
                                
                            @endif
                            >
                            <label class="form-check-label" for="exampleRadios2">
                                Thuyết minh
                            </label>
                        </div>
                        {{-- @error('status')
                        <small class="text-danger">{{$message}}</small>
                        @enderror --}}
                    </div>
                    </div>  

                    <div class="col-4">   
                        <div class="form-group">
                          <label for="datepicker">Năm sản xuất:</label>                   
                          <input type="text" class="form-control" name="year" id="datepicker" value="{{$movie->year}}" />
                        </div>
                        @error('year')
                          <small class="text-danger">{{$message}}</small>
                          @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="episode">Số tập phim</label>
                            <select class="form-control" id="episode" name="episode">
                                <option value="0">Chọn tập phim</option>
                                
                                    
                                    @for($episode = 1; $episode<=20; $episode++)
                                        <option value="{{$episode}}" 
                                        @if ($movie->episode == $episode)
                                            {{'selected'}}
                                        @endif
                                        >{{$episode.' tập'}}</option>
                                    @endfor
                                    
                                  
                                                      
                            </select>
                            @error('season')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="top_views">Top views theo:</label>
                            <select class="form-control" id="top_views" name="top_views">
                                <option value="">Chọn top views theo:</option>
                                <option {{(isset($movie)&&$movie->top_views==1)?'selected':''}} value="1">Ngày</option>
                                <option {{(isset($movie)&&$movie->top_views==2)?'selected':''}} value="2">Tuần</option>
                                <option {{(isset($movie)&&$movie->top_views==3)?'selected':''}} value="3">Tháng</option>
                                
                            </select>
                            @error('season')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

               </div>
            
               <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
      $("#datepicker").datepicker({
         format: "yyyy",
         viewMode: "years", 
         minViewMode: "years",
         autoclose:true
      });   
    })
    
    
    </script>
@endsection