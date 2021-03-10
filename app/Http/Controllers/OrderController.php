<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function add_order(Request $request){
        $order = new Order();
        $order->customer_id = $request->addr;
        $order->pay_id = $request->pay_id;
        $order->order_total = $request->total;
        $order->order_status = 1;
        $order->save();
        $id = DB::getPdo()->lastInsertId();

        $order_detail = new Order_Detail();
        $cart = Cart::content();
        foreach ($cart as $value) {
            $order_detail->order_id = $id;
            $order_detail->product_id = $value->id;
            $order_detail->product_name = $value->name;
            $order_detail->product_price = $value->price;
            $order_detail->product_qty = $value->qty;
            DB::table('tbl_order_detail')->insert([
                'order_id' => $id,
                'product_id' => $value->id,
                'product_name' => $value->name,
                'product_price' => $value->price,
                'product_qty' => $value->qty,
            ]);
            $total_count = Product::where('id',$value->id)->first();
            DB::table('tbl_products')->where('id', $value->id)->update(['count' => $total_count->count-$value->qty]);
        }
        Cart::destroy();
        return redirect()->route('home')->with('status','ok');

    }
    public function History_Order($customer_id)
    {
        $id_customer_tbl_customer = Customer::where('id_customer',$customer_id)->first();
        //var_dump($id_customer_tbl_customer);
        if($id_customer_tbl_customer == null)
        {
            return view('pages.lichsumuahang',['no_history' => 1]);
        }else{
            $order_id_tbl_order = Order::where('customer_id',$id_customer_tbl_customer->id)->get();
            if(!$order_id_tbl_order->isEmpty())
            {
                $history = array();
                foreach ($order_id_tbl_order as $value) {
                    $his = Order_Detail::where('order_id',$value->order_id)->get();
                    array_push($history,$his);
                }
                return view('pages.lichsumuahang',['history' => $history,'order' => $order_id_tbl_order]);
            }else{
                return view('pages.lichsumuahang',['no_history' => 1]);
            }
        }
    }
}
