@extends('admin_templates')
@section('title','Tuỳ chỉnh thông số sản phẩm')
@section('content_admin')
<section class="wrapper">
    <div>
        <h2 class="text-center text-info">Thêm thông số cho sản phẩm</h2>

        <form action="{{ route('specifi_save') }}" method="post">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    @if (session('success'))
                        <strong class="text-success">{{ session('success') }}</strong>
                    @endif
                    <div class="content_specifi">
                        <div class="form-group">
                            <label for="">Tên sản phẩm: </label>
                            <input type="text" name="name_product_specifi" class="form-control w-25" value="{{ $name }}" readonly/>
                            <input type="hidden" name="id" class="form-control" value="{{ $id }}"/>
                        </div>
                        <div class="form-group">
                            <label for="">Màn hình: </label>
                            <input type="text" name="screen" class="form-control w-25"/>
                            @error('screen')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Hệ điều hành: </label>
                            <input type="text" name="os" class="form-control w-25"/>
                            @error('os')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Camera trước: </label>
                            <input type="text" name="camera_pre" class="form-control w-25"/>
                            @error('camera_pre')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Camera sau: </label>
                            <input type="text" name="camera_affter" class="form-control w-25"/>
                            @error('camera_affter')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">CPU: </label>
                            <input type="text" name="cpu" class="form-control w-25"/>
                            @error('cpu')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">GPU: </label>
                            <input type="text" name="gpu" class="form-control">
                            @error('gpu')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">RAM: </label>
                            <input type="text" name="ram" class="form-control w-25"/>
                            @error('ram')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ROM: </label>
                            <input type="text" name="rom" class="form-control w-25"/>
                            @error('rom')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Battery: </label>
                            <input type="text" name="battery" class="form-control w-25"/>
                            @error('battery')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Weight: </label>
                            <input type="text" name="weight" class="form-control">
                            @error('weight')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('Product.index') }}">Quay lại</a>
                        <button class="btn btn-primary pull-right">Save</button>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </form>
    </div>
</section>
@endsection
