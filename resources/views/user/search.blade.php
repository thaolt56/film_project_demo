

@foreach ($search_movie as $movie)
<div class="media">
  <div class="image_search">
    <a href="{{route('user.movie',$movie->slug)}}">
      <img src="{{asset($movie->movie_image)}}" >
    </a>
  </div>

 <div class="media-body">
   <a href="{{route('user.movie',$movie->slug)}}"> <h5 class="">{{$movie->title}}</h5></a>
    <h6>{{$movie->name_eng}}</h6>
  </div>
  <div class="clear_both"></div>
</div>
@endforeach