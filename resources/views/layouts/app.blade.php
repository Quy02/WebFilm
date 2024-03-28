
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
  <head>
    <title>
        Admin Web Phim
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta
      name="keywords"
      content="Admin Web Phim"
    />
    <script type="application/x-javascript">
      addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

                      function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('backend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- font-awesome icons CSS -->
    <link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- //font-awesome icons CSS-->
    <!-- side nav css file -->
    <link
      href="{{asset('backend/css/SidebarNav.min.css')}}"
      media="all"
      rel="stylesheet"
      type="text/css"
    />
    <!-- //side nav css file -->
    <!-- js-->
    <script src="{{asset('backend/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('backend/js/modernizr.custom.js')}}"></script>
    <!--webfonts-->
    <link
      href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
      rel="stylesheet"
    />
    <!--//webfonts-->
    <!-- chart -->
    <script src="{{asset('backend/js/Chart.js')}}"></script>
    <!-- //chart -->
    <!-- Metis Menu -->
    <script src="{{asset('backend/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>
    <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet" />
    <!--//Metis Menu -->
    <style>
      #chartdiv {
        width: 100%;
        height: 295px;
      }
    </style>
   
    <link href="{{asset('backend/css/owl.carousel.css')}}" rel="stylesheet" />
    <script src="{{asset('backend/js/owl.carousel.js')}}"></script>
    <script>
      $(document).ready(function () {
        $('#owl-demo').owlCarousel({
          items: 3,
          lazyLoad: true,
          autoPlay: true,
          pagination: true,
          nav: true,
        });
      });
    </script>
    <!-- //requried-jsfiles-for owl -->
  </head>

  <body class="cbp-spmenu-push">
    @if(Auth::check())
    <div class="main-content">

      <div
        class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left"
        id="cbp-spmenu-s1"
      >
        <!--left-fixed -navigation-->
        <aside class="sidebar-left">
          <nav class="navbar navbar-inverse">
            <div class="navbar-header">
              <button
                type="button"
                class="navbar-toggle collapsed"
                data-toggle="collapse"
                data-target=".collapse"
                aria-expanded="false"
              >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <h1>
                <a class="navbar-brand" href="{{url('/home')}}"
                  ><span class="fa fa-area-chart"></span> Glance<span
                    class="dashboard_text"
                    >Design dashboard</span
                  ></a
                >
              </h1>
            </div>
            <div
              class="collapse navbar-collapse"
              id="bs-example-navbar-collapse-1"
            >
              <ul class="sidebar-menu">
                <li class="header">Quản lý web webphim</li>
                <li class="treeview">
                  <a href="{{url('/home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  </a>
                </li>
                <li class="treeview">
                  <a href="{{route('info.create')}}">
                    <i class="fa fa-dashboard"></i> <span>Thông tin website</span>
                  </a>
                </li>
                
                @php
                  $segment = Request::segment(1);
                @endphp
                <li class="treeview {{($segment=='category') ? 'active' : ''}}">
                  <a href="#">
                    <i class="fa fa-file"></i>
                    <span>Danh mục phim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('category.create')}}"
                        ><i class="fa fa-angle-right"></i> Thêm danh mục</a
                      >
                    </li>
                    <li>
                      <a href="{{route('category.index')}}"
                        ><i class="fa fa-angle-right"></i> Liệt kê danh mục</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="treeview {{($segment=='genre') ? 'active' : ''}}">
                  <a href="#">
                    <i class="fa fa-child"></i>
                    <span>Thể loại phim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('genre.create')}}"
                        ><i class="fa fa-angle-right"></i> Thêm thể loại</a
                      >
                    </li>
                    <li>
                      <a href="{{route('genre.index')}}"
                        ><i class="fa fa-angle-right"></i> Liệt kê thể loại</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="treeview {{($segment=='country') ? 'active' : ''}}">
                  <a href="#">
                    <i class="fa fa-globe"></i>
                    <span>Quốc gia phim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('country.create')}}"
                        ><i class="fa fa-angle-right"></i> Thêm quốc gia</a
                      >
                    </li>
                    <li>
                      <a href="{{route('country.index')}}"
                        ><i class="fa fa-angle-right"></i> Liệt kê quốc gia</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="treeview {{($segment=='movie') ? 'active' : ''}}">
                  <a href="#">
                    <i class="fa fa-film"></i>
                    <span>Phim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('movie.create')}}"
                        ><i class="fa fa-angle-right"></i> Thêm phim</a
                      >
                    </li>
                    <li>
                      <a href="{{route('movie.index')}}"
                        ><i class="fa fa-angle-right"></i> Liệt kê phim</a
                      >
                    </li>
                  </ul>
                </li>

               
                {{-- <li class="treeview">
                  <a href="#">
                    <i class="fa fa-video-camera"></i>
                    <span>Tập phim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('episode.create')}}"
                        ><i class="fa fa-angle-right"></i> Thêm tập phim</a
                      >
                    </li>
                    <li>
                      <a href="{{route('episode.index')}}"
                        ><i class="fa fa-angle-right"></i> Liệt kê tập phim</a
                      >
                    </li>
                  </ul>
                </li> --}}
            </ul>
            <div class="clearfix"></div>
          </div>
          <!--notification menu end -->
          <div class="clearfix"></div>
        </div>
        <div class="sticky-header header-section">
          <div class="header-left">
            <!--toggle button start-->
            <button id="showLeftPush"><i class="fa fa-bars"></i></button>
            <!--toggle button end-->
            <div class="profile_details_left">
              <!--notifications of menu start -->
              <ul class="nofitications-dropdown">
                
              
               
              </ul>
              <div class="clearfix"></div>
            </div>
            <!--notification menu end -->
            <div class="clearfix"></div>
          </div>
          <div class="header-right">
         
            <!--//end-search-box-->

            <div class="profile_details">
              <ul>
                <li class="dropdown profile_details_drop">
                  <a
                    href="#"
                    class="dropdown-toggle"
                    data-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <div class="profile_img">
                      <span class="prfil-img"
                        ><img src="images/2.jpg" alt="" />
                      </span>
                      <div class="user-name">
                        <p>Admin Name</p>
                      </div>
                      <i class="fa fa-angle-down lnr"></i>
                      <i class="fa fa-angle-up lnr"></i>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                  <ul class="dropdown-menu drp-mnu">
                   <form action="{{route('logout')}}" method="POST">
                      @csrf
                      <i class="fa fa-sign-out"></i><input type="submit" class="btn btn-danger btn-sm" value="Logout"/>
                    </form> 
                  </ul>
                </li>
              </ul>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="header-right">
          <!--search-box-->
          <div class="search-box">
            <form class="input">
              <input
                class="sb-search-input input__field--madoka"
                placeholder="Search..."
                type="search"
                id="input-31"
              />
              <label class="input__label" for="input-31">
                <svg
                  class="graphic"
                  width="100%"
                  height="100%"
                  viewBox="0 0 404 77"
                  preserveAspectRatio="none"
                >
                  <path d="m0,0l404,0l0,77l-404,0l0,-77z" />
                </svg>
              </label>
            </form>
          </div>
          <!--//end-search-box-->
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a
                  href="#"
                  class="dropdown-toggle"
                  data-toggle="dropdown"
                  aria-expanded="false"
                >
                  <div class="profile_img">
                    <span class="prfil-img"
                      ><img src="images/2.jpg" alt="" />
                    </span>
                   
                    <i class="fa fa-angle-down lnr"></i>
                    <i class="fa fa-angle-up lnr"></i>
                    <div class="clearfix"></div>
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu">
                  <li>
                    <a href="#"><i class="fa fa-cog"></i> Settings</a>
                  </li>
                  <li>
                     <!-- <a href="#"><i class="fa fa-sign-out"></i> Logout</a>   -->
                    <form action="{{route('logout')}}" method="POST">
                      @csrf
                      <i class="fa fa-sign-out"></i><input type="submit" class="btn btn-danger btn-sm" value="Logout"/>
                    </form> 
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>

      </div>
      <!-- //header-ends -->
      <!-- main content start-->
      <div id="page-wrapper">
        <div class="main-page">
          <div class="col_3">
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-file icon-rounded"></i>
                <a href="{{route('category.index')}}">
                <div class="stats">
                  <h5><strong>{{$category_total}}</strong></h5>
                  <span>Danh mục phim</span>
                </div>
              </a>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-child user1 icon-rounded"></i>
                <a href="{{route('genre.index')}}">
                <div class="stats">
                  <h5><strong>{{$genre_total}}</strong></h5>
                  <span>Thể loại phim</span>
                </div>
                </a>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-globe user2 icon-rounded"></i>
                <a href="{{route('country.index')}}">
                <div class="stats">
                  <h5><strong>{{$country_total }}</strong></h5>
                  <span>Quốc gia phim</span>
                </div>
                </a>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-film dollar1 icon-rounded"></i>
                <a href="{{route('movie.index')}}">
                <div class="stats">
                  <h5><strong>{{$movie_total}}</strong></h5>
                  <span>Phim</span>
                </div>
                </a>
              </div>
            </div>

            <div class="clearfix"></div>
          </div>
          <div class="row">
            @include('layouts.baocao')
        </div>
          <div class="row-one widgettable">
            
          </div>
         
          <!-- for amcharts js -->

          <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
          <script src="{{asset('backend/js/amcharts.js')}}"></script>
          <script src="{{asset('backend/js/serial.js')}}"></script>
          <script src="{{asset('backend/js/export.min.js')}}"></script>
          <link
            rel="stylesheet"
            href="{{asset('backend/css/export.css')}}"
            type="text/css"
            media="all"
          />
          <script src="{{asset('backend/js/light.js')}}"></script>
          <!-- for amcharts js -->
          <script src="{{asset('backend/js/index1.js')}}"></script>
         
          <div class="col-md-12">
            @yield('content')
           
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      
      <!--footer-->
       <div class="footer">
       
      </div> 
      <!--//footer-->
    </div>
    @else
    @yield('content_login')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @endif
    
   

    <!-- for toggle left push menu script -->
    <script src="{{asset('backend/js/classie.js')}}"></script>
    <script>
      var menuLeft = document.getElementById('cbp-spmenu-s1'),
        showLeftPush = document.getElementById('showLeftPush'),
        body = document.body;

      showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
      };

      function disableOther(button) {
        if (button !== 'showLeftPush') {
          classie.toggle(showLeftPush, 'disabled');
        }
      }
    </script>
    <!-- //Classie -->
    <!-- //for toggle left push menu script -->
    <!--scrolling js-->
    <script>
      $(document).ready( function () {
          $('#tablephim').DataTable();
      } );
    </script>
    <script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('backend/js/scripts.js')}}"></script>
    <!--//scrolling js-->
    <!-- side nav js -->
    <script src="{{asset('backend/js/SidebarNav.min.js')}}" type="text/javascript"></script>
    <script>
      $('.sidebar-menu').SidebarNav();
    </script>


  
    <!-- //for index page weekly sales java script -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('backend/js/bootstrap.js')}}"></script>
    <!-- //Bootstrap Core JavaScript -->
    <script type="text/javascript">
    
      function ChangeToSlug()
          {
              var slug;
           
              //Lấy text từ thẻ input title 
              slug = document.getElementById("slug").value;
              slug = slug.toLowerCase();
              //Đổi ký tự có dấu thành không dấu
                  slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                  slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                  slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                  slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                  slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                  slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                  slug = slug.replace(/đ/gi, 'd');
                  //Xóa các ký tự đặt biệt
                  slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                  //Đổi khoảng trắng thành ký tự gạch ngang
                  slug = slug.replace(/ /gi, "-");
                  //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                  //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                  slug = slug.replace(/\-\-\-\-\-/gi, '-');
                  slug = slug.replace(/\-\-\-\-/gi, '-');
                  slug = slug.replace(/\-\-\-/gi, '-');
                  slug = slug.replace(/\-\-/gi, '-');
                  //Xóa các ký tự gạch ngang ở đầu và cuối
                  slug = '@' + slug + '@';
                  slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                  //In slug ra textbox có id “slug”
              document.getElementById('convert_slug').value = slug;
          }
           
  
     
     
  </script>
  <script>
    $('.show_video').click(function(){
      var movie_id = $(this).data('movie_video_id');
      var episode_id = $(this).data('video_episode');

      $.ajax({
                url:'{{route('watch-video')}}',
                method:"POST",
                dataType:"JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{movie_id:movie_id,episode_id:episode_id},
                success:function(data){
                    $('#video_title').html(data.video_title);
                    $('#video_link').html(data.video_link);
                    $('#video_desc').html(data.video_desc); 
                    $('#videoModal').modal('show');
                }

            }); 
    })
  </script>
  <script>
     $('.category_choose').change(function(){
      var category_id = $(this).val();
      var movie_id = $(this).attr('id');
      $.ajax({
        url:"{{route('category-choose')}}",
        method:"GET",
        data:{movie_id:movie_id,category_id:category_id},
        success:function(data)
        {
          alert('Thay đổi danh mục thành công');
        }
      })
     })
  </script>
  <script>
    $('.country_choose').change(function(){
     var country_id = $(this).val();
     var movie_id = $(this).attr('id');
     $.ajax({
       url:"{{route('country-choose')}}",
       method:"GET",
       data:{movie_id:movie_id,country_id:country_id},
       success:function(data)
       {
         alert('Thay đổi quốc gia thành công');
       }
     })
    })
 </script>
 <script>
  $('.trangthai_choose').change(function(){
   var trangthai_val = $(this).val();
   var movie_id = $(this).attr('id');
   $.ajax({
     url:"{{route('trangthai-choose')}}",
     method:"GET",
     data:{movie_id:movie_id,trangthai_val:trangthai_val},
     success:function(data)
     {
       alert('Thay đổi trạng thái thành công');
     }
   })
  })
</script>
<script>
  $('.phimhot_choose').change(function(){
   var phimhot_val = $(this).val();
   var movie_id = $(this).attr('id');
   $.ajax({
     url:"{{route('phimhot-choose')}}",
     method:"GET",
     data:{movie_id:movie_id,phimhot_val:phimhot_val},
     success:function(data)
     {
       alert('Thay đổi phim hot thành công');
     }
   })
  })
</script>
<script>
  $('.resolution_choose').change(function(){
   var resolution_val = $(this).val();
   var movie_id = $(this).attr('id');
   $.ajax({
     url:"{{route('resolution-choose')}}",
     method:"GET",
     data:{movie_id:movie_id,resolution_val:resolution_val},
     success:function(data)
     {
       alert('Thay đổi định dạng thành công');
     }
   })
  })
</script>
<script type="text/javascript">
       
  $(document).on('change','.file_image',function(){

      var movie_id = $(this).data('movie_id');
      var files = $("#file-"+movie_id)[0].files;
      
      //console.log(files);
      var image = document.getElementById("file-"+movie_id).files[0];
      

      var form_data = new FormData();

      form_data.append("file", document.getElementById("file-"+movie_id).files[0]);
      form_data.append("movie_id",movie_id);


        
              $.ajax({
                  url:"{{route('update-image-movie-ajax')}}",
                  method:"POST",
                  headers:{
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data:form_data,

                  contentType:false,
                  cache:false,
                  processData:false,

                  success:function(){
                      location.reload();
                      $('#success_image').html('<span class="text-success">Cập nhật hình ảnh thành công</span>');
                  }
              });
      
      
      
  });
</script>
   <script>
      $(".select-year").change(function(){
        var year = $(this).find(":selected").val();
        var id_phim = $(this).attr('id');
        $.ajax({
          url:"{{route('update-year-phim')}}",
          method:"GET",
          data:{year:year,id_phim:id_phim},
          success:function(data)
          {
            alert('Thay đổi năm phim thành công');
          }
        })
      })
   </script>
   <script>
    $(".select-topview").change(function(){
      var topview = $(this).find(":selected").val();
      var id_phim = $(this).attr('id');
      $.ajax({
        url:"{{route('update-topview-phim')}}",
        method:"GET",
        data:{topview:topview,id_phim:id_phim},
        success:function(data)
        {
          alert('Thay đổi top view thành công');
        }
      })
    })
 </script>
  <script>
    $(".select-season").change(function(){
      var season = $(this).find(":selected").val();
      var id_phim = $(this).attr('id');
      $.ajax({
        url:"{{route('update-season-phim')}}",
        method:"GET",
        data:{season:season,id_phim:id_phim},
        success:function(data)
        {
          alert('Thay đổi season thành công');
        }
      })
    })
 </script>
  </body>
</html>
