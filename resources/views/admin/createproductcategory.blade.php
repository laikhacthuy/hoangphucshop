@extends('admin_templates')
@section('title','Thêm mới danh mục sản phẩm')
@section('content_admin')
<section class="wrapper">
    <div>
        <h2 class="text-center text-info">Thêm mới danh mục sản phẩm</h2>
        @if (session('success'))
            <strong class="text-success">{{ session('success') }}</strong>
        @endif
        <form action="{{route('Product_Category.store')}}" method="post">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="">Tên danh mục: </label>
                <input type="text" name="name_categ" id="" class="form-control"/>
                @error('name_categ')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả: </label>
                <input type="text" name="des_categ" id="" class="form-control"/>
                @error('des_categ')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</section>
@endsection
