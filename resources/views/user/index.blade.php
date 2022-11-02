@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row container" id="wrapper">
       <div class="halim-panel-filter">
          <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
             <div class="ajax"></div>
          </div>
       </div>
       {{-- <div class="col-xs-12 carausel-sliderWidget">
          <section id="halim-advanced-widget-4">
             <div class="section-heading">
                <a href="danhmuc.php" title="Phim Chiếu Rạp">
                <span class="h-text">Phim Chiếu Rạp</span>
                </a>
                <ul class="heading-nav pull-right hidden-xs">
                   <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
                </ul>
             </div>
             <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
                <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="{{route('user.movie')}}" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="{{route('user.movie')}}" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="{{route('user.movie')}}" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                 <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                         <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">GÓA PHỤ ĐEN</p>
                               <p class="original_title">Black Widow</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>

               
             </div>
          </section>
          <div class="clearfix"></div>
       </div> --}}
       <div id="halim_related_movies-2xx" class="wrap-slider">
         <div class="section-bar clearfix">
            <h3 class="section-title"><span>PHIM HOT</span></h3>
         </div>
         <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
       
               @if (!empty($film_hot))
                   @foreach ($film_hot as $movie)
                   <article class="thumb grid-item post-38498">
                   <div class="halim-item">
                     <a class="halim-thumb" href="{{route('user.movie',$movie->slug)}}" title="{{$movie->title}}">
                        <figure><img class="lazy img-responsive" src="{{asset($movie->movie_image)}}" alt="Đại Thánh Vô Song" title="Đại Thánh Vô Song"></figure>
                        <span class="status">
                           @if($movie->episode!=0)
                           {{$list_resolution[$movie->resolution].'-Tập'.$movie->mov_episode_count.'/'.$movie->episode}}
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
            owl.owlCarousel({loop: true,margin: 5,autoplay: true,autoplayTimeout: 2000,autoplayHoverPause: true,nav: true,navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:5},1000: {items: 6}}})});
         </script>
      </div>
       <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
         @if (!empty($category))
             @foreach ($category as $cat)
             <section id="halim-advanced-widget-2">
               <div class="section-heading">
                  <a href="{{url($cat->slug)}}" title="{{$cat->title}}">
                  <span class="h-text">{{$cat->title}}</span>
                  </a>
               </div>
               <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                  @foreach ($cat->movie_cat->take(8) as $mov)
                  <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                     <div class="halim-item">
                        <a class="halim-thumb" href="{{route('user.movie',$mov->slug)}}">
                           <figure><img class="lazy img-responsive" src="{{asset($mov->movie_image)}}" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO"></figure>
                           <span class="status">
                              @if($mov->episode!=0)
                           {{$list_resolution[$mov->resolution].'-Tập'.$mov->mov_episode_count.'/'.$mov->episode}}
                           @else
                           {{$list_resolution[$mov->resolution]}}
                           @endif
                              </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$list_sub[$movie->sub]}}</span> 
                           <div class="icon_overlay"></div>
                           <div class="halim-post-title-box">
                              <div class="halim-post-title ">
                                 <p class="entry-title">{{$mov->title}}</p>
                                 <p class="original_title">{{$mov->name_eng}}</p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </article>
                  @endforeach
                 
                  
               </div>
            </section>
            <div class="clearfix"></div>
             @endforeach
         @endif
      
       </main>
       
       @include('layouts.user_sidebar')
    </div>
 </div>
   @include('layouts.banner')
@endsection