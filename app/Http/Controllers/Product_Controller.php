<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pro_Brand;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Product_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(5);
        $brandid = Pro_Brand::all();
        return view('admin.listproduct')->with(['product' => $product, 'brandid' => $brandid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Pro_Brand::all();
        return view('admin.createproduct',['brand'=>$brand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $list_image=array();
        $avatar=$request->file('image_avatar');
        $list=$request->file('image_list');
        //process image avatar
        $extension_avatar = $avatar->getClientOriginalExtension();
        $name_image = 'product'.date('Y-m-d').Time().rand(11111, 99999).'.'.$extension_avatar;
        Storage::putFileAs('public/products',$avatar,$name_image);
        //process image list
        foreach ($list as $photo) {
            $extension = $photo->getClientOriginalExtension();
            $list_image_name = 'listproduct'.date('Y-m-d').Time().rand(11111, 99999).'.'.$extension;
            array_push($list_image,$list_image_name);
            $list_image_string=implode(",",$list_image);
            Storage::putFileAs('public/products',$photo,$list_image_name);
        }
        $product = new Product();
        $product->name_product=$request->name_product;
        $product->des_product=$request->des_product;
        $product->price=$request->price;
        $product->discount=$request->discount;
        $product->image_avatar=$name_image;
        $product->images_list=$list_image_string;
        $product->count=$request->count;
        $product->brand_id=$request->brand_id;
        $product->save();
        //print_r($list_image_string);
        return redirect()->route('Product.create')->with('success','Thêm thành công');
        //Upload file C1:
        //Storage::putFileAs('public/products',$image_avatar,$name_image);
        //Upload file C2:
        //$image->storeAs('public/products',$image->getClientOriginalName());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Pro_Brand::all();
        $product_detail = Product::where('id',$id)->first();
        return view('admin.showproduct',['brand' => $brand, 'product_detail' => $product_detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        if($request->file('image_avatar') == null)
        {
            $product = new Product();
            $product->name_product=$request->name_product;
            $product->des_product=$request->des_product;
            $product->price=$request->price;
            $product->discount=$request->discount;
            $product->image_avatar=$request->image_avt;
            $product->count=$request->count;
            $product->brand_id=$request->brand_id;
            Product::where('id',$id)->update([
            'name_product' => $product->name_product,
            'des_product' => $product->des_product,
            'price' =>$product->price,
            'discount' =>$product->discount,
            'image_avatar' =>$product->image_avatar,
            'count' =>$product->count,
            'brand_id' =>$product->brand_id,
            ]);
            return redirect()->route('Product.show',$id)->with('success','Cập nhật thành công');
        }else{

            $avatar=$request->file('image_avatar');
            //process image avatar
            $extension_avatar = $avatar->getClientOriginalExtension();
            $name_image = 'product'.date('Y-m-d').Time().rand(11111, 99999).'.'.$extension_avatar;
            Storage::putFileAs('public/products',$avatar,$name_image);
            //process image list
            $product = new Product();
            $product->name_product=$request->name_product;
            $product->des_product=$request->des_product;
            $product->price=$request->price;
            $product->discount=$request->discount;
            $product->image_avatar=$name_image;
            $product->count=$request->count;
            $product->brand_id=$request->brand_id;
            Storage::delete('public/products/'.$request->image_avt);
            Product::where('id',$id)->update([
            'name_product' => $product->name_product,
            'des_product' => $product->des_product,
            'price' =>$product->price,
            'discount' =>$product->discount,
            'image_avatar' =>$product->image_avatar,
            'count' =>$product->count,
            'brand_id' =>$product->brand_id,
            ]);
            return redirect()->route('Product.show',$id)->with('success','Cập nhật thành công');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
