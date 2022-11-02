<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4 hidden-xs">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
       <div class="section-bar clearfix">
          <div class="section-title">
             <span>Top Views</span>
             <ul class="halim-popular-tab" role="tablist">
                <li role="presentation" >
                   <a href="#day" class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>
                </li>
                <li role="presentation">
                   <a href="#week" class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">Week</a>
                </li>
                <li role="presentation">
                   <a href="#month" class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>
                </li>
                
             </ul>
          </div>
       </div>
      <section class="tab-content">
          <div id="day"  class="top_views">
            
             <div id="" class="popular-post">
               @if (!empty($day_top_views))
               @foreach ($day_top_views as $item)
               <div class="item post-37176">
                 <a href="{{route('user.movie',$item->slug)}}" title="{{$item->title}}">
                    <div class="item-link">
                       <img src="{{asset($item->movie_image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                       <span class="is_trailer">{{$list_resolution[$item->resolution]}}</span>
                    </div>
                    <p class="title">{{$item->title}}</p>
                 </a>
                 <div class="viewsCount" style="color: #9d9d9d;">{{$item->count_views}} lượt quan tâm</div>
                 <div style="float: left;">
                    <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                    </span>
                 </div>
              </div>
               @endforeach
           @endif
             </div>
          </div>

          <div id="week"  class="top_views">
           
              <div id="" class="popular-post">
               @if (!empty($week_top_views))
                   @foreach ($week_top_views as $item)
                   <div class="item post-37176">
                     <a href="{{route('user.movie',$item->slug)}}" title="{{$item->title}}">
                        <div class="item-link">
                           <img src="{{asset($item->movie_image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                           <span class="is_trailer">{{$list_resolution[$item->resolution]}}</span>
                        </div>
                        <p class="title">{{$item->title}}</p>
                     </a>
                     <div class="viewsCount" style="color: #9d9d9d;">{{$item->count_views}} lượt quan tâm </div>
                     <div style="float: left;">
                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                        <span style="width: 0%"></span>
                        </span>
                     </div>
                  </div>
                   @endforeach
               @endif
              
            </div>
          </div>

       <div id="month"  class="top_views">
           
             <div id="" class="popular-post">
               @if (!empty($month_top_views))
               @foreach ($month_top_views as $item)
               <div class="item post-37176">
                 <a href="{{route('user.movie',$item->slug)}}" title="{{$item->title}}">
                    <div class="item-link">
                       <img src="{{asset($item->movie_image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                       <span class="is_trailer">{{$list_resolution[$item->resolution]}}</span>
                    </div>
                    <p class="title">{{$item->title}}</p>
                 </a>
                 <div class="viewsCount" style="color: #9d9d9d;">{{$item->count_views}} lượt quan tâm</div>
                 <div style="float: left;">
                    <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                    <span style="width: 0%"></span>
                    </span>
                 </div>
              </div>
               @endforeach
           @endif
             </div>
          </div>
       </section> 
       <div class="clearfix"></div> 

      <div class="section-bar clearfix">
         <div class="section-title">
            <span>Top Phim sắp chiếu</span>
         </div>
      </div>
     <section class="tab-content">
         <div id="" class="popular-post">
            @if (isset($list_trailer))
               @foreach ($list_trailer as $item)
    
                  <div class="item post-37176">
                     <a href="{{route('user.movie',$item->slug)}}" title="{{$item->title}}">
                        <div class="item-link">
                           <img src="{{asset($item->movie_image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                           <span class="is_trailer">Trailer</span>
                        </div>
                        <p class="title">{{$item->title}}</p>
                     </a>
                     <div class="viewsCount" style="color: #9d9d9d;">{{$item->year}}</div>
                     <ul class="list-inline rating"  title="Average Rating" style="float: left">

                        @for($count=1; $count<=5; $count++)
                        
                          <li title="star_rating" 

                          class="rating" 
                          style="cursor:pointer;color:#ffcc00;
                          padding-right:0px;
                          padding-left:0px;
                          font-size:20px;">&#9733;</li>

                        @endfor
                          
                     </ul>
                     <div style="float: left;">
                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                        </span>
                     </div>
                  </div>
     
               @endforeach
            @endif
         </div>
        
      </section>

      {{-- top phim hot --}}
      <div class="clearfix"></div>
      <div class="section-bar clearfix">
         <div class="section-title">
            <span>Top Phim Hot</span>
         </div>
      </div>
     <section class="tab-content">
         <div id="" class="popular-post">
            @if (isset($list_film_hot))
               @foreach ($list_film_hot as $item)
    
                  <div class="item post-37176">
                     <a href="{{route('user.movie',$item->slug)}}" title="{{$item->title}}">
                        <div class="item-link">
                           <img src="{{asset($item->movie_image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                           <span class="is_trailer">{{$list_resolution[$item->resolution]}}</span>
                        </div>
                        <p class="title">{{$item->title}}</p>
                     </a>
                     <div class="viewsCount" style="color: #9d9d9d;">{{$item->count_views}} lượt quan tâm</div>
                     <div class="viewsCount" style="color: #9d9d9d;">{{$item->year}}</div>
                     <ul class="list-inline rating"  title="Average Rating" style="float: left">

                        @for($count=1; $count<=5; $count++)
                        
                          <li title="star_rating" 

                          class="rating" 
                          style="cursor:pointer;color:#ffcc00;
                          padding-right:0px;
                          padding-left:0px;
                          font-size:20px;">&#9733;</li>

                        @endfor
                          
                     </ul>
                     <div style="float: left;">
                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                        </span>
                     </div>
                  </div>
     
               @endforeach
            @endif
         </div>
        
      </section>
    </div>
     
   </div>
  </div>
 </aside>
 
 
 <script>
   $(document).ready(function(){
      $('.top_views').hide();
      $('#day').fadeIn();
      $('.halim-popular-tab li:first-child').addClass('active');

      $('.halim-popular-tab li').click(function(){
         $('.halim-popular-tab li').removeClass('active');
         $(this).addClass('active');

        let id_tab_content =  $(this).children('a').attr('href');
        $('.top_views').hide();
         $(id_tab_content).fadeIn();

         return false;
      });
   });
 </script>