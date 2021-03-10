@extends('templates')
@section('title', 'Lịch sử mua hàng')
@section('content')
<!--start content -->
<div class="container">
    <h3 class="text-success">Lịch sử mua hàng</h3>
    @if(!isset($no_history))
        <h4>Đơn hàng đã đặt</h4>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-light table-bordered table-hover">
                    <thead>
                        <tr class="table-info">
                            <th style="width: 20%" class="text-center">Mã đơn hàng</th>
                            <th style="width: 20%" class="text-center">Tổng tiền cần trả</th>
                            <th style="width: 30%" class="text-center">Hình thức vận chuyển</th>
                            <th style="width: 30%" class="text-center">Tình trạng đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $item)
                            <tr>
                                <td class="text-center">{{ $item->order_id }}</td>
                                <td class="text-center"><?php echo number_format($item->order_total) ?> VND</td>
                                <td class="text-center">
                                    <?php
                                        if($item->pay_id == 1){
                                            echo "Thanh toán khi nhận hàng";
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                        if($item->order_status == 1){
                                            echo "Đang chờ xử lý";
                                        }
                                    ?>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <h4>Chi tiết đơn đặt hàng</h4>
        <div class="row mb-3">
            <div class="col-sm-12">
                <table class="table table-light table-bordered table-hover">
                    <thead>
                        <tr class="table-success">
                            <th style="width: 15%" class="text-center">Mã đơn hàng</th>
                            <th style="width: 35%" class="text-center">Tên sản phẩm</th>
                            <th style="width: 20%" class="text-center">Giá</th>
                            <th style="width: 10%" class="text-center">Số lượng</th>
                            <th style="width: 20%" class="text-center">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $key)
                            @foreach($key as $value)
                            <tr>
                                <td class="text-center">{{ $value->order_id }}</td>
                                <td>{{ $value->product_name }}</td>
                                <td class="text-center"><?php echo number_format($value->product_price) ?> VND</td>
                                <td class="text-center">{{ $value->product_qty }}</td>
                                <td class="text-center">
                                    <?php
                                        $total=$value->product_price*$value->product_qty;
                                        echo number_format($total);
                                    ?>
                                    VND
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="content_template">
            <div class="row mb-3">
                <div class="col-3"></div>
                <div class="col-6 mt-5">
                    <p class="text-center text-danger"><i class="fa fa-history fa-4x"></i></p>
                    <h4>Bạn chưa mua hàng nên không có lịch sử đặt hàng</h4>
                    <p class="text-center"><a href="{{ route('home') }}">Đến trang chủ Điện máy Hoàng Phúc</a></p>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    @endif
</div>
<!--Xong content -->
@endsection
