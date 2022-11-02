@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    @if (session('status'))
    <div class="alert alert-primary" role="alert">
        {{session('status')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách phim</h5>
           
        </div>
        <div class="card-body">
            
            <form action="" method="POST">
                @csrf
            <table class="table table-responsive table-striped table-checkall" id="movie_table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên phim</th>
                        <th scope="col">Thêm tập phim</th>
                        <th scope="col">Số tập phim</th>
                        <th scope="col">Tên phim english</th>
                        <th scope="col">Thời lượng</th>
                        <th scope="col">Top_views</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Trailer</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Quốc gia</th>
                        <th scope="col">Phim hot</th>
                        <th scope="col">Phân giải</th>
                        <th scope="col">sub</th>
                        <th scope="col">Năm</th>
                      
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                @if ($list_movie->total()>0)
               
                <tbody>
                    @php
                        $t=0;
                    @endphp
                @foreach ($list_movie as $movie)
                    @php
                        $t+=1;
                    @endphp
                    <tr class="">
                        <td>{{$t}}</td>
                        {{-- ajax change image --}}
                        <td>
                            <img width="100px" src="{{asset($movie->movie_image)}}" alt="">
                            <input type="file" id="file-{{$movie->id}}" name="img" data-movie_id="{{$movie->id}}"  class="form-control-file change_image" accept="image/*">
                            <div id="success_image">

                            </div>

                        </td>

                        <td><a href="#"></a>{{$movie->title}}</td>
                        <td>
                            <a class="btn btn-primary" style="width: 100px" href="{{route('episode.add_list',$movie->id)}}" role="button">Thêm tập</a>
                            @if ($movie->mov_episode_count > 0)
                            @foreach ($movie->mov_episode as $item)
                                <span class="badge badge-info"><a href="#" style="color: white" class="movie_episode" data-movie_id="{{$movie->id}}" data-movie_episode="{{$item->season}}">{{$item->season}}</a></span>
                            @endforeach
                                
                            @endif
                        </td>
                        <td>Tập {{$movie->mov_episode_count}}/{{$movie->episode}}</td>
                        <td><a href="#"></a>{{$movie->name_eng}}</td>
                        <td><a href="#"></a>{{$movie->time_movie}}</td>
                        <td>
                            <select class="form-control top_views" id="{{$movie->id}}"  name="top_views">
                                <option  value="">Không</option>
                                <option {{(isset($movie->top_views)&&$movie->top_views==1)?'selected':''}} value="1" >Ngày</option>
                                <option {{(isset($movie->top_views)&&$movie->top_views==2)?'selected':''}} value="2" >Tuần</option>
                                <option {{(isset($movie->top_views)&&$movie->top_views==3)?'selected':''}} value="3" >Tháng</option>
                                
                            </select>
                        </td>
                  
                        <td>{!!Str::of($movie->description)->limit(50)!!}</td>
                        <td>{{Str::of($movie->tags)->limit(20)}}</td>
                        <td>{{$movie->trailer}}</td>
                        <td>
                            <style>
                                .form-control{
                                    width: auto;
                                }
                            </style>
                            <select class="form-control category" id="{{$movie->id}}"  name="category">
                                @if ($list_category)
                                    @foreach ($list_category as $category)
                                    <option {{($movie->category_id == $category->id)?'selected':''}} value="{{$category->id}}" >{{$category->title}}</option>
                                    @endforeach
                                    
                                @endif
                            </select>
                        </td>
                        {{-- <td>{{$movie->category_show->title}}</td> --}}
                        {{-- show list genres --}}
                       
                        <td>
                            @foreach ($movie->mov_genre as $item)
                                <span class="badge badge-dark">{{$item->title}}</span>
                            @endforeach
                        </td>
                      
                        <td>
                            <select class="form-control country" id="{{$movie->id}}"  name="country">
                                @if ($list_country)
                                    @foreach ($list_country as $country)
                                    <option {{($movie->country_id == $country->id)?'selected':''}} value="{{$country->id}}" >{{$country->title}}</option>
                                    @endforeach
                                    
                                @endif
                            </select>
                        </td>
                        {{-- <td>{{$movie->country_show->title}}</td> --}}
                        <td>
                            <select class="form-control film_hot" id="{{$movie->id}}"  name="film_hot">
                               
                                <option {{($movie->film_hot == 1)?'selected':''}} value="1" >Có</option>
                                <option {{($movie->film_hot == 0)?'selected':''}} value="0" >Không</option>
                                
                            </select>
                        </td>
                        {{-- <td>
                            @if ($movie->film_hot == 1)
                                {{'Phim hot'}}
                            @else
                                {{''}}
                            @endif
                        </td> --}}
                        <td>
                            @if ($movie->resolution == 0)
                                {{'SD'}}
                            @elseif($movie->resolution == 1)
                            {{'HD'}}
                            @elseif($movie->resolution == 2)
                            {{'FullHD'}}
                            @elseif($movie->resolution == 3)
                            {{'Cam'}}
                            @elseif($movie->resolution == 4)
                            {{'HDCam'}}
                            @elseif($movie->resolution == 5)
                            {{'Trailer'}}
                                
                            @endif
                        </td>
                        <td>
                            @if ($movie->sub == 0)
                            {{'thuyết minh'}}
                        @else
                            {{'phụ đề'}}
                        @endif
                        </td>
                        
                        <td>{{$movie->year}}</td>
                        
                        <td>{{date('d/m/Y', strtotime($movie->created_at))}}</td>
                        <td>
                            @if ($movie->status == 1)
                                {{'Công khai'}}
                            @else
                                {{'Chờ duyệt'}}
                            @endif
                        </td>
                        <td>
                           
                            <a href="{{route('movie.edit',$movie->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                           
                            <a href="{{route('movie.delete',$movie->id)}}" onclick="return confirm('Bạn có chắc xóa bản ghi này không?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                 @endforeach
                   
                    
                    
                </tbody>
                @else
                <tr>
                    <td colspan="8"><p >Danh sách không tồn tại!</p></td>
                </tr>
                @endif
               
            </table>
        </form>
            {{-- {{$list_products->links()}} --}}
        </div>
    </div>

    @include('layouts.movie_watch_admin')
</div>

@endsection
@section('js')

<script>
    $(document).ready( function () {
        $('#movie_table').DataTable();
    } );

    $(document).ready(function(){
        $('.category').change(function(){
            var category_id = $(this).val();
            var movie_id = $(this).attr('id');
            
            $.ajax({
                type: "GET",
                url: "{{route('category.choose')}}",//this is only changes
                data: {category_id:category_id,movie_id:movie_id},
                typeData:'text',
                success: function(data) {
                alert('Đã thay đổi danh mục thành công!');
                }
            });
            
        });

        $('.country').change(function(){
            var country_id = $(this).val();
            var movie_id = $(this).attr('id');
            
            $.ajax({
                type: "GET",
                url: "{{route('country.choose')}}",//this is only changes
                data: {country_id:country_id,movie_id:movie_id},
                typeData:'text',
                success: function(data) {
                alert('Đã thay đổi quốc gia thành công!');
                }
            });
            
        });

        $('.film_hot').change(function(){
            var film_hot = $(this).val();
            var movie_id = $(this).attr('id');
            
            $.ajax({
                type: "GET",
                url: "{{route('film_hot.choose')}}",//this is only changes
                data: {film_hot:film_hot,movie_id:movie_id},
                typeData:'text',
                success: function(data) {
                alert('Đã thay đổi trạng thái phim hot thành công!');
                }
            });
            
        });

        $('.top_views').change(function(){
            var top_views = $(this).val();
            var movie_id = $(this).attr('id');
            
            $.ajax({
                type: "GET",
                url: "{{route('top_views.choose')}}",//this is only changes
                data: {top_views:top_views,movie_id:movie_id},
                typeData:'text',
                success: function(data) {
                // console.log(data);
                alert('Đã thay đổi trạng thái top views thành công!');
                }
            });
            
        });

        $(".change_image").change(function(){
           var movie_id = $(this).data('movie_id');
           var files = $('#file-'+movie_id)[0].files;
       
            var image = document.getElementById('file-'+movie_id).files[0];
            
            var form_data = new FormData();

            form_data.append("file", document.getElementById("file-"+movie_id).files[0]);
            form_data.append("movie_id",movie_id);

            $.ajax({
                        url:"{{route('change-image-ajax')}}",
                        method:"POST",
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:form_data,
                        typeData:'json',
                        contentType:false,
                        cache:false,
                        processData:false,

                        success:function(data){
                           
                            location.reload();
                            $('#success_image').html('<span class="text-success">Cập nhật hình ảnh thành công</span>');
                        }
                    });
        });

        $('.movie_episode').click(function(){
           
           var movie_id = $(this).data('movie_id');
           var movie_episode = $(this).data('movie_episode');
           
           
           $.ajax({
                       url:"{{route('movie_episode_admin')}}",
                       method:"POST",
                       headers:{
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                       data:{movie_id:movie_id,movie_episode:movie_episode},
                       typeData:'json',

                       success:function(data){
                       //   console.log(data);
                           $('#title').html(data.title);
                           $('#desc').html(data.desc);
                           $('#video').html(data.video);
                           $('#modal_watch').modal('show');
                           
                       }
                   });
       });
    });
    
</script>
@endsection

