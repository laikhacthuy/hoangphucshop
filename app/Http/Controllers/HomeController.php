<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailResetPassword;


class HomeController extends Controller
{
    public function index(){
        $phone = DB::table('tbl_products')
            ->join('tbl_pro_brands', 'tbl_products.brand_id', '=', 'tbl_pro_brands.brand_id')
            ->join('tbl_pro_category', 'tbl_pro_brands.category_id', '=', 'tbl_pro_category.category_id')
            ->where('tbl_pro_category.category_id',1)->limit(4)->get();
        $laptop = DB::table('tbl_products')
            ->join('tbl_pro_brands', 'tbl_products.brand_id', '=', 'tbl_pro_brands.brand_id')
            ->join('tbl_pro_category', 'tbl_pro_brands.category_id', '=', 'tbl_pro_category.category_id')
            ->where('tbl_pro_category.category_id',2)->limit(4)->get();
        $table = DB::table('tbl_products')
            ->join('tbl_pro_brands', 'tbl_products.brand_id', '=', 'tbl_pro_brands.brand_id')
            ->join('tbl_pro_category', 'tbl_pro_brands.category_id', '=', 'tbl_pro_category.category_id')
            ->where('tbl_pro_category.category_id',6)->limit(4)->get();
        return view('pages.home',[
            'phone' => $phone,
            'laptop' => $laptop,
            'table' => $table,
        ]);
    }
    public function quychehoatdong(){
        return view('pages.quychehoatdong');
    }
    public function noiquysieuthi(){
        return view('pages.noiquysieuthi');
    }
    public function chatluongphucvu(){
        return view('pages.chatluongphucvu');
    }
    public function chinhsachbaohanh(){
        return view('pages.chinhsachbaohanh');
    }
    public function chitietsanpham_dt($name_product){
        $detail_pro = DB::table('tbl_products')->where('name_product',$name_product)->first();
        $specefi_pro = DB::table('tbl_pro_specifis')->where('name_product',$name_product)->first();
        return view('pages.chitietsanpham',[
            'product' => $detail_pro,
            'specefi' => $specefi_pro,
        ]);
    }
    public function chitietsanpham_tb($name_product){
        $detail_pro = DB::table('tbl_products')->where('name_product',$name_product)->first();
        $specefi_pro = DB::table('tbl_pro_specifis')->where('name_product',$name_product)->first();
        return view('pages.chitietsanpham_table',[
            'product' => $detail_pro,
            'specefi' => $specefi_pro,
        ]);
    }
    public function chitietsanpham_lt($name_product){
        $detail_pro = DB::table('tbl_products')->where('name_product',$name_product)->first();
        $specefi_pro = DB::table('tbl_pro_specifis')->where('name_product',$name_product)->first();
        return view('pages.chitietsanpham_laptop',[
            'product' => $detail_pro,
            'specefi' => $specefi_pro,
        ]);
    }
    public function danhmucsanpham($namecategory){
        $dmsp = DB::table('tbl_products')
            ->join('tbl_pro_brands', 'tbl_products.brand_id', '=', 'tbl_pro_brands.brand_id')
            ->join('tbl_pro_category', 'tbl_pro_brands.category_id', '=', 'tbl_pro_category.category_id')
            ->where('tbl_pro_category.name_category',$namecategory)->get();
        $type_pro = DB::table('tbl_pro_category')->where('tbl_pro_category.name_category',$namecategory)->get();
        return view('pages.danhmucsanpham',['dm' => $dmsp,'type_pro' => $type_pro]);
    }
    public function Check_type_category($cate_id,$name_product){
        switch ($cate_id) {
            case '1':
                return redirect()->route('chitietsanpham',$name_product);
                break;
            case '2':
                return redirect()->route('chitietsanphamlt',$name_product);
                break;
            case '6':
                return redirect()->route('chitietsanphamtb',$name_product);
                break;

            default:
                return redirect()->route('home');
                break;
        }
    }
    public function Thuonghieusanpham($thuonghieusp){
        $thuonghieu = DB::table('tbl_products')
            ->join('tbl_pro_brands', 'tbl_products.brand_id', '=', 'tbl_pro_brands.brand_id')
            ->join('tbl_pro_category', 'tbl_pro_brands.category_id', '=', 'tbl_pro_category.category_id')
            ->where('tbl_pro_brands.name_brand',$thuonghieusp)->get();
        $loai_thuonghieu = DB::table('tbl_pro_brands')->where('tbl_pro_brands.name_brand',$thuonghieusp)->get();
        return view('pages.thuonghieusanpham',['thuonghieu' => $thuonghieu,'loai_thuonghieu' => $loai_thuonghieu]);
    }
    public function Search(Request $request){
        $result = DB::table('tbl_products')
            ->select('tbl_products.name_product','tbl_pro_category.category_id')
            ->join('tbl_pro_brands', 'tbl_products.brand_id', '=', 'tbl_pro_brands.brand_id')
            ->join('tbl_pro_category', 'tbl_pro_brands.category_id', '=', 'tbl_pro_category.category_id')
            ->where('tbl_products.name_product','Like',$request->name_pro."%")->get();
        if(!$result->isEmpty()){
            return response()->json(['success' =>$result]);
        }else{
            return response()->json(['success' =>'Không có sản phẩm']);
        }
    }
    public function Reset_Password(Request $request){
        $check_mail = User::where('email',$request->resetpass)->get();
        if(!$check_mail->isEmpty()){
            //set password new
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 8; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            //Send email Mail:send
            // $data=[
            //     'pass_new' => $randomString
            // ];
            // Mail::send('email.email', $data, function ($message) use($request) {
            //     $message->from('tuthannghaonghe@gmail.com', 'Hoàng Phúc Shop');
            //     $message->to($request->resetpass,'Người dùng');
            //     $message->subject('Reset Password');
            // });
            //Send email Mail::to
            $data=[
                'pass_new' => $randomString
            ];
            Mail::to($request->resetpass,'Người dùng')->send(new MailResetPassword($data));
            if (Mail::failures()) {
                return response()->json(['error' => 'loi'],422);
            }else{
                return response()->json(['success' => 'ok']);
            }
        }else{
            return response()->json(['success' => 'loi']);
        }
    }
}
