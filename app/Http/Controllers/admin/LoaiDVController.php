<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Loaidv;
use App\Kieudv;
use App\DichVu;
use DB;
use App\Http\Controllers\Controller;

class LoaiDVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Loaidv::all();
        $data_count = Loaidv::all()->count();
        $kieudv = Kieudv::all();
        $kieudv_count = Kieudv::all()->count();
        $dichvu = DB::table('dv')->join('loaidv','dv.id_loaidv','=','loaidv.id')
                                 ->join('kieudv','dv.id_kieudv','=','kieudv.id')
                                 ->select('dv.id','dv.name','dv.mota','dv.giatien','loaidv.name as loaidv','kieudv.name as kieudv')->get();
        $dichvu_count = DichVu::all()->count();
        return view('admin.loaidv.index', compact('data','data_count','kieudv','kieudv_count','dichvu','dichvu_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.loaidv.create');
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
            ["namedv" => "required|unique:loaidv,name",
            "nameseo" => "required"],
            ["namedv.required" => "Tên dịch vụ không được trống",
            "namedv.unique" => "Tên dịch vụ đã tồn tại",
            "nameseo.required" => "Tên seo không được trống"]
            );
        
        $loaidv = new Loaidv;
        $loaidv ->name = $request->namedv;
        $loaidv ->name_seo = $request->nameseo;
        $loaidv ->save();
        return redirect() -> route('loaidv.index')->with(['flash_level' => 'success','flash_message' => 'Thêm thành công !!']);;
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
        $data = Loaidv::Find($id);

        return view('admin.loaidv.edit',compact('data'));
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
            ["namedv" => "required|unique:loaidv,name",
            "nameseo" => "required"],
            ["namedv.required" => "Tên dịch vụ không được trống",
            "namedv.unique" => "Tên dịch vụ đã tồn tại",
            "nameseo.required" => "Tên seo không được trống"]
            );
        $loaidv = Loaidv::Find($id);
        $loaidv ->name = $request->namedv;
        $loaidv ->name_seo = $request->nameseo;
        $loaidv -> save();
        return redirect() -> route('loaidv.index')->with(['flash_level' => 'success' , 'flash_message' =>'Cập nhật thành công !!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaidv = Loaidv::find($id)->delete();
        return redirect()->route('loaidv.index')->with(['flash_level' => 'success' , 'flash_message' => 'Xóa loại dịch vụ thành công']);
    }
}
