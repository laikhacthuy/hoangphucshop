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
                        <input type="text" class="form-control rounded-pill border-0 bg-light" placeholder="B???n ??ang t??m g???" id="search_input" required>
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
                            <a href="{{ route('historyorder',Auth::user()->id) }}" class="Wobble-Vertical" title="Xem l???ch s??? mua h??ng"><i class="fa fa-bookmark-o"></i></a>
                        </li>
                        <li>
                            <a class="Wobble-Vertical" href="{{ route('giohang') }}" title="Gi??? h??ng"><i class="fa fa-shopping-basket"></i></a>
                        </li>
                        <li>
                            <a class="Wobble-Vertical" href="{{ route('logout_customer') }}" title="????ng xu???t"><i class="fa fa-power-off"></i></a>
                        </li>
                    @else
                        <li>
                            <button type="button" class="Wobble-Vertical user" data-toggle="modal" data-target="#exampleModalCenter" title="????ng nh???p">
                                <i class="fa fa-user"></i>
                            </button>
                        </li>
                        <li>
                            <a class="Wobble-Vertical" href="{{ route('giohang') }}" title="Gi??? h??ng"><i class="fa fa-shopping-basket"></i></a>
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
                            <label>T??i kho???n</label>
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Nh???p t??i kho???n c???a b???n" required>
                        </div>
                        <div class="form-group">
                            <label>M???t kh???u</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nh???p m???t kh???u c???a b???n" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Duy tr?? ????ng nh???p</label>
                        </div>
                        <div class="alert alert-danger" id="login_notifi" style="display: none">T??i kho???n ho???c m???t kh???u sai</div>
                        <div>
                            <button type="submit" class="btn btn-primary login_home">Login</button>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#exampleModalCenter2" onclick="modal()">Qu??n m???t kh???u?</a>
                    </form>
                    {{-- form register --}}
                    <form id="registration_form" style="display: none" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>T??n ng?????i d??ng</label>
                            <input type="text" class="form-control" name="create_name" id="create_name"  placeholder="Nh???p t??n ng?????i d??ng" >
                            <div class="alert alert-danger notifi" id="create_name_error" style="display: none"></div>
                        </div>
                        <div class="form-group">
                            <label>T??i kho???n</label>
                            <input type="text" class="form-control" name="create_username" id="create_username"  placeholder="Nh???p t??n t??i kho???n" >
                            <div class="alert alert-danger notifi" id="create_username_error" style="display: none"></div>
                        </div>
                        <div class="form-group">
                            <label>M???t kh???u</label>
                            <input type="password" class="form-control" name="create_password" id="create_password" placeholder="Nh???p m???t kh???u" >
                            <div class="alert alert-danger notifi" id="create_password_error" style="display: none"></div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="create_email" id="create_email" placeholder="Nh???p email c???a b???n" >
                            <div class="alert alert-danger notifi" id="create_email_error" style="display: none"></div>
                        </div>
                        <div class="form-group">
                            <label>S??? ??i???n tho???i</label>
                            <input type="text" class="form-control" name="create_phone" id="create_phone" placeholder="Nh???p s??? ??i???n tho???i c???a b???n" >
                            <div class="alert alert-danger notifi" id="create_phone_error" style="display: none"></div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning register_home">????ng k??</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Qu??n m???t kh???u</h5>
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
                                    <label for="">Nh???p email ????ng k?? t??i kho???n</label>
                                    <input type="email" id="resetpassword" name="resetpassword" class="form-control" required>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">G???i</button>
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
                        <a href="{{route('danhmucsanpham','Dienthoai')}}"><i class="fa fa-mobile"></i> ??I???N THO???I <i class="fa fa-caret-down"></i></a>
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
                        <a href="#"><i class="fa fa-clock-o"></i> ?????NG H???</a>
                    </li>
                    <li><a href="#"><i class="fa fa-headphones"></i> PH??? KI???N </a></li>
                    <li><a href="#"><i class="fa  fa-star"></i> SIM TH??? </a></li>
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
                <h5>Truy c???p nhanh</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="{{route('home')}}"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>??i???n tho???i</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Laptop</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>?????ng h???</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Ph??? ki???n</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Tablet</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Sim th???</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Gi???i thi???u si??u th???</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="quychehoatdong"><i class="fa fa-angle-double-right"></i>Quy ch??? ho???t ?????ng</a></li>
                    <li><a href="noiquysieuthi"><i class="fa fa-angle-double-right"></i>N???i quy si??u th???</a></li>
                    <li><a href="chatluongphucvu"><i class="fa fa-angle-double-right"></i>Ch???t l?????ng ph???c v???</a></li>
                    <li><a href="chinhsachbaohanh"><i class="fa fa-angle-double-right"></i>Ch??nh s??ch b???o h??nh</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5>Li??n h???</h5>
                <ul class="list-unstyled quick-links">
                    <li><a href="{{route('home')}}"><i class="fa fa-angle-double-right"></i>Si??u Th??? ??i???n M??y Ho??ng Ph??c</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>??i???n tho???i: 0382-604-455</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>?????a ch???: Tr??c B???ch, qu???n Ba ????nh, H?? N???i</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Gi??? m??? c???a: 08:00 - 19:00</a></li>
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
                <p class=" text-white text-left">Si??u Th??? ??i???n M??y Ho??ng Ph??c-Tr??c B???ch, qu???n Ba ????nh, H?? N???i</p>
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
                    Notiflix.Report.Warning('Th??ng b??o','T??i kho???n ???? t???n t???i, vui l??ng nh???p t??i kho???n m???i','Ti???p t???c');
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
                    Notiflix.Report.Success('Th??ng b??o','????ng k?? t??i kho???n th??nh c??ng','Ti???p t???c');
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
                if(data.success == "Kh??ng c?? s???n ph???m"){
                    $('.search_result').prepend($('<li class="search_result_row">Kh??ng c?? k???t qu???</li>'));
                    $('.search_result').show();
                    location.reload();
                }else{
                    $.each(data.success, function (key, value) {
                        $('.search_result').prepend($('<li class="search_result_row"><a href=\"http://localhost/hoangphuc/check_type_category/'+value.category_id+'/'+value.name_product+'\" title="Nh???n ????? xem chi ti???t s???n ph???m">'+value.name_product+'</a></li>'));
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
                    Notiflix.Report.Warning('Th??ng b??o','Email b???n nh???p ch??a ????ng k?? t??i kho???n, vui l??ng nh???p email kh??c!','Ti???p t???c');
                }else{
                    Notiflix.Report.Success('Th??ng b??o','M???t kh???u m???i c???a b???n ???? ???????c g???i, vui l??ng ki???m tra mail!','Ti???p t???c');
                }
            }
        });
    });
</script>
    <!--Script Ends-->
</body>
</html>
<!--Xong footer -->

