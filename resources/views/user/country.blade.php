@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row container" id="wrapper">
       <div class="halim-panel-filter">
          <div class="panel-heading">
             <div class="row">
                <div class="col-xs-6">
                   <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{$country->title}}</a> » <span class="breadcrumb_last" aria-current="page">2020</span></span></span></div>
                </div>
             </div>
          </div>
          <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
             <div class="ajax"></div>
          </div>
       </div>
       <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
          <section>
             <div class="section-bar clearfix">
                <h1 class="section-title"><span>{{$country->title}}</span></h1>
             </div>
             @include('layouts.filter')
             <div class="halim_box">
               @if ($movie_country->total() > 0)
                     @foreach ($movie_country as $item)
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{route('user.movie',$item->slug)}}" title="{{$item->title}}">
                              <figure><img class="lazy img-responsive" src="{{asset($item->movie_image)}}" alt="{{$item->title}}" title="{{$item->title}}"></figure>
                              <span class="status">
                                 @if($item->episode!=0)
                                 {{$list_resolution[$item->resolution].'-Tập'.$item->mov_episode_count.'/'.$item->episode}}
                                 @else
                                 {{$list_resolution[$item->resolution]}}
                                 @endif
                                 </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>{{$list_sub[$item->sub]}}</span> 
                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title ">
                                    <p class="entry-title">{{$item->title}}</p>
                                    <p class="original_title">{{$item->name_eng}}</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article>
                     @endforeach
               @else
               <div class="alert alert-warning" role="alert">
                  <span>Rất tiếc! Chưa có phim bạn tìm kiếm!</span>
               </div>
               @endif
              
               
             
             </div>
             <div class="clearfix"></div>
             <div class="text-center">
               {{$movie_country->links()}}
             </div>
          </section>
       </main>
       
       @include('layouts.user_sidebar')
    </div>
 </div>
@endsection