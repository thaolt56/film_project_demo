@extends('layouts.user')

@section('content')
<div class="container">
   <div class="row container" id="wrapper">
      <div class="halim-panel-filter">
         <div class="panel-heading">
            <div class="row">
               <div class="col-xs-6">
                  <div class="yoast_breadcrumb hidden-xs"><span><span><a href="danhmuc.php">{{$movie->category_show->title}}</a> » <span><a href="danhmuc.php">{{$movie->country_show->title}}</a> » <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span></span></span></span></div>
               </div>
            </div>
         </div>
         <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
         </div>
      </div>
      <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
         <section id="content" class="test">
            <div class="clearfix wrap-content">
              
               <div class="halim-movie-wrapper">
                  <div class="title-block">
                     <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                        <div class="halim-pulse-ring"></div>
                     </div>
                     <div class="title-wrapper" style="font-weight: bold;">
                        Bookmark
                     </div>
                  </div>
                  <div class="movie_info col-xs-12">
                     <div class="movie-poster col-md-3">
                        <img class="movie-thumb" src="{{asset($movie->movie_image)}}" alt="{{$movie->title}}">
                        @if($movie->resolution!=5)
                        <div class="bwa-content">
                           <div class="loader"></div>
                           <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$list_season_current[0])}}" class="bwac-btn">
                         
                           <i class="fa fa-play"></i>
                           </a>
                        </div>
                        @else
                        <a style="margin-top: 5px" class="btn btn-primary trailer" href="#trailer" role="button">Xem Trailer</a>
                        @endif

                     </div>
                     <div class="film-poster col-md-9">
                        <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                        <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->name_eng}}</h2>
                        <ul class="list-info-group">
                           <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">{{$list_resolution[$movie->resolution]}}</span><span class="episode">{{$list_sub[$movie->sub]}}</span></li>
                           <li class="list-info-group-item"><span>Tập phim</span> : 
                              @if ($movie->mov_episode_count == $movie->episode)
                                 {{ 'Tập '.$movie->mov_episode_count.'/'.$movie->episode.'-Hoàn thành'}}
                              @else
                              {{'Tập '.$movie->mov_episode_count.'/'.$movie->episode.'-Đang cập nhật'}}
                              @endif
                             </li>
                           <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->time_movie}}</li>
                           <li class="list-info-group-item"><span>Thể loại</span> :
                              @if ($movie->resolution!=5)
                                 @foreach ($movie->mov_genre as $item)
                                    {{$item->title}}
                                 @endforeach
                              @else
                                  {{'Trailer'}}
                              @endif
                            
                           </li>
                           <li class="list-info-group-item"><span>Quốc gia</span> : <a href="" rel="tag">{{$movie->country_show->title}}</a></li>
                           {{-- <li class="list-info-group-item"><span>Đạo diễn</span> : <a class="director" rel="nofollow" href="https://phimhay.co/dao-dien/cate-shortland" title="Cate Shortland">Cate Shortland</a></li> --}}
                           <li class="list-info-group-item last-item" style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;"><span>Tập phim mới</span> : 
                              @if ($movie->resolution!=5)
                                 @foreach ( $list_season_current as $k=>$v)
                                    <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$v)}}" rel="nofollow" title="{{$movie->slug}}">{{'Tập-'.$v}}</a>
                                 @endforeach
                              @else
                                  {{'Chưa có tập phim'}}
                              @endif
                             
                              
                           </li>
                            
                              <style>
                                 .rating {
                                    float: none;
                                    margin-bottom: 0px;
                                 }
                              </style>
                              <ul class="list-inline rating"  title="Average Rating">

                                 @for($count=1; $count<=5; $count++)
   
                                   @php
   
                                     if($count<=$rating){ 
                                       $color = 'color:#ffcc00;'; //mau vang
                                     }
                                     else {
                                       $color = 'color:#ccc;'; //mau xam
                                     }
                                   
                                   @endphp
                                 
                                   <li title="star_rating" 
   
                                   id="{{$movie->id}}-{{$count}}" 
                                   
                                   data-index="{{$count}}"  
                                   data-movie_id="{{$movie->id}}" 
                                   data-rating="{{$rating}}" 
                                   class="rating" 
                                   style="cursor:pointer; {{$color}} 
   
                                   font-size:30px;">&#9733;</li>
   
                                 @endfor
                                    <span>({{$rating}} sao/{{$count_rating}} lượt)</span>
                              </ul>
                              <p>Bấm vào sao để đánh giá phim! </p>
                          
                        </ul>
                        <?php 
                        $url_current = Request::url();
                        
                        ?>
                        <div class="fb-like" data-href="{{$url_current}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                        <div class="movie-trailer hidden"></div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
               <div id="halim_trailer"></div>
               <div class="clearfix"></div>
               <div class="section-bar clearfix">
                  <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
               </div>
               <div class="entry-content htmlwrap clearfix">
                  <div class="video-item halim-entry-box">
                     <article id="post-38424" class="item-content">
                        Phim <a href="https://phimhay.co/goa-phu-den-38424/">GÓA PHỤ ĐEN</a> - 2021 - Mỹ:
                        <p>{!!$movie->description!!}</p>
                        <h5>Tags Phim:</h5>
                        <ul>
                           <?php
                              $tags = [];
                              $tags = explode(',',$movie->tags);
                           ?>
                           @if(isset($tags))
                           @foreach ($tags as $k=>$v)
                              <li><a href="{{route('user.movie',$movie->slug,$movie->season)}}">{{$v}}</a></li>
                           @endforeach
                           @endif
                          
                          
                        </ul>
                     </article>
                  </div>
               </div>
            </div>
         </section>
         @if($movie->resolution==5)
         <section id="content" class="test">
            <div class="clearfix wrap-content">
              
               <div class="clearfix"></div>
               <div class="section-bar clearfix" id="trailer">
                  <h2 class="section-title"><span style="color:#ffed4d">Xem Trailer</span></h2>
               </div>
               <div class="entry-content htmlwrap clearfix">
                  <div class="video-item halim-entry-box">
                     <article id="post-38424" class="item-content">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$movie->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </article>
                  </div>
               </div>
            </div>
         </section>
         @endif

         {{-- comment --}}
        <style>
         .facebook_comment{
            background: #bebeb9;
         }
        </style>
          <section id="content" class="test">
            <div class="clearfix wrap-content">
              
               <div class="clearfix"></div>
               <div class="section-bar clearfix" id="trailer">
                  <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
               </div>
               <div class="entry-content htmlwrap clearfix">
                  <div class="video-item halim-entry-box">
                     <?php
                     //lay url hien tai.
                     $url_current = Request::url();
                     ?>
                     <article id="post-38424" class="facebook_comment" class="item-content" >
                       
                        <div class="fb-comments" data-href="https://trongthao.unitopcv.com/{{$url_current}}'" data-width="100%" data-numposts="5"></div>
                     </article>
                  </div>
               </div>
            </div>
         </section>
         <section class="related-movies">
            <div id="halim_related_movies-2xx" class="wrap-slider">
               <div class="section-bar clearfix">
                  <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
               </div>
               <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
       
                  @if (!empty($film_hot))
                      @foreach ($film_hot as $movie)
                      <article class="thumb grid-item post-38498">
                      <div class="halim-item">
                        <a class="halim-thumb" href="{{route('user.movie',$movie->slug)}}" title="{{$movie->title}}">
                           <figure><img class="lazy img-responsive" src="{{asset($movie->movie_image)}}" alt="Đại Thánh Vô Song" title="Đại Thánh Vô Song"></figure>
                           <span class="status">
                              @if($movie->season!=0)
                              {{$list_resolution[$movie->resolution].'-Tập '.$movie->season}}
                              @else
                              {{$list_resolution[$movie->resolution]}}
                              @endif
                           </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$list_sub[$movie->sub]}}</span> 
                           <div class="icon_overlay"></div>
                           <div class="halim-post-title-box">
                              <div class="halim-post-title ">
                                 <p class="entry-title">{{$movie->title}}</p>
                                 <p class="original_title">{{$movie->name_eng}}</p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </article>
                      @endforeach
                  @endif          
            </div>
               <script>
                  $(document).ready(function($) {				
                  var owl = $('#halim_related_movies-2');
                  owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
               </script>
            </div>
         </section>
      </main>
      @include('layouts.user_sidebar')
      <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
   </div>
</div>
@endsection


{{-- //scroll trailer --}}
@section('js')

<script type="text/javascript">
   $(document).ready(function(){
      $('.trailer').click(function(e){
         e.preventDefault();
         var aid = $(this).attr('href');
         $('html,body').animate({scrollTop: $(aid).ofset().top},'slow');
      });
   });
</script>
<script type="text/javascript">
        
   function remove_background(movie_id)
    {
     for(var count = 1; count <= 5; count++)
     {
      $('#'+movie_id+'-'+count).css('color', '#ccc');
     }
   }

   //hover chuột đánh giá sao
  $(document).on('mouseenter', '.rating', function(){
     var index = $(this).data("index");
     var movie_id = $(this).data('movie_id');
   // alert(index);
   // alert(movie_id);
     remove_background(movie_id);
     for(var count = 1; count<=index; count++)
     {
      $('#'+movie_id+'-'+count).css('color', '#ffcc00');
     }
   });
  //nhả chuột ko đánh giá
  $(document).on('mouseleave', '.rating', function(){
     var index = $(this).data("index");
     var movie_id = $(this).data('movie_id');
     var rating = $(this).data("rating");
     remove_background(movie_id);
     //alert(rating);
     for(var count = 1; count<=rating; count++)
     {
      $('#'+movie_id+'-'+count).css('color', '#ffcc00');
     }
    });

   //click đánh giá sao
   $(document).on('click', '.rating', function(){
      
         var index = $(this).data("index");
         var movie_id = $(this).data('movie_id');
     
         $.ajax({
          url:"{{route('add-rating')}}",
          method:"POST",
          data:{index:index, movie_id:movie_id},
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
          success:function(data)
          {
            console.log(data);
           if(data == 'done')
           {
            
            alert("Bạn đã đánh giá "+index +" trên 5 sao");
            location.reload();
            
           }else if(data =='exist'){
             alert("Bạn đã đánh giá phim này rồi,cảm ơn bạn nhé!");
           }
           else
           {
            alert("Lỗi đánh giá");
           }
           
          }
         });
   });


</script>
@endsection
