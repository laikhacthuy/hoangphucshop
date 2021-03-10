@extends('admin_templates')
@section('title','Danh mục sản phẩm')
@section('content_admin')
<section class="wrapper">
    <h3 class="text-center">Danh sách danh mục sản phẩm</h3>
    @if(session('success'))
        <strong class="text-success">{{ session('success') }}</strong>
    @endif
    <div class="listproduct">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Tên danh mục</th>
                    <th class="text-center">Mô tả</th>
                    <th class="text-center">Edit</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pro_cate as $value)
                <tr>
                    <td class="text-center">{{ $value->category_id }}</td>
                    <td class="text-center">{{ $value->name_category }}</td>
                    <td class="text-center">{{ $value->des_category }}</td>
                    <td class="text-center">
                        <a href=" {{route('Product_Category.show',$value->category_id) }}" class="fa fa-edit rounded bg-success"></a>
                        <form action="{{ route('Product_Category.destroy',$value->category_id) }}" method="post">
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
            {{ $pro_cate->links() }}
        </div>
    </div>
</section>
@endsection
