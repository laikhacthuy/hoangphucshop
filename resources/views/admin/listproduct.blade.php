@extends('admin_templates')
@section('title','Danh sách thương hiệu')
@section('content_admin')
<section class="wrapper">
    <h3 class="text-center">Danh sách sản phẩm</h3>
    @if(session('success'))
        <strong class="text-success">{{ session('success') }}</strong>
    @endif
    <div class="listproduct">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th class="text-center" style="width: 10%">STT</th>
                    <th class="text-center" style="width: 40%">Tên sản phẩm</th>
                    <th class="text-center" style="width: 20%">Hình ảnh</th>
                    <th class="text-center" style="width: 20%">Loại sản phẩm</th>
                    <th class="text-center" style="width: 10%">Edit</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($product as $value)
                @foreach ($brandid as $item)
                    @if ($value->brand_id == $item->brand_id)
                    <?php
                        $product_type=$item->name_brand;
                    ?>
                    @endif
                @endforeach
                <tr>
                    <td class="text-center">{{ $value->id }}</td>
                    <td class="text-center">{{ $value->name_product }}</td>
                    <td class="text-center">
                        <img src="{{('../public/storage/products/'.$value->image_avatar)}}" alt="" style="width: 100px;height:50px;">
                    </td>
                    <td class="text-center">{{ $product_type }}</td>
                    <td class="text-center">
                        <div class="tools">
                            <div class="tool-item">
                                <a href=" {{route('Product.show',$value->id) }}" class="fa fa-info-circle rounded bg-success" title="Xem chi tiết sản phẩm"></a>
                            </div>
                            <div class="tool-item">
                                <?php
                                    $namesp=str_replace( '/', ' ', $value->name_product )
                                ?>
                                <a href="{{ route('specifi',['id' => $value->id,'name'=> $namesp]) }}" class="fa fa-edit"></a>
                            </div>
                            <div class="tool-item">
                                <form action="{{ route('Product.destroy',$value->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="fa fa-trash bg-danger" style="border: none;" title="Xoá sản phẩm"></button>
                                </form>
                            </div>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $product->appends(['sort' => 'id'])->links() }}
        </div>
    </div>
</section>
@endsection
