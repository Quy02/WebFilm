@extends('layout')
@section('content')
<div class="row container" id="wrapper">
   <style>
      .abc{
         background-color: rgb(38, 255, 0);
         color: rgb(17, 74, 99);
      }
      </style>
            <div class="halim-panel-filter">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">Lịch sử phim đã xem</a> <span class="breadcrumb_last" aria-current="page"></span></span></span></div>
                     </div>
                  </div>
               </div>
               <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                  <div class="ajax"></div>
               </div>
            </div>
            <form method="post" action="{{ route('deleteHistory', ['customerId' => session('customer_id')]) }}">
               @csrf
               @method('delete') 
               <button type="submit" class="abc" onclick="return confirm('Bạn có chắc muốn xóa lịch sử xem?')">❌Xóa Lịch Sử</button>
           </form>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               <section>
                  <div class="section-bar clearfix">
                     <h1 class="section-title"><span>📜 HISTORY</span></h1>
                  </div>
                   <div class="section-bar clearfix">

                    
                  </div>
                  <div class="halim_box">
                     @foreach($lichsu as $key => $mov)
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{route('movie',$mov->slug)}}">
                              <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$mov->image)}}" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="{{$mov->title}}"></figure>
                              <span class="status">
                                   @if($mov->resolution==0)
                                              HD
                                          @elseif($mov->resolution==1)
                                            SD
                                          @elseif($mov->resolution==2)
                                            HDCam
                                          @elseif($mov->resolution==3)
                                             Cam
                                          @elseif($mov->resolution==4)
                                            FullHD
                                          @else 
                                            Trailer

                                          @endif

                              </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                {{$mov->episode_count}}/{{$mov->sotap}} |
                                     @if($mov->phude==0)
                                        Phụ đề
                                      @else
                                        Thuyết minh
                                      @endif
                              </span> 
                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title ">
                                    <p class="entry-title">{{$mov->title}}</p>
                                    <p class="original_title">Xem lúc: {{$mov->thoigian}}</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article>
                     @endforeach
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">

                     {!! $lichsu->links("pagination::bootstrap-4") !!}
                  </div>
               </section>
            </main>
            @include('pages.include.sidebar')
         </div>
@endsection