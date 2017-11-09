<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SoLuong;
use App\Kieudv;
class SoLuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SoLuong::join('kieudv','soluong.id_kieudv','=','kieudv.id')->select('soluong.id','soluong.giatri','kieudv.name as kieudv')->get();
        $data_count = SoLuong::all()->count();
        return view('admin.soluong.index',compact('data','data_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kieudv = Kieudv::all();
        return view('admin.soluong.create',compact('data_kieudv'));
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
            ["txtgiatri" => "required|unique:soluong,giatri|integer"],
            ["txtgiatri.required" => "Chưa nhập giá trị kìa quang liêu",
            "txtgiatri.unique" => "Tên dịch vụ đã tồn tại",
            "txtgiatri.integer" => "Giá trị nhập phải là số"]
            );
        
        $soluong = new SoLuong;
        $soluong ->giatri = $request->txtgiatri;
        $soluong ->id_kieudv = $request->optionkieudv;
        $soluong ->save();
        return redirect() -> route('soluong.index')->with(['flash_level' => 'success','flash_message' => 'Thêm thành công !!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SoLuong::join('kieudv','soluong.id_kieudv','=','kieudv.id')->select('soluong.id','soluong.giatri')->where('soluong.id_kieudv','=',$id)->get();
        $data_count = SoLuong::join('kieudv','soluong.id_kieudv','=','kieudv.id')->select('*')->where('soluong.id_kieudv','=',$id)->count();
        $kieudv = Kieudv::Find($id);
        return view('admin.soluong.show',compact('data','data_count','kieudv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SoLuong::Find($id);
        $data_kieudv = Kieudv::all();
        return view('admin.soluong.edit',compact('data','data_kieudv'));
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
            ["txtgiatri" => "required|unique:soluong,giatri|integer"],
            ["txtgiatri.required" => "Chưa nhập giá trị kìa quang liêu",
            "txtgiatri.unique" => "Tên dịch vụ đã tồn tại",
            "txtgiatri.integer" => "Giá trị nhập phải là số"]
            );
        $soluong = SoLuong::Find($id);
        $soluong ->giatri = $request->txtgiatri;
        $soluong ->id_kieudv = $request->optionkieudv;
        $soluong ->save();
        return redirect() -> route('soluong.index')->with(['flash_level' => 'success' , 'flash_message' =>'Cập nhật thành công !!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soluong = SoLuong::find($id)->delete();
        return redirect()->route('soluong.index')->with(['flash_level' => 'success' , 'flash_message' => 'Xóa thành công']);
    }
}
