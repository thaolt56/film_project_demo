<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta charset="UTF-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta name="theme-color" content="#234556">
      <meta http-equiv="Content-Language" content="vi" />
      <meta content="VN" name="geo.region" />
      <meta name="DC.language" scheme="utf-8" content="vi" />
      <meta name="language" content="Việt Nam">
      
      
      <link rel="shortcut icon" href="{{asset($info_web->logo)}}" type="image/x-icon" />
      <meta name="revisit-after" content="1 days" />
      <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
      <title>{{$meta_title}}</title>
      <meta name="description" content="{!!$meta_description!!}" />
      
      <link rel="canonical" href="{{Request::url()}}">
      <link rel="next" href="" />

      <meta property="og:locale" content="vi_VN" />
      <meta property="og:title" content="{{$meta_title}}" />
      <meta property="og:description" content="{!!$meta_description!!}" />
      <meta property="og:url" content="{{Request::url()}}" />
      <meta property="og:site_name" content="{{$meta_title}}" />
      
      <meta property="og:image" content="" />
      <meta property="og:image:width" content="300" />
      <meta property="og:image:height" content="55" />
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
      
      <link rel='stylesheet' id='bootstrap-css' href="{{asset('user-template/css/bootstrap.min.css?ver=5.7.2')}}" media='all' />
      <link rel='stylesheet' id='style-css' href="{{asset('user-template/css/style.css?ver=5.7.2')}}" media='all' />
      <link rel='stylesheet' id='wp-block-library-css' href="{{asset('user-template/css/style.min.css?ver=5.7.2')}}" media='all' />
      <script type='text/javascript' src="{{asset('user-template/js/jquery.min.js?ver=5.7.2')}}" id='halim-jquery-js'></script>
      <style 
      type="text/css" id="wp-custom-css">
         .textwidget p a img {
         width: 100%;
         }
      .search_ajax{
         position: relative;
      }
      .search_ajax .result{
         position: absolute;
         z-index: 1000;
         width: 100%;
         background-color: #11110f;
         
      }
     
      .image_search{
         display: block;
         float: left;
        width: 50px;
         height: auto;
         margin: 7px 7px;
      }
      .image_search img {
         margin: 0px;
      }
      .clear_both{
         clear: both;
      }
      .media{
         display: block;
         margin: 0%;
         border-bottom: 1px solid rgb(57, 55, 53);
      }
      .media:hover{
         background-color:#322c2c;
         cursor: pointer;
      }
    
      .media-body h5{
         padding: 15px;
         margin: 0px;
      }
      .media-body h6{
         margin: 0px;
      }
     
                         
      </style>
      <style>#header .site-title {background: url(https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png) no-repeat top left;background-size: contain;text-indent: -9999px;}</style>
   </head>
   <body class="home blog halimthemes halimmovies" data-masonry="">
      <header id="header">
         <div class="container">
            <div class="row" id="headwrap">
               <div class="col-md-2 col-sm-6 slogan" style="padding-left: 40px" >
                  <a href="{{route('user.home')}}"><img width="100px"  src="{{asset('upload/movie_images/lototomovie.jpg')}}"></a>
                  {{-- <p class="site-title"><a class="logo" href="" title="phim hay "><img src="{{asset('upload/movie_images/logo2.jpg')}}"></p> --}}
                  </a>
               </div>
               <div class="col-md-6 col-sm-6 halim-search-form hidden-xs">
                  <div class="header-nav">
                     <div class="col-xs-12">
                        <div class="search_ajax">
                           <form id="search-form-pc" name="halimForm" role="search" action="" method="GET">
                              <div class="form-group">
                                 <div class="input-group col-xs-12">
                                    <input id="search" type="text" name="s" class="form-control" placeholder="Tìm kiếm..." autocomplete="off" required>
                                    {{-- <i class="animate-spin hl-spin4 hidden"></i> --}}
                                   
                                </div>
                              </div>
                              
                           </form> 

                           <div class="result">
                             
                           </div>
                         
                        </div>
                     </div>
                   
                  </div>
               </div>
               <div class="col-md-4 hidden-xs bookmark">
                  <div id="get-bookmark" class="box-shadow"><i class="fa fa-bookmark" aria-hidden="true"></i><span> Bookmarks</span><span class="count">0</span></div>
                  {{-- <div id="bookmark-list" class="hidden bookmark-list-on-pc"> --}}
                     <ul style="margin: 0;"></ul>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div class="navbar-container">
         <div class="container">
            <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                  <span class="sr-only">Menu</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  {{-- <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                  <span class="hl-search" aria-hidden="true"></span>
                  </button> --}}
                  <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile　bookmark">
                  Bookmarks<i class="fa fa-bookmark" aria-hidden="true"></i>
                  <span class="count">0</span>
                  </button>
                  {{-- <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                  <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i class="fas fa-filter"></i></a>
                  </button> --}}
               </div>
               <div class="collapse navbar-collapse" id="halim">
                  <div class="menu-menu_1-container">
                     <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item active"><a title="Trang Chủ" href="{{route('user.home')}}">Trang Chủ</a></li>
                        <li class="mega"><a title="Phim Mới" href="{{route('user.new_movie')}}">Phim Mới</a></li>
                        <li class="mega dropdown">
                           <a title="Năm" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              @for($year=2010;$year<=2022;$year++)
                              <li><a title="Phim 2020" href="{{route('user.year',$year)}}">{{$year}}</a></li>
                              @endfor
                            
                              
                           </ul>
                        </li>
                        <li class="mega dropdown">
                           <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              @if($list_genre)
                                 @foreach ($list_genre as $item)
                                 <li><a title="{{$item->title}}" href="{{route('user.genre',$item->slug)}}">{{$item->title}}</a></li>
                              @endforeach
                              
                             @endif
                          </ul>
                        </li>
                        <li class="mega dropdown">
                           <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              @if($list_country)
                              @foreach ($list_country as $item)
                              <li><a title="{{$item->title}}" href="{{route('user.country',$item->slug)}}">{{$item->title}}</a></li>
                           @endforeach
                           
                          @endif
                           </ul>
                        </li>
                        <li><a title="Phim Lẻ" href="{{route('user.odd_movie')}}">Phim Lẻ</a></li>
                        <li><a title="Phim Bộ" href="{{route('user.series_movie')}}">Phim Bộ</a></li>
                        <li><a title="Phim Chiếu Rạp" href="{{route('user.theater_movie')}}">Phim Chiếu Rạp</a></li>
                     </ul>
                  </div>
                  {{-- <ul class="nav navbar-nav navbar-left" style="background:#000;">
                     <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                  </ul> --}}
               </div>
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
               <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
               <div id="mobile-user-login"></div>
            </div>
         </div>
      </div>
      </div>
      
      <div class="container">
         <div class="row fullwith-slider"></div>
      </div>

      @yield('content')

         <div class="clearfix"></div>
      <footer id="footer" class="clearfix">
         <div class="container footer-columns">
            <div class="row container">
               <div class="widget about col-xs-12 col-sm-4 col-md-8">
                 <p><a href="{{route('user.home')}}">Xem phim online</a> miễn phí chất lượng cao với phụ đề tiếng việt - thuyết minh - lồng tiếng. LototoPhim có nhiều thể loại phim phong phú, đặc sắc, nhiều bộ phim hay nhất - mới nhất.</p>
               </div>
               <div class="widget about col-xs-12 col-sm-4 col-md-2">
                 <span> Quy định</span>
                 <style>
                  #footer ul li {
                     padding:0px;
                  }
                  #footer ul {
                     padding-left:0px;
                  }

                 </style>
                 <ul>
                  <li>
                     <a href="#"><p> Điều khoản chung</p></a>
                  </li>
                  <li>
                     <a href="#"><p>Chính sách riêng tư</p></a>
                  </li>
                 </ul>
                  
               
               </div>
               <div class="widget about col-xs-12 col-sm-4 col-md-2">
                  <span> Giới thiệu</span>
                <ul>
                  <li> <a href="#"><p> Trang chủ</p></a></li>
                  <li><a href="#"><p>Facebook</p></a></li>
                </ul>
               
                
               </div>
            </div>
         </div>
      </footer>
   
      <div id='easy-top'></div>
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="fz9jKh1N"></script>
      <script type='text/javascript' src="{{asset('user-template/js/bootstrap.min.js?ver=5.7.2')}}" id='bootstrap-js'></script>
      <script type='text/javascript' src="{{asset('user-template/js/owl.carousel.min.js?ver=5.7.2')}}" id='carousel-js'></script>
     
      <script type='text/javascript' src="{{asset('user-template/js/halimtheme-core.min.js?ver=1626273138')}}" id='halim-init-js'></script>
    
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="YgZpuwCF"></script>
     
   
      <style>#overlay_mb{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0, 0, 0, 0.7);z-index:99999;cursor:pointer}#overlay_mb .overlay_mb_content{position:relative;height:100%}.overlay_mb_block{display:inline-block;position:relative}#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:600px;height:auto;position:relative;left:50%;top:50%;transform:translate(-50%, -50%);text-align:center}#overlay_mb .overlay_mb_content .cls_ov{color:#fff;text-align:center;cursor:pointer;position:absolute;top:5px;right:5px;z-index:999999;font-size:14px;padding:4px 10px;border:1px solid #aeaeae;background-color:rgba(0, 0, 0, 0.7)}#overlay_mb img{position:relative;z-index:999}@media only screen and (max-width: 768px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:400px;top:3%;transform:translate(-50%, 3%)}}@media only screen and (max-width: 400px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:310px;top:3%;transform:translate(-50%, 3%)}}</style>
    
      <style>
         #overlay_pc {
         position: fixed;
         display: none;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0, 0, 0, 0.7);
         z-index: 99999;
         cursor: pointer;
         }
         #overlay_pc .overlay_pc_content {
         position: relative;
         height: 100%;
         }
         .overlay_pc_block {
         display: inline-block;
         position: relative;
         }
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 600px;
         height: auto;
         position: relative;
         left: 50%;
         top: 50%;
         transform: translate(-50%, -50%);
         text-align: center;
         }
         #overlay_pc .overlay_pc_content .cls_ov {
         color: #fff;
         text-align: center;
         cursor: pointer;
         position: absolute;
         top: 5px;
         right: 5px;
         z-index: 999999;
         font-size: 14px;
         padding: 4px 10px;
         border: 1px solid #aeaeae;
         background-color: rgba(0, 0, 0, 0.7);
         }
         #overlay_pc img {
         position: relative;
         z-index: 999;
         }
         @media only screen and (max-width: 768px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 400px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
         @media only screen and (max-width: 400px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 310px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
      </style>
     
      <style>
         .float-ck { position: fixed; bottom: 0px; z-index: 9}
         * html .float-ck /* IE6 position fixed Bottom */{position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
         #hide_float_left a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;float: left;}
         #hide_float_left_m a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;}
         span.bannermobi2 img {height: 70px;width: 300px;}
         #hide_float_right a { background: #01AEF0; padding: 5px 5px 1px 5px; color: #FFF;float: left;}
      </style>
   </body>
</html>         
@yield('js')
<script>
   $(document).ready(function(){
       $('#search').keyup(function(){
           var key = $(this).val();
          
           if(key != ''){
            var data = {key:key};
           $.ajaxSetup({

            headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

             });
            $.ajax({
                type: "POST",
                url: "{{route('movie.search')}}",//this is only changes
                data: data,
                typeData:'json',
                success: function(data) {
                $('.result').show(1000);
                $('.result').html(data);
            
                // console.log(data);
           
                }
            });
           }else {
            $('.result').hide();
                $('.result').html('');
           }
         
       })
   })

//js banner_lototo
$(window).on('load',function(){
    $('#bannner_lototo').modal('show');
});

$('.bookmark').click(function(){
   alert('Chức năng này đang cập nhật! xin lỗi vì bất tiện này!')
});
</script>