@extends('admin_templates')
@section('title','Chỉnh sửa thương hiệu')
@section('content_admin')
<section class="wrapper">
    <div>
        <h2 class="text-center text-info">Chỉnh sửa thương hiệu</h2>
        @if (session('success'))
            <strong class="text-success">{{ session('success') }}</strong>
        @endif
        <form action="{{route('Product_Brand.update',$branddetail->brand_id)}}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="">Tên thương hiệu: </label>
                <input type="text" name="name_brand"  class="form-control" value="{{ $branddetail->name_brand }}"/>
                @error('name_brand')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Mô tả: </label>
                <input type="text" name="des_brand" class="form-control" value="{{ $branddetail->des_brand }}"/>
                @error('des_brand')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Loại sản phẩm: </label>
                <select name="category_id" class="form-control">
                    @foreach ($category as $item)
                    @if($branddetail->category_id == $item->category_id)
                        <?php
                            $selected="selected";
                        ?>
                        @else
                        <?php
                            $selected="";
                        ?>
                        @endif
                        <option value="{{ $item->category_id }}" {{ $selected}}>{{ $item->des_category }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{route('Product_Brand.index')}}">Danh sách thương hiệu</a>
    </div>
</section>
@endsection

