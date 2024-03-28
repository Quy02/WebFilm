@extends('layout')
@section('content')
<div class="row container" id="wrapper">         
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               <section id="content" class="test">
                  
                  <div class="clearfix wrap-content">
                    
                     <div class="halim-movie-wrapper">
                        <div class="title-block">
                           <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                              <div class="halim-pulse-ring"></div>
                           </div>
               

              
                        <div class="movie_info col-xs-12">
                           <div class="movie-poster col-md-6">
                              <img class="movie-thumb" src="{{asset('uploads/movie/'.$movie->image)}}" alt="{{$movie->title}}">
                                  @if($movie->resolution!=5)
                                    @if($episode_current_list_count>0)
                                    @if(session('user'))
                                    <form id="SaveHistoryForm" action="{{ route('SaveHistory', ['movie' => $movie->id, 'customerId' => session('customer_id')]) }}" method="post">
                                    @endif
                                       @csrf
                                       <button type="submit" class="bwa-content">
                                           <div class="loader"></div>
                                           <a href="{{ url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode) }}" class="bwac-btn">
                                               <i class="fa fa-play"></i>
                                           </a>
                                       </button>
                                   </form>

                                    @endif
                                  @else
                                  <a href="#watch_trailer" style="display: block;" class="btn btn-primary watch_trailer">Xem Trailer</a>
                                 
                              @endif
                           
                           </div>
                           <div class="film-poster col-md-9">
                              <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                              <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->name_eng}}</h2>
                              <ul class="list-info-group">
                                 <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                      @if($movie->resolution==0)
                                              HD
                                          @elseif($movie->resolution==1)
                                            SD
                                          @elseif($movie->resolution==2)
                                            HDCam
                                          @elseif($movie->resolution==3)
                                             Cam
                                          @elseif($movie->resolution==4)
                                            FullHD
                                          @elseif($movie->resolution==5)
                                            Trailer
                                          @else
                                          abc
                                          @endif
                                 </span>
                                 @if($movie->resolution!=5)
                                 <span class="episode">
                                     @if($movie->phude==0)
                                        Phụ đề
                                      @else
                                        Thuyết minh
                                      @endif
                                 </span>
                                 @endif
                               </li>
                                 
                                 <li class="list-info-group-item"><span>Thời lượng</span> : 
                                  {{$movie->thoiluong}}
                                 </li>
                                 <li class="list-info-group-item"><span>Like <i class="fa-brands fa-gratipay" style="color: #ff0088;"></i> : 
                                    {{$favoriteCount}}    📒Lưu: {{$saveCount}}
                                 </li>
                                

                                 <li class="list-info-group-item"><span>Thể loại</span> : 
                                  @foreach($movie->movie_genre as $gen)
                                    <a href="{{route('genre',$gen->slug)}}" rel="category tag">{{$gen->title}}</a>
                                  @endforeach

                                 </li>
                                 <li class="list-info-group-item"><span>Danh mục</span> : 
                                    <a href="{{route('category',$movie->category->slug)}}" rel="category tag">{{$movie->category->title}}</a>
                                 </li>
                                 <li class="list-info-group-item"><span>Quốc gia</span> : 
                                    <a href="{{route('country',$movie->country->slug)}}" rel="tag">{{$movie->country->title}}</a>
                                 </li>
                                  <li class="list-info-group-item"><span>Tập phim mới nhất</span> : 
                                          @foreach($episode as $key =>$ep)
                                          <a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}" rel="tag">Tập {{$ep->episode}}</a>
                                          @endforeach
                                 </li>
                                 <li class="list-info-group-item"><span>Đánh giá: 
                                    {{$danhgia ? number_format($danhgia, 1) : '0.0'}} ⭐    Lượt đánh giá: {{$danhgia2}} 
                                 </li>
                           </div>
                        </div>
                     </div>





<style>
    /* CSS chỉ để minh họa, bạn có thể thay đổi theo ý của mình */
    .button-container {
        display: flex;
        gap: 10px; /* Khoảng cách giữa các button là 10px */
    }
</style>

@if(session('user'))
    <div class="row">
        <div class="col-xs-1">
            <div class="button-container">
                <!-- Nút Lưu -->
                <form id="favoriteForm2" data-id="{{ $movie->id }}" data-user="{{ session('customer_id') }}" data-check="2" action="{{ route('favorite.toggle', ['movie' => $movie->id, 'user' => session('customer_id'), 'check' => 2]) }}" method="post">
                    @csrf
                    <button type="button" id="SaveButton" class="btn {{ $isSave ? 'btn-warning' : 'btn-success' }}">
                        @if($isSave == 'yes')
                            <i class="fa-solid fa-bookmark fa-beat fa-xl" style="color: #fff700;"></i>
                            Đã Lưu
                        @else
                            <i class="fa-solid fa-bookmark fa-beat fa-xl" style="color: #fff700;"></i>
                            Lưu
                        @endif
                    </button>
                </form>
            </div>
        </div><br><br>
        <div class="col-xs-1">
            <div class="button-container">
                <!-- Nút Yêu thích -->
                <form id="favoriteForm" data-id="{{ $movie->id }}" data-user="{{ session('customer_id') }}" data-check="1" action="{{ route('favorite.toggle', ['movie' => $movie->id, 'user' => session('customer_id'), 'check' => 1]) }}" method="post">
                    @csrf
                    <button type="button" id="favoriteButton" class="btn {{ $isFavorite ? 'btn-primary' : 'btn-success' }}">
                        @if($isFavorite == 'yes')
                            <i class="fa-sharp fa-solid fa-heart fa-beat fa-xl" style="color: #ff002b;"></i>
                            Đã thích
                        @else
                            <i class="fa-sharp fa-solid fa-heart fa-beat fa-xl" style="color: #ff002b;"></i>
                            Yêu thích
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
@endif
                      

                     <div class="clearfix"></div>
                     <div id="halim_trailer"></div>
                     <div class="clearfix"></div>
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                              {{$movie->description}}
                           </article>
                        </div>
                     </div>
                     <!--Tags phim-->
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Tags phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                            @if($movie->tags!=NULL)
                              @php
                              $tags = array();
                              $tags = explode(',', $movie->tags);

                              @endphp
                              @foreach($tags as $key => $tag)
                                <a href="{{url('tag/'.$tag)}}">{{$tag}}</a>
                              @endforeach
                            @else 
                            {{$movie->title}}
                            @endif
                           </article>
                        </div>
                     </div>


                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận 💬</span></h2>
                     </div>

                      @if(session('user'))
                    <form action="{{ route('comments.store') }}" method="post">
                     @csrf
                     <input type="hidden" name="id_movie" value="{{ $movie->id }}">
                     <input type="hidden" name="id_customer" value="{{session('customer_id')}}"> 
                     <input type="hidden" name="name_customer" value="{{session('user')}}"> 
                     <style>
                        .comment{
                           background: #fffeb6;
                        }
                        .comment2{
                           font-weight: bold;
                           background: #3cc4ff;
                           color:brown;
                        }
                        </style>


                    <div style="display: flex; align-items: flex-start;">
                            <div style="margin-right: 15px;">
                                <textarea name="comment" rows="5" class = "comment" placeholder="Write your comment ..." style="width: 600px; height: 50px; margin-left: 15px; color: black;font-size: 15px;"></textarea>
                            </div>
                        <div>
                             <button type="submit" class = "comment2" style="display: block;">Comment <i class="fa-solid fa-comment"></i></button>
                        </div>
                    </div>

                     </form>    
                     @else
                     Bạn cần đăng nhập để bình luận!
                     @endif        
                     <div class="row" style="margin-left: 15px">
                        @include('pages.comment')
                    </div>
                     @if($movie->trailer!=NULL)
                      <!--Trailer phim-->
                    <div class="section-bar clearfix">
                        <h2 class="section-title" style="margin-left: 20px;"><span style="color:#ffed4d">Trailer phim</span></h2>

                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            @php
                            $trailer = substr($movie->trailer, 17);
                            @endphp
                           <article id="watch_trailer" class="item-content">

                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                           </article>
                        </div>
                     </div>
                     @endif
                  </div>
               </section>
               <section class="related-movies">
                  <div id="halim_related_movies-2xx" class="wrap-slider">
                     <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                     </div>
                     <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach($related as $key => $hot)
                        <article class="thumb grid-item post-38498">
                           <div class="halim-item">
                              <a class="halim-thumb" href="{{route('movie',$hot->slug)}}" title="{{$hot->title}}">
                                 <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$hot->image)}}" alt="{{$hot->title}}" title="Đại Thánh Vô Song"></figure>
                                 <span class="status">
                                    @if($hot->resolution==0)
                                             HD
                                         @elseif($hot->resolution==1)
                                           SD
                                         @elseif($hot->resolution==2)
                                           HDCam
                                         @elseif($hot->resolution==3)
                                            Cam
                                         @else
                                           FullHD

                                         @endif

                                 </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                     @if($hot->phude==0)
                                        Phụ đề
                                      @else
                                        Thuyết minh
                                      @endif
                                 </span> 
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                       <p class="entry-title">{{$hot->title}}</p>
                                       <p class="original_title">{{$hot->name_eng}}</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </article>
                        @endforeach
                       
                     </div>
                     <script>
                        $(document).ready(function($) {				
                        var owl = $('#halim_related_movies-2');
                        owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
                     </script>
                  </div>
               </section>
               <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                     <script>
                        $(document).ready(function () {
    $('button[id^="favoriteButton"], button[id^="SaveButton"]').click(function () {
        var form = $(this).closest('form');
        var formData = form.serialize();

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: formData,
            success: function (response) {

                // Update Like count
                location.reload();
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });
});
                     </script>
            </main>
            @include('pages.include.sidebar')
         </div>
@endsection