@extends('templates')
@extends('banner')
@section('title', 'Điện máy Hoàng Phúc')
@section('content')
<!--start content -->
<div class="container mt-3">
    <div class="tieude d-flex justify-content-between  align-items-center mb-3">
        <p class="left m-0"><b>ĐIỆN THOẠI</b></p>
        <a href="{{ route('danhmucsanpham','Dienthoai') }}" class="right text-danger">Xem tất cả>></a>
    </div>
    <div class="row">
        @foreach ($phone as $item)
            <div class="col-sm-3">
                <div class="card p-2 d-flex mb-4">
                    <span class="card-title" title="{{ $item->name_product }}">
                        <a href="{{ route('chitietsanpham',$item->name_product) }}" class="name_sp">{{ $item->name_product}}
                        </a>
                    </span>
                    <h5 class="card-text text-danger"><?php echo number_format($item->price) ?> VND</h5>
                        <img style="width:100%;height:200;" src="{{asset('public/storage/products/'.$item->image_avatar)}}" class="card-img-top animated zoomIn" alt="...">
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="container mt-3">
    <div class="tieude d-flex justify-content-between  align-items-center mb-3">
        <p class="left m-0"><b>LAPTOP</b></p>
        <a href="{{ route('danhmucsanpham','Laptop') }}" class="right text-danger">Xem tất cả>></a>
    </div>
    <div class="row">
        @foreach ($laptop as $item)
            <div class="col-sm-3">
                <div class="card p-2 d-flex mb-4">
                    <span class="card-title" title="{{ $item->name_product }}"><a href="{{ route('chitietsanphamlt',$item->name_product) }}" class="name_sp">{{ $item->name_product}}</a></span>
                    <h5 class="card-text text-danger"><?php echo number_format($item->price) ?> VND</h5>
                    <img style="width:100%;height:200px;" src="{{asset('public/storage/products/'.$item->image_avatar)}}" class="card-img-top animated zoomIn" alt="...">
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="container mt-3">
    <div class="tieude d-flex justify-content-between  align-items-center mb-3">
        <p class="left m-0"><b>TABLE</b></p>
        <a href="{{ route('danhmucsanpham','Table')}}" class="right text-danger">Xem tất cả>></a>
    </div>
    <div class="row">
        @foreach ($table as $item)
            <div class="col-sm-3">
                <div class="card p-2 d-flex mb-4">
                    <span class="card-title" title="{{ $item->name_product }}"><a href="{{ route('chitietsanphamtb',$item->name_product) }}" class="name_sp">{{ $item->name_product }}</a></span>
                    <h5 class="card-text text-danger"><?php echo number_format($item->price) ?> VND</h5>
                    <img style="width:auto;height:200px;" src="{{asset('public/storage/products/'.$item->image_avatar)}}" class="card-img-top animated zoomIn" alt="...">
                </div>
            </div>
        @endforeach
    </div>
</div>
@if (session()->has('status'))
<script>
    window.onload = function() {
        Notiflix.Report.Init({ position:"center-center", fontFamily:"Helvetica", });
        Notiflix.Report.Success('Thông báo','Bạn đã đặt hàng thành công, vui lòng kiểm tra đơn hàng trong lịch sử','Tiếp tục');
    };
</script>
@endif
<!--Xong content -->
@endsection
