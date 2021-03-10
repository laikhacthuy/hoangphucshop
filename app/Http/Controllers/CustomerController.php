<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\User;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function Register_Customer(CustomerRequest $request){

        $customer = new User();
        $customer->username = $request->create_username;
        $customer->password = md5($request->create_password);
        $customer->name = $request->create_name;
        $customer->role = '3';
        $customer->email = $request->create_email;
        $customer->phone = $request->create_phone;
        $check = User::where('username',$request->create_username)->first();
        if($check == null)
        {
            $customer->save();
            $json = array('#create_name_error','#create_password_error','#create_username_error','#create_email_error','#create_phone_error');
            return response()->json(['success' => $json]);
        }else{
            return response()->json(['success' => 'loi']);
        }
    }
    public function Login_Customer(Request $request){
        $username = $request->username;
        $password = $request->password;
        if(Auth::attempt(['username' => $username, 'password' => $password]))
        {
            return response()->json(['success' => 'ok']);
        }else{
            return response()->json(['error' => "login_fail"],422);
        }
    }
    public function Logout_Customer(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function Check_login_home(){
        if(Auth::check())
        {
            return response()->json(["success" => "ok"]);
        }else{
            return response()->json(["error" => ""],422);
        }
    }
    public function Create_Customer_info()
    {
        $check_info_customer = Customer::where('id_customer', Auth::user()->id)->get();
        $show_cart=Cart::content();
        $cart_count = Cart::Count();
        return view('pages.thongtinkhachhang',[
            'showcart' => $show_cart ,
            'cartcount' => $cart_count,
            'check_info_customer' => $check_info_customer,
        ]);
    }
    public function Save_Customer(Request $request)
    {
        $input = [
            'name_customer' => $request->name_customer,
            'phone_customer' => $request->phone_customer,
            'address_customer' => $request->address_customer,
        ];
        $rules = [
            'name_customer' => ['required','regex:/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$/'],
            'phone_customer' => ['required','regex:/0[3|5|7|8|9]+[0-9]{8}+$/'],
            'address_customer' => 'required',
        ];
        $messages = [
            'name_customer.required' => 'Vui lòng nhập tên người nhận',
            'name_customer.regex' => 'Vui lòng nhập mình chữ cái',

            'phone_customer.required' => 'Vui lòng nhập điện thoại người nhận',
            'phone_customer.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',

            'address_customer.required' => 'Vui lòng nhập địa chỉ nhận hàng',
        ];
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $customer = new Customer();
            $id = Auth::user()->id;
            $customer->id_customer = $id;
            $customer->name_customer = $request->name_customer;
            $customer->phone_customer = $request->phone_customer;
            $customer->address_customer = $request->address_customer;
            $customer->save();
            return redirect()->back();
        }
    }
}
