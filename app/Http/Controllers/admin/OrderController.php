<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\User;
use App\DichVu;
use App\Order;
use App\SoLuong;
use App\Kieudv;
use Carbon\Carbon;
use App\StatusOrder;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::join('users','order.id_users','=','users.id')->select('order.id','order.datecomplete','order.thanhtien','order.created_at','users.name as name')->get();
        $data_status = StatusOrder::all();
        $data_status_count = StatusOrder::all()->count();
        $data_count = Order::join('users','order.id_users','=','users.id')->count();
        return view('admin.order.index',compact('data','data_count','data_status','data_status_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dichvu = DichVu::all();
        $users = User::all();
        return view('admin.order.create',compact('dichvu','users'));
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
            ["txtdate" => "required",
             "optiondv" => "required",
             "optionsl" => "required",
             "txtlink"=> "required"],
            ["txtdate.required" => "Chưa nhập ngày hoàn thành",
            "optiondv.required" => "Chưa chọn dịch vụ",
            "optionsl.required" => "Chưa chọn số lượng",
            "txtlink.required" =>"Link không được trống"]
            );
        $sl = SoLuong::find($request->optionsl);
        $order = new Order;
        $order ->thanhtien = $request->txtthanhtien;
        $order ->datecomplete = $request->txtdate;
        $order ->link = $request->txtlink;
        $order ->soluong = $sl->giatri;
        $order ->id_dv = $request->optiondv;
        $order ->id_users = $request->optionkh;
        $order ->id_status = 1;

        $dv = DichVu::find($request->optiondv);
        $kieudv = Kieudv::find($dv->id_kieudv);
        $user = User::find($request->optionkh);
        if($user->money < $dv->giatien*($sl->giatri/$kieudv->donvigia)) {
            return redirect() -> route('order.create')->with(['flash_level' => 'danger','flash_message' => 'số tiền trong tài khoản không đủ !!']);
        }
        else {
            $order ->thanhtien = ($dv->giatien)*($sl->giatri/$kieudv->donvigia);
            $user->money = $user->money-($dv->giatien*$sl->giatri);
            $order ->save();
            $user->save();
        return redirect() -> route('order.index')->with(['flash_level' => 'success','flash_message' => 'Thêm thành công !!']);
        }
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
        $data = Order::Find($id);
        $users = User::all();
        $sl = SoLuong::all();
        $dv = DichVu::all();
        return view('admin.order.edit',compact('data','users','sl','dv'));
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
            ["txtdate" => "required",
             "optiondv" => "required",
             "optionsl" => "required",
             "txtlink"=> "required"],
            ["txtdate.required" => "Chưa nhập ngày hoàn thành",
            "optiondv.required" => "Chưa chọn dịch vụ",
            "optionsl.required" => "Chưa chọn số lượng",
            "txtlink.required" =>"Link không được trống"]
            );
        $order = Order::find($id);
        $sl = SoLuong::find($request->optionsl);
        $order ->thanhtien = $request->txtthanhtien;
        $order ->datecomplete = $request->txtdate;
        $order ->link = $request->txtlink;
        $order ->soluong = $sl->giatri;
        $order ->id_dv = $request->optiondv;
        $order ->id_users = $request->optionkh;
        $order ->id_status = 1;
        $dv = DichVu::find($request->optiondv);
        $kieudv = Kieudv::find($dv->id_kieudv);
        $user = User::find($request->optionkh);
        if($user->money < $dv->giatien*($sl->giatri/$kieudv->donvigia)) {
            return redirect() -> route('order.edit',$order->id)->with(['flash_level' => 'danger','flash_message' => 'số tiền trong tài khoản không đủ !!']);
        }
        else {
            $order ->thanhtien = ($dv->giatien)*($sl->giatri/$kieudv->donvigia);
            $user->money = $user->money-($dv->giatien*$sl->giatri);
            $order ->save();
            $user->save();
        return redirect() -> route('order.index')->with(['flash_level' => 'success','flash_message' => 'Cập nhật thành công !!']);
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
        $order = Order::find($id)->delete();
        return redirect()->route('order.index')->with(['flash_level' => 'success' , 'flash_message' => 'Xóa thành công']);
    }
    public function displaySoluong(Request $request) {
        $id_dv = $request->id_dv;
        $dv = DichVu::find($id_dv);
        $id_kieudv = $dv->id_kieudv;
        $soluongs = SoLuong::where('id_kieudv',$id_kieudv)->get()->toJson();
        if($request->ajax())
        {
            return response()->json($soluongs);
        }
    }
    public function thanhtien(Request $request) {
        $id_sl = $request->id_sl;
        $id_dv = $request->id_dv;
        $sl = SoLuong::find($id_sl);
        $dv = DichVu::find($id_dv);
        $kieudv = Kieudv::find($dv->id_kieudv);
        if($sl !=null) {
            $thanhtien = ($sl->giatri)*($dv->giatien/$kieudv->donvigia);
        } else{
            $thanhtien = 0;
        }
        
        if($request->ajax())
        {
            return response()->json($thanhtien);
        }
    }
}