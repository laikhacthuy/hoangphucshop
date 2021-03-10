<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pro_Category;
use App\Http\Requests\ProCateRequest;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class ProCate_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro_cate= Pro_Category::paginate(5);
        return view('admin/listprocategory')->with('pro_cate',$pro_cate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/createproductcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProCateRequest $request)
    {
        $procate = new Pro_Category();
        $procate->name_category=$request->name_categ;
        $procate->des_category=$request->des_categ;
        $procate->save();
        return redirect(route('Product_Category.create'))->with('success','Thêm danh mục sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_cate = DB::table('tbl_pro_category')->where('category_id', $id)->first();
        return view('admin/editprocategory')->with('deta_category',$detail_cate);
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
    public function update(ProCateRequest $request, $id)
    {
        $procate = new Pro_Category();
        $procate->name_category=$request->name_categ;
        $procate->des_category=$request->des_categ;
        $procate_update = DB::table('tbl_pro_category')->where('category_id', $id)->update(
            [   'name_category' => $procate->name_category,
                'des_category' => $procate->des_category,
            ]
        );
        return redirect(route('Product_Category.show',$id))->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_pro_category')->where('category_id',$id)->delete();
        return redirect(route('Product_Category.index'))->with('success','Xoá thành công');
    }
}
