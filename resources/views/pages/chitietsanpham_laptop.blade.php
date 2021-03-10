@extends('templates')
@section('title', $product->name_product)
@section('content')
<!--start content -->
<div class="container mt-3">
    <form action="{{ route('addcart',$product->name_product) }}" method="post">
        {{ csrf_field() }}
        <h3>{{ $product->name_product }}</h3>
        <div class="row mb-3">
            <div class="col-sm-6">
                <div class="image-product">
                    <img src="{{asset('public/storage/products/'.$product->image_avatar)}}" alt="" style="width: 100%; height: 400px">
                </div>
                <div>
                    <p class="text-center img_list">Một số hình ảnh sản phẩm</p>
                    <?php
                        $images_list = explode(",", $product->images_list);
                    ?>
                    <div id="owl-example-detail" class="owl-carousel banner">
                        @foreach ($images_list as $item)
                            <div class="thumb"><img src="{{asset('public/storage/products/'.$item)}}" alt="" style="width: 100%; height: 250px"></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                @if ($product->discount == 0)
                    <p class="price">Giá: <span class="text-danger"><?php echo number_format($product->price); ?> VND</span></p>
                @else
                    <p class="price">Giá cũ: <span class="price_old"><?php echo number_format($product->price); ?> VND</span></p>
                    <p class="price">Giá khuyến mãi:
                        <span class="text-danger">
                            <?php
                                $price_new = $product->price*((100-$product->discount)/100);
                                echo number_format($price_new);
                            ?>
                        VND</span>
                        <span class="text-warning">{{$product->discount}}%</span>
                    </p>
                @endif
                <h5>
                    <?php
                        if($product->count>0)
                        {
                            echo "Tình trạng: Còn hàng";
                        }else{
                            echo "Tình trạng: Hết hàng";
                        }
                    ?>
                </h5>
                <div class="mb-2 specifi">
                    <ul>
                        <li class="specifi">
                            <i class="fa fa-thumbs-o-up"></i>Tặng Balo Laptop
                        </li>
                        <li class="specifi"><i class="fa fa-thumbs-o-up"></i>Bảo hành chính hãng 12 tháng</li>
                        <li class="specifi"><i class="fa fa-thumbs-o-up"></i>Tặng tai nghe có dây choàng đầu có Mic I.value T-139</li>
                    </ul>
                </div>
                <h4>Thông số kỹ thuật</h4>
                <div class="border mb-2">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Màn hình</td>
                                <td>{{$specefi->screen}}</td>
                            </tr>
                            <tr>
                                <td>CPU</td>
                                <td>{{$specefi->cpu}}</td>
                            </tr>
                            <tr>
                                <td>Đồ họa</td>
                                <td>{{$specefi->gpu}}</td>
                            </tr>
                            <tr>
                                <td>RAM</td>
                                <td>{{$specefi->ram}}</td>
                            </tr>
                            <tr>
                                <td>Ổ cứng</td>
                                <td>{{$specefi->rom}}</td>
                            </tr>
                            <tr>
                                <td>Pin</td>
                                <td>{{$specefi->battery}}</td>
                            </tr>
                            <tr>
                                <td>Trọng lượng (kg)</td>
                                <td>{{$specefi->weight}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="#">Xem chi tiết cấu hình sản phẩm</a>
                <div class="mb-2">
                    <button class="btn btn-primary buy" type="submit">
                        <div>
                            <strong>MUA NGAY</strong>
                            <p>Giao hàng trong 1 giờ hoặc nhận tại cửa hàng</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<!--Xong content -->
@endsection
