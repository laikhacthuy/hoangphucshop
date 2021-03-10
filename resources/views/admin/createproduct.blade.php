@extends('admin_templates')
@section('title','Thêm sản phẩm mới')
@section('content_admin')
<section class="wrapper">
    <div>
        <h2 class="text-center text-info">Thêm sản phẩm mới</h2>
        @if (session('success'))
            <strong class="text-success">{{ session('success') }}</strong>
        @endif
        <form action="{{ route('Product.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="">Tên sản phẩm: </label>
                <input type="text" name="name_product" class="form-control"/>
                @error('name_product')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả sản phẩm: </label>
                <textarea name="des_product" id="ckedittor" class="form-control" cols="30" rows="10"></textarea>
                @error('des_product')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Giá: </label>
                <input type="text" name="price" class="form-control"/>
                @error('price')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Giảm giá: </label>
                <input type="text" name="discount" class="form-control"/>
                @error('discount')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Số lượng: </label>
                <input type="text" name="count" class="form-control"/>
                @error('count')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Ảnh đại diện sản phẩm:</label>
                <input type="file" class="form-control-file" id="image_avatar" name="image_avatar" onchange="loadavatar(this)">
                <p>
                    <img id="preview_img" src="../../public/backend/images/no-image.jpg" class="" width="200" height="150"/>
                </p>
                @error('image_avatar')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Ảnh sản phẩm:</label>
                <input type="file" class="form-control-file" id="image_list" name="image_list[]" multiple onchange="loadlist()">
                <div class="gallery" style="display: none"></div>
                @error('image_list.*')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Loại sản phẩm: </label>
                <select name="brand_id" class="form-control">
                    <option value="">--Chọn--</option>
                @foreach ($brand as $value)
                    <option value="{{$value->brand_id}}">{{$value->name_brand}}</option>
                @endforeach
                </select>
                @error('brand_id')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</section>
@endsection
