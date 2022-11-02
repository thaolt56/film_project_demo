@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
       
        <div class="card-header font-weight-bold">
            Chỉnh sửa thông tin tập phim
        </div>
        <div class="card-body">
            <form action="{{route('episode.update',$id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="movie_id">Chọn phim</label>
                    <select disabled class="form-control select_movie" id="movie_id" name="movie_id">
                        <option value="{{$movie_id}}">{{$movie->title}}</option>
                    
                     
                    </select>
                    {{-- @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label for="link_movie">link phim</label>
                    <input class="form-control" type="text" name="link_movie" id="link_movie" value="{{$episode->link_movie}}">
                    {{-- @error('slug')
                    <small class="text-danger">{{$message}}</small>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label for="season">Chọn tập phim</label>
                    <select disabled class="form-control" id="season" name="season">
                       <option value="{{$episode->season}}">{{'Tập '.$episode->season}}</option>
                        
                    </select>
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
            </form>
        </div>
    </div>
</div>


@endsection
{{-- @section('js')
<script>
    $(document).ready(function(){
        $('.select_movie').change(function(){
            var id = $(this).val();

            $.ajax({
            type: "GET",
            url: "{{route('episode_select')}}", //this is only changes
            data: {id:id},
            typeData: 'text',
            success: function(data) {
                // console.log(data);
                $('#season').html(data);
               
            }
        });
        });
    });
</script>
@endsection --}}
