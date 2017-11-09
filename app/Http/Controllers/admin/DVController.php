<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DichVu;
use App\Loaidv;
use App\Kieudv;
class DVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_loaidv = Loaidv::all();
        $data_kieudv = Kieudv::all();
        return view('admin.dichvu.create',compact('data_loaidv','data_kieudv'));
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
            ["txtnamedv" => "required",
             "txtmotadv" => "required",
             "txtgiatien"=> "required|numeric"],
            ["txtnamedv.required" => "Tên dịch vụ không được trống",
            "txtmotadv.required" => "Mô tả không được trống",
            "txtgiatien.required" =>"Giá tiền không được trống",
            "txtgiatien.numeric" => "Giá tiền phải là số"]
            );
        
        $dichvu = new DichVu;
        $dichvu ->name = $request->txtnamedv;
        $dichvu ->mota = $request->txtmotadv;
        $dichvu ->id_loaidv = $request->optionloaidv;
        $dichvu ->id_kieudv = $request->optionkieudv;
        $dichvu ->giatien = $request->txtgiatien; 
        $dichvu ->save();
        return redirect() -> route('loaidv.index')->with(['flash_level' => 'success','flash_message' => 'Thêm dịch vụ thành công !!']);
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
        $data = DichVu::Find($id);
        $data_loaidv = Loaidv::all();
        $data_kieudv = Kieudv::all();
        return view('admin.dichvu.edit',compact('data','data_loaidv','data_kieudv'));
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
            ["txtnamedv" => "required",
             "txtmotadv" => "required",
             "txtgiatien"=> "required|numeric"],
            ["txtnamedv.required" => "Chưa nhập tên kìa quang liêu :v",
            "txtmotadv.required" => "Mô tả không được trống",
            "txtgiatien.required" =>"Giá tiền không được trống",
            "txtgiatien.numeric" => "Giá tiền phải là số"]
            );
        $dichvu = DichVu::Find($id);
        $dichvu ->name = $request->txtnamedv;
        $dichvu ->mota = $request->txtmotadv;
        $dichvu ->id_loaidv = $request->optionloaidv;
        $dichvu ->id_kieudv = $request->optionkieudv;
        $dichvu ->giatien = $request->txtgiatien;
        $dichvu -> save();
        return redirect() -> route('loaidv.index')->with(['flash_level' => 'success' , 'flash_message' =>'Cập nhật dịch vụ thành công !!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaidv = DichVu::find($id)->delete();
        return redirect()->route('loaidv.index')->with(['flash_level' => 'success' , 'flash_message' => 'Xóa dịch vụ thành công']);
    }
}
