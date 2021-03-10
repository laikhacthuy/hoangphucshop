<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Session;
// session_start();
class AdminController extends Controller
{
    public function login(){
        return view('admin.loginadmin');
    }
    public function index(){
        return view('admin.dashboard');
    }
    //process login
    public function checklogin(Request $request){
        /*Login bình thường
            $username=$request->username;
            $pass=md5($request->password);
            $result=DB::table('tbl_user')->where('username',$username)->where('password',$pass)->first();
            if($result){
                $request->session()->put('name', $result->name);
                //cách 1:Session::put('name',$result->name);
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->withErrors('Username or password incorrect');
            }
        */
        /*Login Auth */
        //validate and custom messages
        $input = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'username.required' => 'Vui lòng nhập tên tài khoản',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ];
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            return redirect('admin/dashboard');
        }else{
            return redirect()->back()->with('error','Username or password incorrect');
        }

    }
    //process logout
    public function logout(Request $request){
        Auth::logout();
        return redirect(route('login'));
    }


}
