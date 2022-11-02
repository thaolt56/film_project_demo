
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
            <h5 class="m-0 ">Thông tin web</h5>
           
        </div>
        <div class="card-body">
         @if ($info->total() >0)
         <table class="table table-striped table-checkall">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Tiêu đề</th>
                   
                    <th scope="col">Nội dung</th>
                    <th scope="col">Copy_right</th>
                   
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $t = 0;
                 ?>
               @foreach ($info as $item)
               <?php
               $t+=1;
                ?>
               <tr>
                <td>{{$t}}</td>
                <td><img width="80px" src="{{asset($item->logo)}}" alt=""></td>
                <td>{{$item->title}}</td>
              
                <td>{!!$item->description!!}</td>
                <td>{{$item->copy_right}}</td>
             
                <td>{{date('d/m/Y', strtotime($item->created_at))}}</td>
                <td>
                 
                    <a href="{{route('info.delete',$item->id)}}" onclick="return confirm('Bạn có chắc xóa bản ghi này không?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
               @endforeach
               


            </tbody>
        </table>
         @else
         <td>Không tồn tại dữ liệu trang</td>
         @endif
        
         {{$info -> links()}}
            
        </div>

        
    </div>
</div>

@endsection
