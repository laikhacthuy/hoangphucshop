@extends('admin_templates')
@section('title','Danh sách thương hiệu')
@section('content_admin')
<section class="wrapper">
    <h3 class="text-center">Danh sách tài khoản</h3>
    @if(session('success'))
        <strong class="text-success">{{ session('success') }}</strong>
    @endif
    <div class="listproduct">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Tên tài khoản</th>
                    <th class="text-center">Tên người dùng</th>
                    <th class="text-center">Quyền hạn</th>
                    <th class="text-center">Edit</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($listuser as $value)
                <tr>
                    <td class="text-center">{{ $value->id }}</td>
                    <td class="text-center">{{ $value->username }}</td>
                    <td class="text-center">{{ $value->name }}</td>
                    <td class="text-center">{{ ($value->role == '1' ? 'Admin' : 'Client') }}</td>
                    <td class="text-center">
                        <a href=" {{route('User.show',$value->id) }}" class="fa fa-edit rounded bg-success"></a>
                        <form action="{{ route('User.destroy',$value->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="fa fa-trash bg-danger" style="border: none;"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $listuser->links() }}
        </div>
    </div>
</section>
@endsection
