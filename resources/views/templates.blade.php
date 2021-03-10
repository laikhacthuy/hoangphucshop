<!DOCTYPE hmtl>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{asset('public/fontend/css/libs/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('public/fontend/css/libs/owl.theme.css')}}">
	<link rel="stylesheet" href="{{asset('public/fontend/css/libs/animate.css')}}">
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/libs/jquery-3.4.1.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/libs/owl.carousel.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/project.js')}}"></script>
    <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('public/fontend/dist/notiflix-aio-2.7.0.min.js')}}"></script>
	<link rel="stylesheet"  type="text/css" href="{{asset('public/fontend/css/libs/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/fontend/fonts/awesome.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/fontend/css/libs/hover.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/fontend/css/style.css')}}">
</head>
<body>
<div class="khung d-block">
    <div class="container">
        <div class="d-flex row">
            <div class="logo col-sm-2 col-xs-12">
                <a href="{{route('home')}}"><img src="{{asset('public/fontend/images/logo.gif')}}" alt="" height="45px" width="130px"></a>
            </div>
            <div class="col-sm-6 col-xs-12">
                <form action="" method="get" class="search" id="form_search">
                    {{ csrf_field() }}
                    <div class="input-group bg-light rounded-pill">
                        <input type="text" class="form-control rounded-pill border-0 bg-light" placeholder="Bạn đang tìm gì?" id="search_input" required>
                        <div class="input-group-append">
                            <button class="btn btn-link rounded-pill" type="submit" id="button_search"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <ul class="search_result" style="display: none">
                    </ul>
                </form>
            </div>
            <div class="col-sm-4 col-xs-12">
                <ul class="icon-head text-right">
                    @if(isset(Auth::user()->name))
                        <li>
                            {{ Auth::user()->name }}
                        </li>
                        <li>
                            <a href="{{ route('historyorder',Auth::user()->id) }}" class="Wobble-Vertical" title="Xem lịch sử mua hàng"><i class="fa fa-bookmark-o"></i></a>
                        </li>
                        <li>
                            <a class="Wobble-Vertical" href="{{ route('giohang') }}" title="Giỏ hàng"><i class="fa fa-shopping-basket"></i></a>
                        </li>
                        <li>
                            <a class="Wobble-Vertical" href="{{ route('logout_customer') }}" title="Đăng xuất"><i class="fa fa-power-off"></i></a>
                        </li>
                    @else
                        <li>
                            <button type="button" class="Wobble-Vertical user" data-toggle="modal" data-target="#exampleModalCenter" title="Đăng nhập">
                                <i class="fa fa-user"></i>
                            </button>
                        </li>
                        <li>
                            <a class="Wobble-Vertical" href="{{ route('giohang') }}" title="Giỏ hàng"><i class="fa fa-shopping-basket"></i></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    {{-- Modal login and register--}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <div class="row">
                            <div class="btn-group btn-group-justified">
                                <a href="#" class="btn btn-defaul btn-lg" id="login_link"  style="background-color: #50C7C7">Login</a>
                                <a href="#" class="btn btn-defaul btn-lg" id="registration_link">Register</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    {{-- form login --}}
                    <form id="login_form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tài khoản</label>
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Nhập tài khoản của bạn" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu của bạn" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Duy trì đăng nhập</label>
                        </div>
                        <div class="alert alert-danger" id="login_notifi" style="display: none">Tài khoản hoặc mật khẩu sai</div>
                        <div>
                            <button type="submit" class="btn btn-primary login_home">Login</button>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter2" onclick="modal()">Quên mật khẩu?</a>
                    </form>
                    {{-- form register --}}
                    <form id="registration_form" style="display: none" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên người dùng</label>
                            <input type="text" class="form-control" name="create_name" id="create_name"  placeholder="Nhập tên người dùng" >
                            <div class="alert alert-danger notifi" id="create_name_error" style="display: none"></div>
                        </div>
                        <div class="form-group">
                            <label>Tài khoản</label>
                            <input type="text" class="form-control" name="create_username" id="create_username"  placeholder="Nhập tên tài khoản" >
                            <div class="alert alert-danger notifi" id="create_username_error" style="display: none"></div>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="create_password" id="create_password" placeholder="Nhập mật khẩu" >
                            <div class="alert alert-danger notifi" id="create_password_error" style="display: none"></div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="create_email" id="create_email" placeholder="Nhập email của bạn" >
                            <div class="alert alert-danger notifi" id="create_email_error" style="display: none"></div>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="create_phone" id="create_phone" placeholder="Nhập số điện thoại của bạn" >
                            <div class="alert alert-danger notifi" id="create_phone_error" style="display: none"></div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning register_home">Đăng ký</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="social-buttons">
                        <div>
                            <h4><b>Login With</b></h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-info btn-lg btn_facebook">
                                    <i class="fa fa-facebook-official">Facebook</i>
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-danger  btn_gmail">
                                    <i class="fa fa-google"></i> Gmail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Modal Reset password--}}
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quên mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="get" id="form_resetpass">
                {{ csrf_field() }}
                <div class="modal-body">
                <div class="resetpassword_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Nhập email đăng ký tài khoản</label>
                                    <input type="email" id="resetpassword" name="resetpassword" class="form-control" required>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    {{--  --}}
</div>
<!-- xong header -->
<div class="wrap-nav">
        <div class="container">
            <nav class="main-nav d-flex justify-content-center">
                <ul>
                    <li><a href="{{route('home')}}">HOME</a></li>
                    <li class="has-sub-menu">
                        <a href="{{route('danhmucsanpham','Dienthoai')}}"><i class="fa fa-mobile"></i> ĐIỆN THOẠI <i class="fa fa-caret-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('thuonghieu','iphone') }}">IPHONE</a></li>
                            <li><a href="{{ route('thuonghieu','samsung') }}">SAM SUNG</a></li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="{{route('danhmucsanpham','Laptop')}}"><i class="fa fa-laptop"></i> LAPTOP <i class="fa fa-caret-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('thuonghieu','macbook') }}">MACBOOK</a></li>
                            <li><a href="{{ route('thuonghieu','hp') }}">HP</a></li>
                            <li><a href="{{ route('thuonghieu','dell') }}">DELL</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('danhmucsanpham','Table')}}"><i class="fa  fa-tablet"></i> TABLET </a></li>
                    <li class="has-sub-menu">
                        <a href="#"><i class="fa fa-clock-o"></i> ĐỒNG HỒ</a>
                    </li>
                    <li><a href="#"><i class="fa fa-headphones"></i> PHỤ KIỆN </a></li>
                    <li><a href="#"><i class="fa  fa-star"></i> SIM THẺ </a></li>
                </ul>
            </nav>
        </div>
</div>
<!--Xong menu -->
<div>
    @yield('banner')
</div>
<!--Xong baner -->
<div>
    @yield('content')
</div>
<!--start footer -->
<div id="footer" class="pb-0">
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Truy cập nhanh</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="{{route('home')}}"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Điện thoại</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Laptop</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Đồng hồ</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Phụ kiện</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Tablet</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Sim thẻ</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Giới thiệu siêu thị</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="quychehoatdong"><i class="fa fa-angle-double-right"></i>Quy chế hoạt động</a></li>
                    <li><a href="noiquysieuthi"><i class="fa fa-angle-double-right"></i>Nội quy siêu thị</a></li>
                    <li><a href="chatluongphucvu"><i class="fa fa-angle-double-right"></i>Chất lượng phục vụ</a></li>
                    <li><a href="chinhsachbaohanh"><i class="fa fa-angle-double-right"></i>Chính sách bảo hành</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Liên hệ</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="{{route('home')}}"><i class="fa fa-angle-double-right"></i>Siêu Thị Điện Máy Hoàng Phúc</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Điện thoại: 0382-604-455</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Địa chỉ: Trúc Bạch, quận Ba Đình, Hà Nội</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Giờ mở cửa: 08:00 - 19:00</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Website: hoangphucelectronic.com</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Email: laikhacthuy1602@gmail.com</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="footer-cuoi pt-4 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <p class=" text-white text-left">Siêu Thị Điện Máy Hoàng Phúc-Trúc Bạch, quận Ba Đình, Hà Nội</p>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4">
                <ul class="list-unstyled list-inline social text-right">
                    <li class="list-inline-item"><a class="wobble-top text-white" href="https://www.facebook.com/laikhacthuy16"><i class="fa fa-facebook fa-2x"></i></a></li>
                    <li class="list-inline-item"><a class="wobble-top text-white" href="https://twitter.com/"><i class="fa fa-twitter fa-2x"></i></a></li>
                    <li class="list-inline-item"><a class="wobble-top text-white" href="https://instagram.com/"><i class="fa fa-instagram fa-2x"></i></a></li>
                    <li class="list-inline-item"><a class="wobble-top text-white" href="https://google.com/"><i class="fa fa-google-plus fa-2x"></i></a></li>
                    <li class="list-inline-item"><a class="wobble-top text-white" href="https://gmail.com/" target="_blank"><i class="fa fa-envelope fa-2x"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Script Starts-->
<script>
    $('#login_link').click(function(e) {
        $("div").find(".notifi").empty();
        $("div").find(".notifi").hide();
        $("div").find("#create_name").val("");
        $("div").find("#create_username").val("");
        $("div").find("#create_password").val("");
        $("div").find("#create_email").val("");
        $("div").find("#create_phone").val("");

        $("#login_form").delay(100).fadeIn(100);
        $("#registration_form").fadeOut(100);
        $('#registration_link').css('background-color',"white");
        $(this).css("background-color", "#50C7C7");
        e.preventDefault();
    });
    $('#registration_link').click(function(e) {
        $("#registration_form").delay(100).fadeIn(100);
        $("#login_form").fadeOut(100);
        $('#login_link').css('background-color',"white");
        $(this).css("background-color", "#FFC513");
        e.preventDefault();
    });
    $('#registration_form').on('submit',function(event){
        event.preventDefault();

        let create_username = $('#create_username').val();
        let create_name = $('#create_name').val();
        let create_password = $('#create_password').val();
        let create_email = $('#create_email').val();
        let create_phone = $('#create_phone').val();

        $.ajax({
            url: "{{ route('register_customer')}}",
            type:"POST",
            data:{
                "_token":"{{ csrf_token() }}",
                create_username:create_username,
                create_name:create_name,
                create_password:create_password,
                create_email:create_email,
                create_phone:create_phone,
            },
            success: function(data)
            {
                if(data.success=="loi"){
                    $("div").find(".notifi").empty();
                    $("div").find(".notifi").hide();
                    Notiflix.Report.Init({ position:"center-center", fontFamily:"Helvetica", });
                    Notiflix.Report.Warning('Thông báo','Tài khoản đã tồn tại, vui lòng nhập tài khoản mới','Tiếp tục');
                    $('#create_username').val("");
                }else{
                    for (i = 0; i < data.success.length; i++) {
                        $("div").find(data.success[i]).hide();
                    }
                    $('#create_username').val("");
                    $('#create_name').val("");
                    $('#create_password').val("");
                    $('#create_email').val("");
                    $('#create_phone').val("");
                    Notiflix.Report.Init({ position:"center-center", fontFamily:"Helvetica", });
                    Notiflix.Report.Success('Thông báo','Đăng ký tài khoản thành công','Tiếp tục');
                }
            },
            error: function(data) {
                if( data.status === 422 ) {
                    $("div").find(".notifi").empty();
                    $("div").find(".notifi").hide();
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, message) {
                        if($.isPlainObject(message)) {
                            $.each(message, function (key, value) {
                                let notification_id = "#"+key+"_error";
                                for(var i=0; i<value.length; i++){
                                    $("div").find(notification_id).show().append(value[i]+"<br>");
                                }

                           });

                        }
                    });
                }
            }
        });

    });
    $('#login_form').on('submit',function(event){
        event.preventDefault();

        let username = $('#username').val();
        let password = $('#password').val();

        $.ajax({
            url: "{{ route('login_customer')}}",
            type:"POST",
            data:{
                "_token":"{{ csrf_token() }}",
                username:username,
                password:password,
            },
            success: function(data)
            {
                location.reload();
            },
            error: function(data) {
                $("#login_notifi").show();
            }
        });

    });
    $('#form_search').on('submit',function(e){
        event.preventDefault();
        let input = $('#search_input').val();
        $.ajax({
            url:"{{ route('search') }}",
            type:"get",
            data: {
                "_token":"{{ csrf_token() }}",
                name_pro:input
            },
            success: function(data)
            {
                if(data.success == "Không có sản phẩm"){
                    $('.search_result').prepend($('<li class="search_result_row">Không có kết quả</li>'));
                    $('.search_result').show();
                    location.reload();
                }else{
                    $.each(data.success, function (key, value) {
                        $('.search_result').prepend($('<li class="search_result_row"><a href=\"http://localhost/hoangphuc/check_type_category/'+value.category_id+'/'+value.name_product+'\" title="Nhấn để xem chi tiết sản phẩm">'+value.name_product+'</a></li>'));
                    });
                    $('.search_result').show();

                }
            }
        });
    });
    function modal(){
        $('#exampleModalCenter').modal('hide');
        $('#exampleModalCenter2').modal('show');
    };
    $('#form_resetpass').on('submit',function(e){
        e.preventDefault();
        let resetpassword = $('#resetpassword').val();
        $.ajax({
            url:"{{ route('resetpassword') }}",
            type:"get",
            data: {
                "_token":"{{ csrf_token() }}",
                resetpass:resetpassword
            },
            success: function(data)
            {
                if(data.success == "loi"){
                    Notiflix.Report.Warning('Thông báo','Email bạn nhập chưa đăng ký tài khoản, vui lòng nhập email khác!','Tiếp tục');
                }else{
                    Notiflix.Report.Success('Thông báo','Mật khẩu mới của bạn đã được gửi, vui lòng kiểm tra mail!','Tiếp tục');
                }
            }
        });
    });
</script>
    <!--Script Ends-->
</body>
</html>
<!--Xong footer -->

