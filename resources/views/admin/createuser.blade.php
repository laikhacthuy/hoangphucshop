@extends('admin_templates')
@section('title','Thêm mới tài khoản')
@section('content_admin')
<section class="wrapper">
    <div>
        <h2 class="text-center text-info">Thêm tài khoản mới</h2>
        @if (session('success'))
            <strong class="text-success">{{ session('success') }}</strong>
        @endif
        <form action="{{route('User.store')}}" method="post" autocomplete="on">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="">Tài khoản: </label>
                <input type="text" name="createusername" class="form-control" value="{{ old('createusername') }}"/>
                @error('createusername')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label>Mật khẩu: </label>
                <input type="password" name="createpassword" class="form-control" autocomplete="off" />
                @error('createpassword')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu: </label>
                <input type="password" name="retype_pass" class="form-control" autocomplete="off"/>
                @error('retype_pass')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Tên người dùng: </label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email: </label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"/>
                @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Phone: </label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"/>
                @error('phone')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Quyền hạn: </label>
                <select name="role" class="form-control">
                        <option value="">--Chọn--</option>
                        <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>Client</option>
                </select>
                @error('role')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</section>
@endsection
