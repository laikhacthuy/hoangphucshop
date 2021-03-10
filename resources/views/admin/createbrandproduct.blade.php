@extends('admin_templates')
@section('title','Thêm mới thương hiệu')
@section('content_admin')
<section class="wrapper">
    <div>
        <h2 class="text-center text-info">Thêm mới thương hiệu sản phẩm</h2>
        @if (session('success'))
            <strong class="text-success">{{ session('success') }}</strong>
        @endif
        <form action="{{route('Product_Brand.store')}}" method="post">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="">Tên thương hiệu: </label>
                <input type="text" name="name_brand" class="form-control"/>
                @error('name_brand')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả: </label>
                <input type="text" name="des_brand" class="form-control"/>
                @error('des_brand')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Loại sản phẩm: </label>
                <select name="category_id" class="form-control">
                    <option value="">--Chọn--</option>
                @foreach ($categoryid as $value)
                    <option value="{{$value->category_id}}">{{$value->name_category}}</option>
                @endforeach
                </select>
                @error('category_id')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</section>
@endsection
