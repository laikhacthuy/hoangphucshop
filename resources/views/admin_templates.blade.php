<!DOCTYPE html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="" class="logo">
        Admin
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('public/backend/images/2.png')}}">
                <span class="username">
                    <?php
                        //cách 1:$name=Session::get('name');
                        // $name=session()->get('name', 'default');
                        // echo $name;
                    ?>
                    {{Auth::user()->name}}
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="{{route('logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{route('Product_Category.create')}}">Thêm danh mục</a></li>
						<li><a href="{{route('Product_Category.index')}}">Danh sách danh mục</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-list-alt"></i>
                        <span>Thương hiệu</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('Product_Brand.create') }}">Thêm thương thiệu</a></li>
						<li><a href="{{ route('Product_Brand.index') }}">Danh sách thương hiệu</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-envira"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('Product.create') }}">Thêm sản phẩm</a></li>
						<li><a href="{{ route('Product.index') }}">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Tài khoản</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('User.create') }}">Thêm tài khoản</a></li>
						<li><a href="{{ route('User.index') }}">Danh sách tài khoản</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#">
                        <i class="fa fa-first-order"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    @yield('content_admin')
    <div class="footer">
        <div class="wthree-copyright">
          <p>© 2020 Hoàng Phúc</p>
        </div>
    </div>
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<!-- morris JavaScript -->
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
    });
</script>
<script>
    CKEDITOR.replace('ckedittor');
</script>
<script>
    //jquery
    function loadavatar(input, id) {
      id = id || '#preview_img';
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $(id)
                      .attr('src', e.target.result)
                      .width(200)
                      .height(200);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
   $(function loadlist() {
    // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).width(200).height(200).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#image_list').on('change', function() {
        imagesPreview(this, 'div.gallery');
        $( ".gallery" ).show();
        $( ".gallery_image" ).hide();
    });
});
</script>
</body>
</html>
