@extends('templates')
@section('title', 'Thông tin khách hàng')
@section('content')
<!--start content -->
<div class="container">
    <div>
        <h4 class="float-left text-success">Giỏ hàng của bạn</h4>
        <p class="float-right buymore"><a href="{{ route('home') }}" >Mua thêm sản phẩm khác</a></p>
        <p class="clearfix"></p>
    </div>
    @if ($cartcount == null)
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <p class="text-center text-danger"><i class="fa fa-cart-arrow-down fa-4x"></i></p>
                <h4>Không có sản phẩm nào trong giỏ hàng của bạn</h4>
                <p class="text-center"><a href="{{ route('home') }}">Đến trang chủ Điện máy Hoàng Phúc</a></p>
            </div>
            <div class="col-3"></div>
        </div>
    @else
        <?php
            $total=0;
            $total_pro=0;
        ?>
        @foreach ($showcart as $items)
        <div class="row mb-2">
            <div class="col-sm-12 d-flex">
                <div class="col-sm-2">
                    <img src="{{asset('public/storage/products/'.$items->options->image)}}" alt="" style="width: 100px; height: 100px">
                </div>
                <div class="col-sm-7 d-flex">
                    <div class="col-sm-8">
                        <p class="name_pro">{{ $items->name }}</p>
                    </div>
                    <div class="col-sm-4">
                        <?php
                            $price=number_format($items->price);
                            $total_pro=$items->price*$items->qty;
                            $total+=$total_pro;
                            $customer = (array)$check_info_customer;
                        ?>
                        <span class="price_pro">{{ $price }} VND</span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="float-right">
                        <div class="d-flex">
                            <div class="mt-1">
                                <button class="fa fa-minus minus" onclick="minus('{{$items->id}}','{{$items->rowId}}')"></button>
                            </div>
                            <div>
                                <input type="text" class="ml-2 mr-2 text-center number" id="{{$items->id}}" value="{{ $items->qty }}" readonly/>
                            </div>
                            <div class="mt-1">
                                <button class="fa fa-plus plus" onclick="plus({{$items->id}},'{{$items->rowId}}')"></button>
                            </div>
                            <div>
                                <button class="fa fa-close btn btn-danger btn-sm ml-3" onclick="window.location='{{ route('removecart',$items->rowId) }}'" title="Xoá sản phẩm"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-sm-9"></div>
            <div class="col-sm-3">
                <h5 class="float-right text-primary">Tổng tiền: <?php echo number_format($total);  ?>đ</h5>
            </div>
        </div>
        @if($check_info_customer->isEmpty())
            <h4 class="text-info">Thông tin khách hàng</h4>
            <form action="{{ route('save_customer') }}" method="post">
                {{ csrf_field() }}
                <div>
                    <div class="row mb-3">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tên khách hàng</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" name="name_customer"  placeholder="Nhập tên người nhận hàng" value="{{ old('name_customer') }}">
                            @error('name_customer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Số điện thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" name="phone_customer" placeholder="Nhập số điện thoại khách hàng" value="{{ old('phone_customer') }}">
                            @error('phone_customer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Địa chỉ nhận hàng</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" name="address_customer" placeholder="Nhập địa chỉ nhận hàng" value="{{ old('address_customer') }}">
                            @error('address_customer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-2">
                    <div class="float-left"></div>
                    <button class="btn btn-primary float-right btn-sm" type="submit">Thanh toán</button>
                    <div class="clearfix"></div>
                </div>
            </form>
        @else
            <h4>Lựa chọn để thanh toán</h4>
            <form action="{{ route('addorder') }}" method="get" id="msform">
                <ul id="progressbar">
                    <li class="active" id="account"><strong>Địa chỉ nhận hàng</strong></li>
                    <li id="personal"><strong>Hình thức thanh toán</strong></li>
                </ul>
                <fieldset>
                    <div class="form-card">
                        <h2 class="fs-title">Địa chỉ nhận hàng</h2>
                        @foreach ($check_info_customer as $item)
                            <div class="form-check">
                                <input class="form-check-input address" type="radio" id="{{$item->id}}" name="address" value="{{$item->id}}">
                                <label class="form-check-label">Họ tên: {{$item->name_customer}}- SDT: {{$item->phone_customer}}- Nơi nhận: {{$item->address_customer}}</label>
                            </div>
                        @endforeach
                    </div>
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                </fieldset>
                <fieldset>
                    <div class="form-card">
                        <h2 class="fs-title">Hình thức thanh toán</h2>
                        <div class="form-check">
                            <input class="form-check-input payment" type="radio" name="pay_id" value="1" checked>
                            <label class="form-check-label">Thanh toán khi nhận hàng</label>
                        </div>
                        <input type="hidden" name="addr" id="addr">
                       <input type="hidden" name="total" value="{{ $total }}">
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="submit" name="next" class="next action-button" value="Confirm"/>
                </fieldset>
            </form>
        @endif
    @endif

</div>
<!--Xong content -->
@endsection
<script type="text/javascript">
    function plus(id_pro,rowid){
        let value = document.getElementById(id_pro).value;
        if(value==10){
            document.getElementById(id_pro).value = value;
        }else{
            value++;
            document.getElementById(id_pro).value = value;
        }
        $.get(
            '{{ route('updatecart') }}',
            { qty:document.getElementById(id_pro).value, rowId:rowid },
            function(){
                location.reload();
            }
        );
    };
    function minus(id_pro,rowid){
        var value = document.getElementById(id_pro).value;
        if(value==1){
            document.getElementById(id_pro).value = value;
        }else{
            value--;
            document.getElementById(id_pro).value = value;
        }
        $.get(
            '{{ route('updatecart') }}',
            { qty:document.getElementById(id_pro).value, rowId:rowid },
            function(){
                location.reload();
            }
        );

    };
</script>
