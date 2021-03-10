@extends('admin_templates')
@section('title','Danh sách thương hiệu')
@section('content_admin')
<section class="wrapper">
    <h3 class="text-center">Danh sách thương hiệu</h3>
    @if(session('success'))
        <strong class="text-success">{{ session('success') }}</strong>
    @endif
    <div class="listproduct">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Tên thương hiệu</th>
                    <th class="text-center">Mô tả</th>
                    <th class="text-center">Loại sản phẩm</th>
                    <th class="text-center">Edit</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($brand_pag as $value)
                @foreach ($category as $item)
                    @if($value->category_id==$item->category_id)
                    <?php
                        $type=$item->name_category;
                    ?>
                    @endif
                @endforeach
                <tr>
                    <td class="text-center">{{ $value->brand_id }}</td>
                    <td class="text-center">{{ $value->name_brand }}</td>
                    <td class="text-center">{{ $value->des_brand }}</td>
                    <td class="text-center">{{ $type }}</td>
                    <td class="text-center">
                        <a href=" {{route('Product_Brand.show',$value->brand_id) }}" class="fa fa-edit rounded bg-success"></a>
                        <form action="{{ route('Product_Brand.destroy',$value->brand_id) }}" method="post">
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
            {{ $brand_pag->links() }}
        </div>
    </div>
</section>
@endsection
