<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kieudv;
class KieuDVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kieudv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            ["txtname" => "required",
            "txtdonvigia" => "required|integer"],
            ["txtname.required" => "Tên không được trống",
            "txtdonvigia.required" => "Đơn vị giá không được trống",
            "txtdonvigia.integer" =>"Đơn vị giá phải là số nguyên"]
            );
        
        $kieudv = new Kieudv;
        $kieudv ->name = $request->txtname;
        $kieudv ->donvigia = $request->txtdonvigia;
        $kieudv ->save();
        return redirect() -> route('loaidv.index')->with(['flash_level' => 'success','flash_message' => 'Thêm kiểu dịch vụ thành công !!']);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kieudv::Find($id);

        return view('admin.kieudv.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            ["txtname" => "required",
            "txtdonvigia" => "required|integer"],
            ["txtname.required" => "Tên không được trống",
            "txtdonvigia.required" => "Đơn vị giá không được trống",
            "txtdonvigia.integer" =>"Đơn vị giá phải là số nguyên"]
            );
        $kieudv = Kieudv::Find($id);
        $kieudv ->name = $request->txtname;
        $kieudv ->donvigia = $request->txtdonvigia;
        $kieudv -> save();
        return redirect() -> route('loaidv.index')->with(['flash_level' => 'success' , 'flash_message' =>'Cập nhật kiểu dịch vụ thành công !!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaidv = Kieudv::find($id)->delete();
        return redirect()->route('loaidv.index')->with(['flash_level' => 'success' , 'flash_message' => 'Xóa kiểu dịch vụ thành công']);
    }
}