<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::join('role','users.id_role','=','role.id')->select('users.id','users.name','users.username','users.phone','users.password','users.money','role.name as rolename')->get();
        $data_count = User::all()->count();
        return view('admin.user.index',compact('data','data_count'));
    }

    /**r
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
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
            ["nameuser" => "required",
            "username" => "required|unique:users,username",
            "matkhau" => "required|min:6",
            "phone" => "required|numeric"],
            ["nameuser.required" => "Chưa nhập họ tên",
            "username.required" => "Chưa nhập username",
            "username.unique" => "Username đã tồn tại",
            "matkhau.required" => "Chưa nhập mật khẩu",
            "matkhau.min" => "Mật khẩu có ít nhất 6 ký tự",
            "phone.required" => "Chưa nhập số điện thoại",
            "phone.numeric" => "Nhập đúng số điện thoại"]
            );
        
        $user = new User;
        $user ->name = $request->nameuser;
        $user ->username = $request->username;
        $user ->password = $request->matkhau;
        $user ->phone = $request->phone;
        $user ->money = 0;
        $user ->id_role = $request->optionrole;
        $user ->save();
        return redirect() -> route('user.index')->with(['flash_level' => 'success','flash_message' => 'Thêm thành công !!']);;
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
        $data = User::Find($id);
        $data_role = Role::all();
        return view('admin.user.edit',compact('data','data_role'));
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
            ["nameuser" => "required",
            "phone" => "required|numeric"],
            ["nameuser.required" => "Chưa nhập họ tên",
            "phone.required" => "Chưa nhập số điện thoại",
            "phone.numeric" => "Nhập đúng số điện thoại"]
            );
        $user = User::Find($id);
        $user ->name = $request->nameuser;
        $user ->phone = $request->phone;
        $user -> save();
        return redirect() -> route('user.index')->with(['flash_level' => 'success' , 'flash_message' =>'Cập nhật thành công !!']);
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
