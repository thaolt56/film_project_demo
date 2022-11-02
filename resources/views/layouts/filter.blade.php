<div class="row">
    <form action="{{route('user.filter')}}" method="GET">
      <style>
          .filter{
            background-color: #1c1a1a;
            color: rgb(173, 176, 179);
          }
      </style>
        
        <div class="col-md-3">
            <div class="form-group">
            
               <select class="form-control filter"  id="sort" name="sort">
                 <option value="">--Sắp xếp--</option>
                 {{-- <option value="create">Ngày đăng phim</option> --}}
                 <option {{(isset($_GET['sort']) && $_GET['sort']=='year')?'selected':''}} value="year">Năm sản xuất</option>
                 <option {{(isset($_GET['sort']) && $_GET['sort']=='title')?'selected':''}} value="title">Tên phim</option>
                 {{-- <option value="view_count">Lượt xem</option> --}}
               </select>
             </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
             
               <select class="form-control filter" id="genre" name="genre">
                 <option value="">--Thể loại--</option>
                 @foreach ($list_genre as $genre)
                 <option {{(isset($_GET['genre']) && $_GET['genre']==$genre->id)?'selected':''}} value="{{$genre->id}}">{{$genre->title}}</option>
                 @endforeach
               </select>
             </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
              
               <select class="form-control filter" id="country" name="country">
                 <option value="">--Quốc Gia--</option>
                 @foreach ($list_country as $country)
                 <option {{(isset($_GET['country']) && $_GET['country']==$country->id)?'selected':''}} value="{{$country->id}}" >{{$country->title}}</option>
                 @endforeach
               </select>
             </div>
         </div>
         <div class="col-md-2">
            <div class="form-group">
               
               <select class="form-control filter" id="year" name="year">
                 <option value="">--Năm--</option>
                 @for($y=2010;$y<2023;$y++)
                     <option {{(isset($_GET['year']) && $_GET['year']==$y)?'selected':''}} value="{{$y}}">{{$y}}</option>
                 @endfor
               </select>
             </div>
         </div>
         <div class="col-md-1">
             <button type="submit" class="btn btn-primary">Lọc</button>
         </div>
    </form>
    
  </div>