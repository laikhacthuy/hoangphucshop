@extends('admin_templates')
@section('title','Chi tiết sản phẩm')
@section('content_admin')
<section class="wrapper">
    <div>
        <h2 class="text-center text-info">Chi tiết sản phẩm</h2>
        @if (session('success'))
            <strong class="text-success">{{ session('success') }}</strong>
        @endif
        <form action="{{ route('Product.update',$product_detail->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
            <div class="form-group">
                <label for="">Tên sản phẩm: </label>
                <input type="text" name="name_product" class="form-control" value="{{ $product_detail->name_product }}"/>
                @error('name_product')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả sản phẩm: </label>
                <textarea name="des_product" id="ckedittor" class="form-control" cols="30" rows="10">{{ $product_detail->des_product }}</textarea>
                @error('des_product')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Giá: </label>
                <input type="text" name="price" class="form-control" value="{{ $product_detail->price }}"/>
                @error('price')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Giảm giá: </label>
                <input type="text" name="discount" class="form-control" value="{{ $product_detail->discount }}"/>
                @error('discount')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Số lượng: </label>
                <input type="text" name="count" class="form-control" value="{{ $product_detail->count }}"/>
                @error('count')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Ảnh đại diện sản phẩm:</label>
                <input type="file" class="form-control-file" id="image_avatar" name="image_avatar" onchange="loadavatar(this)">
                <input type="hidden" name="image_avt" value="{{$product_detail->image_avatar}}">
                <p>
                    <img id="preview_img" src="{{asset('public/storage/products/'.$product_detail->image_avatar)}}" class="" width="200" height="150"/>
                </p>
                @error('image_avatar')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Ảnh sản phẩm:</label>
                <div class="gallery_image">
                    <?php
                        $string=$product_detail->images_list;
                        $str = explode(",",$string);
                    ?>
                    @foreach ($str as $item)
                        <img id="" src="{{asset('public/storage/products/'.$item)}}" class="" width="200" height="150"/>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="">Loại sản phẩm: </label>
                <select name="brand_id" class="form-control">
                    <option value="">--Chọn--</option>
                @foreach ($brand as $value)
                    @if ($product_detail->brand_id == $value->brand_id)
                    <?php
                        $selected="selected";
                    ?>
                    @else
                    <?php
                        $selected="";
                    ?>
                    @endif
                    <option value="{{$value->brand_id}}" {{$selected}}>{{$value->name_brand}}</option>
                @endforeach
                </select>
                @error('brand_id')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</section>
@endsection
