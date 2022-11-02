@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <div class="row">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">DANH MỤC PHIM</div>
                <div class="card-body">
                    <h5 class="card-title">{{$count_category}}</h5>
                    {{-- <p class="card-text">Đơn hàng giao dịch thành công</p> --}}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">QUỐC GIA PHIM</div>
                <div class="card-body">
                    <h5 class="card-title">{{$count_country}}</h5>
                    {{-- <p class="card-text">Số lượng đơn hàng đang xử lý</p> --}}
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">THỂ LOẠI PHIM</div>
                <div class="card-body">
                    <h5 class="card-title">{{$count_genre}}</h5>
                    {{-- <p class="card-text">Doanh số hệ thống</p> --}}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-info mb-2" style="max-width: 18rem;">
                <div class="card-header">SỐ LƯỢNG PHIM</div>
                <div class="card-body">
                    <h5 class="card-title">{{$count_movie}}</h5>
               
                </div>
            </div>
        </div>
    </div>
    <!-- end analytic  -->
    <div class="card">
        <div class="card-header font-weight-bold">
           TOP PHIM THEO LƯỢT XEM NHIỀU
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên phim</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Lượt xem</th>
                        <th scope="col">Độ phân giải</th>
                        <th scope="col">Quốc gia</th>
                        <th scope="col">Thể loại</th>
                        <th scope="col">Năm</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                    $t=0;
                    @endphp
            @foreach ($list_movie_top as $movie)
                @php
                    $t+=1;
                @endphp
                    <tr>
                        <th scope="row">{{$t}}</th>
                        <td>{{$movie->title}}</td>
                        <td><img width="80px" src="{{asset($movie->movie_image)}}" alt=""></td>
                        <td>{{$movie->count_views}}</td>
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
                        <td>{{$movie->country_show->title}}</td>
                        <td>
                            @foreach ($movie->mov_genre as $item)
                            <span class="badge badge-dark">{{$item->title}}</span> <br>
                            @endforeach
                        </td>
                        <td>{{$movie->year}}</td>
                      
                    </tr>
                   
             @endforeach        
                  
                   
                   
                </tbody>
            </table>
           
        </div>
    </div>

</div>
@endsection