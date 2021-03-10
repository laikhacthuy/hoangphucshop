@extends('admin_templates')
@section('title','Edit product category')
@section('content_admin')
<section class="wrapper">
    <div>
        <h2 class="text-center text-info">Chỉnh sửa danh mục sản phẩm</h2>
        @if (session('success'))
            <strong class="text-success">{{ session('success') }}</strong>
        @endif
        <?php
            $id=$deta_category->category_id;
            ?>
        <form action="{{route('Product_Category.update',$id)}}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="">Tên danh mục: </label>
                <input type="text" name="name_categ" id="" class="form-control" value="{{ $deta_category->name_category }}"/>
                @error('name_categ')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả: </label>
                <input type="text" name="des_categ" id="" class="form-control" value="{{ $deta_category->des_category }}"/>
                @error('des_categ')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{route('Product_Category.index')}}">Danh sách danh mục</a>
    </div>
</section>
@endsection

