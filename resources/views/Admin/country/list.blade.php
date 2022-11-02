
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
            <h5 class="m-0 ">Danh sách quốc gia</h5>
            {{-- <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div> --}}
        </div>
        <div class="card-body">
         @if ($country->total() >0)
         <table class="table table-striped table-checkall">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $t = 0;
                 ?>
               @foreach ($country as $item)
               <?php
               $t+=1;
                ?>
               <tr>
                <td>{{$t}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->slug}}</td>
                <td>{!!$item->description!!}</td>
                <td>
                    @if ($item->status == 1)
                        {{'Công khai'}}
                    @else
                        {{'Chờ duyệt'}}
                    @endif
                </td>
                <td>{{date('d/m/Y', strtotime($item->created_at))}}</td>
                <td>
                    <a href="{{route('country.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="edit"><i class="far fa-eye"></i></a>
                    <a href="{{route('country.delete',$item->id)}}" onclick="return confirm('Bạn có chắc xóa bản ghi này không?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
               @endforeach
               
            </tbody>
        </table>
         @else
         <td>Không tồn tại dữ liệu trang</td>
         @endif
        
         {{$country -> links()}}
            
        </div>
    </div>
</div>
@endsection
