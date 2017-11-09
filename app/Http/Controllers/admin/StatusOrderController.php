<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StatusOrder;
class StatusOrderController extends Controller
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
        return view('admin.statusorder.create');
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
            "txtnoidung" => "required"],
            ["txtname.required" => "Tên không được trống",
            "txtnoidung.required" => "Nội dung không được trống"]
            );
        
        $status = new StatusOrder;
        $status ->name = $request->txtname;
        $status ->noidung = $request->txtnoidung;
        $status ->save();
        return redirect() -> route('order.index')->with(['flash_level' => 'success','flash_message' => 'Thêm trạng thái thành công !!']);
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
        $data = StatusOrder::Find($id);

        return view('admin.statusorder.edit',compact('data'));
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
            "txtnoidung" => "required"],
            ["txtname.required" => "Tên không được trống",
            "txtnoidung.required" => "Nội dung không được trống"]
            );
        $status = StatusOrder::Find($id);
        $status ->name = $request->txtname;
        $status ->noidung = $request->txtnoidung;
        $status -> save();
        return redirect() -> route('order.index')->with(['flash_level' => 'success' , 'flash_message' =>'Cập nhật trạng thái thành công !!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = StatusOrder::find($id)->delete();
        return redirect()->route('order.index')->with(['flash_level' => 'success' , 'flash_message' => 'Xóa trạng thái thành công']);
    }
}
