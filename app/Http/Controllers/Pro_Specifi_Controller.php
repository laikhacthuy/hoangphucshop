<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pro_Specifi;

class Pro_Specifi_Controller extends Controller
{
    public function index($id,$name){
        return view('admin.createproduct_specifis')->with(['id' => $id,'name' => $name]);
    }
    public function specefi_save(Request $request){
        $pro_spec = new Pro_Specifi();
        $id=$request->id;
        $pro_spec->name_product=$request->name_product_specifi;
        $pro_spec->screen=$request->screen;
        $pro_spec->os=$request->os;
        $pro_spec->camera_pre=$request->camera_pre;
        $pro_spec->camera_affter=$request->camera_affter;
        $pro_spec->cpu=$request->cpu;
        $pro_spec->gpu=$request->gpu;
        $pro_spec->ram=$request->ram;
        $pro_spec->rom=$request->rom;
        $pro_spec->battery=$request->battery;
        $pro_spec->weight=$request->weight;
        $pro_spec->save();
        return redirect()->route('specifi',['id'=>$id,'name'=> $pro_spec->name_product])->with('success','Thêm thành công thông số');
    }
}
