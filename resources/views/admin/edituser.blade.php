@extends('admin_templates')
@section('title','Chi tiết tài khoản')
@section('content_admin')
<section class="wrapper">
    <div>
        <h2 class="text-center text-info">Thông tin tài khoản</h2>
        @if (session('success'))
            <strong class="text-success">{{ session('success') }}</strong>
        @endif
        <form action="" method="post" autocomplete="on">
        {{ csrf_field() }}
        @method('PUT')
            <div class="form-group">
                <label for="">Tài khoản: </label>
                <input type="text" name="createusername" class="form-control" value="{{ $userdetail->username ? $userdetail->username : old('createusername') }}"/>
                @error('createusername')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label>Mật khẩu: </label>
                <input type="password" name="createpassword" class="form-control" autocomplete="off" value="{{ $userdetail->password }}"/>
                @error('createpassword')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu: </label>
                <input type="password" name="retype_pass" class="form-control" autocomplete="off" value="{{ $userdetail->password }}"/>
                @error('retype_pass')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Tên người dùng: </label>
                <input type="text" name="name" class="form-control" value="{{ $userdetail->name ? $userdetail->name : old('name') }}"/>
                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email: </label>
                <input type="email" name="email" class="form-control" value="{{ $userdetail->email ? $userdetail->email : old('email') }}"/>
                @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Phone: </label>
                <input type="text" name="phone" class="form-control" value="{{ $userdetail->phone ? $userdetail->phone : old('phone') }}"/>
                @error('phone')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Quyền hạn: </label>
                <select name="role" class="form-control">
                        <option value="">--Chọn--</option>
                        <option value="1" {{ $userdetail->role == 1 ? 'selected'  : '' }}>Admin</option>
                        <option value="2" {{ $userdetail->role == 2 ? 'selected' : '' }}>Client</option>
                </select>
                @error('role')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</section>
@endsection
