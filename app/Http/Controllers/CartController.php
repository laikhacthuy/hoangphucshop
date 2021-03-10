<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $show_cart=Cart::content();
        $cart_count = Cart::Count();
        return view('pages.giohang',['showcart' => $show_cart ,'cartcount' => $cart_count]);
    }
    public function Add_Cart($namepro){
        $pro_info = DB::table('tbl_products')->where('name_product',$namepro)->first();
        $price=$pro_info->price*((100-$pro_info->discount)/100);
        Cart::add([
            'id' => $pro_info->id,
            'name' => $pro_info->name_product,
            'qty' => 1,
            'price' => $price,
            'options' => ['image' => $pro_info->image_avatar]
        ]);
        return redirect()->route('giohang');
    }
    public function Remove_Cart($idrow){
        Cart::remove($idrow);
        return redirect()->route('giohang');
    }
    public function Update_Cart(Request $request){
        Cart::update($request->rowId,$request->qty);
    }
}
