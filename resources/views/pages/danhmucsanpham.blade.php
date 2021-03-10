@extends('templates')
@extends('banner')
@section('content')
<!--start content -->
<div class="container mt-3">
    <div class="tieude d-flex justify-content-between  align-items-center mb-3">
        <p class="left m-0">
            @foreach ($type_pro as $item)
                <b>{{$item->des_category}}</b>
                @section('title',$item->des_category)
            @endforeach
        </p>
    </div>
    <div class="row">
        @foreach ($dm as $item)
            <div class="col-sm-3">
                <div class="card p-2 d-flex mb-4">
                    <span class="card-title" title="{{ $item->name_product }}">
                        @foreach ($type_pro as $value)
                            <a href="{{ route('check_type_category',[$value->category_id,$item->name_product]) }}" class="name_sp">{{ $item->name_product}}</a>
                        @endforeach
                    </span>
                    <h5 class="card-text text-danger"><?php echo number_format($item->price) ?> VND</h5>
                    <img style="width:auto;height:200px;" src="{{asset('public/storage/products/'.$item->image_avatar)}}" class="card-img-top" alt="...">
                </div>
            </div>
        @endforeach
    </div>
</div>
<!--Xong content -->
@endsection
