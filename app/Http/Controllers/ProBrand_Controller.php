<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pro_Brand;
use App\Http\Requests\ProBrandRequest;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class ProBrand_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$brand=DB::table('tbl_pro_brands')->orderBy('brand_id', 'desc')->get();
        $brand_pag=Pro_Brand::paginate(5);
        $category=DB::table('tbl_pro_category')->get();
        //return view('admin.listbrandproduct')->with(['brand'=>$brand,'category'=>$category,'brand_pag'=>$brand_pag]);
        return view('admin.listbrandproduct')->with(['category'=>$category,'brand_pag'=>$brand_pag]);
        //C2: return view('admin.listbrandproduct',['brand'=>$brand,'category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_id = DB::table('tbl_pro_category')->get();
        return view('admin.createbrandproduct')->with('categoryid',$category_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProBrandRequest $request)
    {
        $brand= new Pro_Brand();
        $brand->name_brand=$request->name_brand;
        $brand->des_brand=$request->des_brand;
        $brand->category_id=$request->category_id;
        $brand->save();
        return redirect(route('Product_Brand.create'))->with('success','Thêm thương hiệu thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brandetail= Pro_Brand::where('brand_id',$id)->first();//Eloquen ORM
        $category=DB::table('tbl_pro_category')->get();
        return view('admin.editbrandproduct')->with(['branddetail' => $brandetail,'category' => $category]);
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
    public function update(ProBrandRequest $request, $id)
    {
        $brand= new Pro_Brand();
        $brand->name_brand=$request->name_brand;
        $brand->des_brand=$request->des_brand;
        $brand->category_id=$request->category_id;
        $brand_update = DB::table('tbl_pro_brands')->where('brand_id', $id)->update(
            [   'name_brand' => $brand->name_brand,
                'des_brand' => $brand->des_brand,
                'category_id' =>$brand->category_id
            ]
        );
        return redirect()->route('Product_Brand.show',$id)->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_pro_brands')->where('brand_id',$id)->delete();
        return redirect()->route('Product_Brand.index')->with('success','Xoá thành công');
    }
}
