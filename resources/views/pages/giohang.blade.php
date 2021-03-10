@extends('templates')
@section('title', 'Giỏ hàng của bạn')
@section('content')
<!--start content -->
<div class="container">
    <div>
        <h4 class="float-left text-success">Giỏ hàng của bạn</h4>
        <p class="float-right buymore"><a href="{{ route('home') }}" >Mua thêm sản phẩm khác</a></p>
        <p class="clearfix"></p>
    </div>
    @if ($cartcount == null)
    <div class="content_template">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <p class="text-center text-danger"><i class="fa fa-cart-arrow-down fa-4x"></i></p>
                <h4>Không có sản phẩm nào trong giỏ hàng của bạn</h4>
                <p class="text-center"><a href="{{ route('home') }}">Đến trang chủ Điện máy Hoàng Phúc</a></p>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    @else
    <div class="content_template_cart">
        <?php
            $total=0;
            $total_pro=0;
        ?>
        @foreach ($showcart as $item)
        <div class="row mb-2">
            <div class="col-sm-12 d-flex">
                <div class="col-sm-2">
                    <img src="{{asset('public/storage/products/'.$item->options->image)}}" alt="" style="width: 100px; height: 100px">
                </div>
                <div class="col-sm-7 d-flex">
                    <div class="col-sm-8">
                        <p class="name_pro">{{ $item->name }}</p>
                    </div>
                    <div class="col-sm-4">
                        <?php
                            $price=number_format($item->price);
                            $total_pro=$item->price*$item->qty;
                            $total+=$total_pro;
                        ?>
                        <span class="price_pro">{{ $price }} VND</span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="float-right">
                        <div class="d-flex">
                            <div class="mt-1">
                                <button class="fa fa-minus minus" onclick="minus('{{$item->id}}','{{$item->rowId}}')"></button>
                            </div>
                            <div>
                                <input type="text" class="ml-2 mr-2 text-center number" id="{{$item->id}}" value="{{ $item->qty }}" readonly/>
                            </div>
                            <div class="mt-1">
                                <button class="fa fa-plus plus" onclick="plus({{$item->id}},'{{$item->rowId}}')"></button>
                            </div>
                            <div>
                                <button class="fa fa-close btn btn-danger btn-sm ml-3" onclick="window.location='{{ route('removecart',$item->rowId) }}'" title="Xoá sản phẩm"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-2">
        <div class="col-sm-6">
            <h5 class="float-left text-primary total_pro">Tổng tiền: <?php echo number_format($total);  ?> VND</h5>
        </div>
        <div class="col-sm-6">
            <button class="btn btn-primary float-right btn-sm" onclick="notiflix()">Thanh toán</button>
        </div>
    </div>
    @endif
</div>
<!--Xong content -->
@endsection
<script type="text/javascript">
    function plus(id,rowid){
        let value = document.getElementById(id).value;
        if(value==10){
            document.getElementById(id).value = value;
        }else{
            value++;
            document.getElementById(id).value = value;
        }
        $.get(
            '{{ route('updatecart') }}',
            { qty:document.getElementById(id).value, rowId:rowid },
            function(){
                location.reload();
            }
        );
    };
    function minus(id,rowid){
        var value = document.getElementById(id).value;
        if(value==1){
            document.getElementById(id).value = value;
        }else{
            value--;
            document.getElementById(id).value = value;
        }
        $.get(
            '{{ route('updatecart') }}',
            { qty:document.getElementById(id).value, rowId:rowid },
            function(){
                location.reload();
            }
        );
    };
    function notiflix(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('Check_login_home') }}",
            type:"POST",
            data:{},
            success: function(data)
            {
                window.location.replace("{{ route('thongtinkhachhang') }}");
            },
            error: function(data) {
                Notiflix.Report.Init({ position:"center-center", fontFamily:"Helvetica", });
                Notiflix.Report.Warning('Thông báo','Vui lòng đăng nhập để mua hàng','Tiếp tục');
            }
        });
    };
</script>
