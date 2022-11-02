@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm phim
        </div>
        <div class="card-body">
            <form action="{{route('movie.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="slug">Tên phim</label>
                            <input class="form-control" type="text" name="title" id="slug" onkeyup="ChangeToSlug()" value="{{old('title')}}">
                            @error('title')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_eng">Tên phim tiếng anh</label>
                            <input class="form-control" type="text" name="name_eng" id=""  value="{{old('name_eng')}}">
                            @error('name_eng')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Slug</label>
                            <input class="form-control" type="text" name="slug" id="convert_slug" value="{{old('slug')}}">
                            @error('slug')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="time">Thời gian phim</label>
                            <input class="form-control" type="text" name="time" id="time" value="{{old('time')}}">
                            @error('time')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="desc">Mô tả phim</label>
                            <textarea name="desc" class="form-control" id="desc" cols="30" rows="10">{{old('desc')}}</textarea>
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
                            <input class="form-control" type="text" name="tags" id="tags" value="{{old('tags')}}">
                         
                            @error('tags')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="trailer">Trailer Phim</label>
                            <input class="form-control" type="text" name="trailer" id="trailer" value="{{old('trailer')}}">
                         
                            @error('trailer')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image">Chọn ảnh đại diện phim:</label>
                            <input type="file" class="form-control-file mb-2" id="image" name="image" value="{{old('image')}}">
                            @error('image')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        </div>
                    </div>
                </div>
              
              
               

                <div class="form-group">
                    <label for="category">Danh mục phim</label>
                    <select class="form-control" id="category" name="category">
                        <option value="">Chọn danh mục</option>
                        @if ($list_category)
                            @foreach ($list_category as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                            
                        @endif
                       
                       
                    </select>
                    @error('category')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="country">Quốc gia</label>
                    <select class="form-control" id="country" name="country">
                        <option value="">Chọn quốc gia</option>
                        @if ($list_country)
                        @foreach ($list_country as $country)
                        <option value="{{$country->id}}">{{$country->title}}</option>
                        @endforeach
                        
                    @endif
                       
                       
                    </select>

                    @error('country')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="genre">Thể loại phim</label>
                    <select class="form-control" id="genre" name="genre">
                        <option value="">Chọn thể loại</option>
                         @if ($list_genre)
                            @foreach ($list_genre as $genre)
                            <option value="{{$genre->id}}">{{$genre->title}}</option>
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
                      <input type="checkbox" class="form-check-input" name="genre[]" value="{{$genre->id}}">{{$genre->title}}
                    </label>
                  </div>
                @endforeach
             
                
                <div class="form-group">
                    <label for="genre">Độ phân giải:</label>
                    <select class="form-control" id="resolution" name="resolution">
                        <option value="">Chọn phân giải</option>
                         @if ($list_resolution)
                            @foreach ($list_resolution as $k=>$v)
                            <option value="{{$k}}">{{$v}}</option>
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
                        <label for="">Trạng thái:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="0">
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
                        {{-- @error('status')
                        <small class="text-danger">{{$message}}</small>
                        @enderror --}}
                    </div>
                   </div>
                   
                   <div class="col-4">
                    <div class="form-group">
                        <label for="">Phim nổi bật:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="film_hot" id="exampleRadios1" value="1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Có
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="film_hot" id="exampleRadios2" value="0">
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
                            <input class="form-check-input" type="radio" name="sub" id="exampleRadios1" value="1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Phụ đề
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sub" id="exampleRadios2" value="0">
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
                        <input type="text" class="form-control" name="year" id="datepicker" />
                      </div>
                      @error('year')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="episode">Số tập phim</label>
                            <select class="form-control" id="episode" name="episode">
                                {{-- <option value="0">Chọn số tập phim</option> --}}
                                
                                    
                                    @for($episode = 1; $episode<=20; $episode++)
                                        <option value="{{$episode}}">{{$episode.' tập'}}</option>
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
                                <option value="1">Ngày</option>
                                <option value="2">Tuần</option>
                                <option value="3">Tháng</option>
                                
                                  
                                                      
                            </select>
                            @error('season')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
               </div>
               
                   
               <button type="submit" class="btn btn-primary">Thêm mới</button>
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