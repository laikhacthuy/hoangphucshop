<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use SebastianBergmann\Environment\Console;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listuser = User::paginate(5);
        return view('admin.listuser',['listuser' => $listuser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->username = $request->createusername;
        $user->password = md5($request->createpassword);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('User.create')->with('success','Tạo tài khoản thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userdetail = User::where('id',$id)->first();
        return view('admin.edituser',['userdetail' => $userdetail]);
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
    public function update(UserRequest $request, $id)
    {
        $user = new User();
        $user->username = $request->createusername;
        $user->password = md5($request->createpassword);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $pass=User::where('id',$id)->first();
        if($request->createpassword == $pass->password){
            User::where('id',$id)->update([
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'phone' => $user->phone,
            ]);
            return redirect()->route('User.show',$id)->with('success',"Cập nhật thành công");
        }else{
            User::where('id',$id)->update([
                'username' => $user->username,
                'password' => $user->password,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'phone' => $user->phone,
            ]);
            return redirect()->route('User.show',$id)->with('success',"Cập nhật thành công");
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
        DB::table('tbl_user')->where('id',$id)->delete();
        return redirect()->route('User.index')->with('success',"Xoá thành công");
    }
}
